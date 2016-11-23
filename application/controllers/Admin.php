<?php

defined ('BASEPATH') OR exit ('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct ()
    {
        parent::__construct ();
    }

    public function index ()
    {
        $where['status!='] = '2';
        $data['party_data'] = $this ->common_model->get('party');
        $data['admins']    = $this -> common_model -> get ('admin', $where);
        $data['content']   = $this -> load -> view ('super-admin/admin/listing', $data, true);
        $this -> load -> view ('templates/template', $data);
    }

    function validate_admin ()
    {
        $where['email'] = $this -> input -> post ('email');
        $result         = $this -> common_model -> get ('admin', $where);
        if ($result -> num_rows () > 0)
        {
            $this -> form_validation -> set_message ('validate_admin', 'Email you entered already exist');
            return false;
        }
        $result = $this -> common_model -> get ('super_admin', $where);
        if ($result -> num_rows () > 0)
        {
            $this -> form_validation -> set_message ('validate_admin', 'Email you entered already exist');
            return false;
        }
        // just to check if user name (first name) already exist
        $where['admin_user_name'] = $this -> input -> post ('first_name');
        $result                   = $this -> common_model -> get ('super_admin', $where);
        if ($result -> num_rows () > 0)
        {
            $this -> form_validation -> set_message ('validate_admin', 'User Name you entered already exist');
            return false;
        }
        $valid_ext = ['jpg', 'jpeg', 'png'];
        if ( ! empty ($_FILES['main_screen_photo']['name']))
        {
            $ext = strtolower (pathinfo ($_FILES['main_screen_photo']['name'], PATHINFO_EXTENSION));
            if ( ! in_array ($ext, $valid_ext))
            {
                $this -> form_validation -> set_message ('validate_admin', 'Please select a valid image for Main Screen image');
                return false;
            }
        }
        else
        {
            $this -> form_validation -> set_message ('validate_admin', 'Please select Main Screen image');
            return false;
        }
        if ( ! empty ($_FILES['profile_photo']['name']))
        {
            $ext = strtolower (pathinfo ($_FILES['profile_photo']['name'], PATHINFO_EXTENSION));
            if ( ! in_array ($ext, $valid_ext))
            {
                $this -> form_validation -> set_message ('validate_admin', 'Please select a valid image for Profile');
                return false;
            }
            else
            {
                $image_info      = getimagesize ($_FILES["profile_photo"]["tmp_name"]);
                $required_width  = 180;
                $required_height = 80;
                $image_width     = $image_info[0];
                $image_height    = $image_info[1];
                $error           = '';
                if ($image_width < $required_width)
                {
                    $error = 'Minimum header image width required is ' . $required_width;
                }
                if ($image_height < $required_height)
                {
                    $error = 'Minimum header image height required is ' . $required_height;
                }
                if ($error != '')
                {
                    $this -> form_validation -> set_message ('validate_admin', $error);
                    return false;
                }
            }
        }
        else
        {
            $this -> form_validation -> set_message ('validate_admin', 'Please select header image');
            return false;
        }
        return true;
    }

    public function add ()
    {
        $this -> form_validation -> set_rules ('first_name', 'First Name', 'trim|required|callback_validate_admin');
        $this -> form_validation -> set_rules ('last_name', 'Last Name', 'trim|required');
        $this -> form_validation -> set_rules ('address', 'Address', 'trim|required');
        $this -> form_validation -> set_rules ('email', 'Email Name', 'trim|required|valid_email');
        $this -> form_validation -> set_rules ('mobile', 'Mobile Name', 'trim|required|min_length[10]|max_length[11]');
        $this -> form_validation -> set_rules ('phone', 'Phone', 'trim|required');
        $this -> form_validation -> set_rules ('facebook_id', 'Facebook ID', 'trim|required');
        $this -> form_validation -> set_rules ('user_id', 'User ID', 'trim|required');
        $this -> form_validation -> set_rules ('password', 'Password', 'trim|required');
        if ($this -> form_validation -> run () == false)
        {
            $data['party_data'] = $this ->common_model->get('party');
            $data['content'] = $this -> load -> view ('super-admin/admin/add', '', true);
            $this -> load -> view ('templates/template', $data);
        }
        else
        {
            unset ($_POST['submit']);
            foreach ($_POST as $key => $value)
            {
                $content[$key] = $this -> input -> post ($key);
            }

            #===============================Main Screen image upload====================
            $config                       = ['upload_path' => 'uploads/admin/', 'allowed_types' => 'gif|jpg|png'];
            $file                         = file_upload_admin ('main_screen_photo', $config);
            $content['main_screen_photo'] = $_FILES['main_screen_photo']['name'];

            #========================= Header Image upload ========
            $file                     = file_upload_admin ('profile_photo', $config);
            $content['profile_photo'] = $_FILES['profile_photo']['name'];

            $content['time_date'] = time ();
            $last_id              = $this -> common_model -> insert ('admin', $content);

            $super_admin['admin_name']      = $this -> input -> post ('first_name') . " " . $this -> input -> post ('last_name');
            $super_admin['admin_user_name'] = $this -> input -> post ('first_name');
            $super_admin['admin_email']     = $this -> input -> post ('email');
            $super_admin['phone']           = $this -> input -> post ('phone');
            $super_admin['admin_user_id']   = $last_id;
            $super_admin['admin_user_type'] = 'admin';
            $super_admin['admin_password']  = base64_encode (base64_encode ($this -> input -> post ('password')));

            $this -> common_model -> insert ('super_admin', $super_admin);
            set_message_admin ('Admin added successfully', 'success');
            redirect ('super-admin/admin');
        }
    }

    /**
     * @param $id
     */
    function delete ($id)
    {
        if (is_string ($id))
        {
            $update['status']                     = 2;
            $where['first_name']                  = $id;
            $where_super_admin['admin_user_name'] = $id;
            $this -> common_model -> update ('admin', $update, $where);
            $this -> common_model -> update ('super_admin', $update, $where_super_admin);
            set_message_admin ('Admin deleted successfully', 'success');
        }
        redirect ('admin');
    }

    /**
     * @param $id
     * @param $status
     */
    function change_status ($id, $status)
    {
        if (is_numeric ($id) && is_numeric ($status))
        {
            switch ($status)
            {
                case (1):
                    $update['status'] = 1;
                    break;
                default:
                    $update['status'] = 0;
                    break;
            }
            $where['id'] = $id;
            $this -> common_model -> update ('admin', $update, $where);
            set_message_admin ('Admin Status changed successfully', 'success');
        }
        redirect ('admin');
    }

    function edit ($id)
    {
        $this -> form_validation -> set_rules ('first_name', 'First Name', 'trim|required|callback_validate_admin_edit');
        $this -> form_validation -> set_rules ('last_name', 'Last Name', 'trim|required');
        $this -> form_validation -> set_rules ('address', 'Address', 'trim|required');
        $this -> form_validation -> set_rules ('email', 'Email Name', 'trim|required|valid_email');
        $this -> form_validation -> set_rules ('mobile', 'Mobile Name', 'trim|required|min_length[10]|max_length[11]');
        $this -> form_validation -> set_rules ('phone', 'Phone', 'trim|required');
        $this -> form_validation -> set_rules ('facebook_id', 'Facebook ID', 'trim|required');
        $this -> form_validation -> set_rules ('user_id', 'User ID', 'trim|required');
        $this -> form_validation -> set_rules ('password', 'Password', 'trim|required');
        if ($this -> form_validation -> run () == false)
        {
            $where           = ['id' => $id];
            $data['admin']   = $this -> common_model -> get ('admin', $where);
            $data['content'] = $this -> load -> view ('super-admin/admin/edit', $data, true);
            $this -> load -> view ('templates/template', $data);
        }
        else
        {
            $old_file = [];

            #===============================Main Screen image upload====================
            if ( ! empty ($_FILES['main_screen_photo']['name']))
            {
                $config                       = ['upload_path' => 'uploads/admin/', 'allowed_types' => 'gif|jpg|png'];
                $file                         = file_upload_admin ('main_screen_photo', $config);
                $content['main_screen_photo'] = $_FILES['main_screen_photo']['name'];
                $old_file[]                   = 'uploads/admin/' . $this -> input -> post ('old_main_screen_photo');
            }
            #========================= Header Image upload ========
            if ( ! empty ($_FILES['profile_photo']['name']))
            {
                $config                   = ['upload_path' => 'uploads/admin/', 'allowed_types' => 'gif|jpg|png'];
                $file                     = file_upload_admin ('profile_photo', $config);
                $content['profile_photo'] = $_FILES['profile_photo']['name'];
                $old_file[]               = 'uploads/admin/' . $this -> input -> post ('old_profile_photo');
            }
            $content['time_date'] = time ();
            
            unset ($_POST['submit']);
            unset ($_POST['old_main_screen_photo']);
            unset ($_POST['old_profile_photo']);
            foreach ($_POST as $key => $value)
            {
                $content[$key] = $this -> input -> post ($key);
            }

            
            
            unlink_files ($old_file);
            $where = ['id' => $id];
            $this -> common_model -> update ('admin', $content, $where);


            $where_admin_user_id            = ['admin_user_id' => $id];
            $super_admin['admin_name']      = $this -> input -> post ('first_name') . " " . $this -> input -> post ('last_name');
            $super_admin['admin_user_name'] = $this -> input -> post ('first_name');
            $super_admin['admin_email']     = $this -> input -> post ('email');
            $super_admin['phone']           = $this -> input -> post ('phone');
            $super_admin['admin_user_type'] = 'admin';
            $super_admin['admin_password']  = base64_encode (base64_encode ($this -> input -> post ('password')));


            $this -> common_model -> update ('super_admin', $super_admin, $where_admin_user_id);
            set_message_admin ('Admin updated successfully', 'success');
            redirect ('admin');
        }
    }

    /**
     * @return bool
     */
    function validate_admin_edit ()
    {
        $id                       = $this -> input -> post ('id');
        $where['admin_user_name']      = $this -> input -> post ('first_name');
        $where['admin_user_id!='] = $id;
        $result                   = $this -> common_model -> get ('super_admin', $where);
        if ($result -> num_rows () > 0)
        {
            $this -> form_validation -> set_message ('validate_admin_edit', 'First name you enter is already exist');
            return false;
        }
        $valid_ext = ['jpg', 'jpeg', 'png'];
        if ( ! empty ($_FILES['main_screen_photo']['name']))
        {
            $ext = strtolower (pathinfo ($_FILES['main_screen_photo']['name'], PATHINFO_EXTENSION));
            if ( ! in_array ($ext, $valid_ext))
            {
                $this -> form_validation -> set_message ('validate_admin_edit', 'Please select a valid image for Main Screen image');
                return false;
            }
        }
        if ( ! empty ($_FILES['profile_photo']['name']))
        {
            $ext = strtolower (pathinfo ($_FILES['profile_photo']['name'], PATHINFO_EXTENSION));
            if ( ! in_array ($ext, $valid_ext))
            {
                $this -> form_validation -> set_message ('validate_admin', 'Please select a valid image for profile photo');
                return false;
            }
        }
        return true;
    }

}

?>