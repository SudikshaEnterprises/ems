<?php

defined ('BASEPATH') OR exit ('No direct script access allowed');

class Party extends CI_Controller {

    public function __construct ()
    {
        parent::__construct ();
    }

    public function index ()
    {
        $where['id='] = '1';
        $this -> form_validation -> set_rules ('short_name', 'Short Name', 'trim|required|callback_validate_party');
        $this -> form_validation -> set_rules ('english_name', 'English Name', 'trim|required');
        $this -> form_validation -> set_rules ('hindi_name', 'Hindi Name', 'trim|required');
        $this -> form_validation -> set_rules ('slogan', 'Slogan', 'trim|required');
        $this -> form_validation -> set_rules ('color', 'Color', 'trim|required');
        $this -> form_validation -> set_rules ('top_bar_color', 'Top Bar Color', 'trim|required');
        $this -> form_validation -> set_rules ('state', 'State', 'trim|required');
        $this -> form_validation -> set_rules ('district', 'District', 'trim|required');
        $this -> form_validation -> set_rules ('zone', 'Zone', 'trim|required');
        if ($this -> form_validation -> run () == false)
        {
            $data['party_data'] = $this -> common_model -> get ('party', $where);
            $data['content']    = $this -> load -> view ('super-admin/party/edit', $data, true);
            $this -> load -> view ('templates/template', $data);
        }
        else
        {
            unset ($_POST['submit']);
            foreach ($_POST as $key => $value)
            {
                $content[$key] = $this -> input -> post ($key);
            }
            if ( ! empty ($_FILES))
            {
                foreach ($_FILES as $key => $value)
                {
                    if ( ! empty ($_FILES[$key]['name']))
                    {
                        $config        = ['upload_path' => 'uploads/party/', 'allowed_types' => 'gif|jpg|png'];
                        $file          = file_upload_admin ($key, $config);
                        $content[$key] = $_FILES[$key]['name'];
                    }
                }
            }
            $content['time_date'] = time ();
            $this -> common_model -> update ('party', $content, $where);
            set_message_admin ('Party updated successfully', 'success');
            redirect ('party');
        }
    }

    function validate_party ()
    {
        $valid_ext = ['jpg', 'jpeg', 'png'];
        if ( ! empty ($_FILES))
        {
            foreach ($_FILES as $key => $value)
            {
                if ( ! empty ($_FILES[$key]['name']))
                {
                    $ext = strtolower (pathinfo ($_FILES[$key]['name'], PATHINFO_EXTENSION));
                    if ( ! in_array ($ext, $valid_ext))
                    {
                        $this -> form_validation -> set_message ('validate_party', 'Please select valid images.');
                        return false;
                    }
                }
            }
        }
        else
        {
            $this -> form_validation -> set_message ('validate_admin', 'Please select Main Screen image');
            return false;
        }
        return true;
    }

    /*
     * Extra Functions may be not in use
     */

    public function add ()
    {
        $this -> form_validation -> set_rules ('short_name', 'Short Name', 'trim|required|callback_validate_party');
        $this -> form_validation -> set_rules ('english_name', 'English Name', 'trim|required');
        $this -> form_validation -> set_rules ('hindi_name', 'Hindi Name', 'trim|required');
        $this -> form_validation -> set_rules ('slogan', 'Slogan', 'trim|required');
        $this -> form_validation -> set_rules ('color', 'Color', 'trim|required');
        $this -> form_validation -> set_rules ('top_bar_color', 'Top Bar Color', 'trim|required');
        $this -> form_validation -> set_rules ('state', 'State', 'trim|required');
        $this -> form_validation -> set_rules ('district', 'District', 'trim|required');
        $this -> form_validation -> set_rules ('zone', 'Zone', 'trim|required');
        if ($this -> form_validation -> run () == false)
        {
            $data['content'] = $this -> load -> view ('super-admin/party/add', '', true);
            $this -> load -> view ('templates/template', $data);
        }
        else
        {
            unset ($_POST['submit']);
            foreach ($_POST as $key => $value)
            {
                $content[$key] = $this -> input -> post ($key);
            }
            foreach ($_FILES as $key => $value)
            {
                $config        = ['upload_path' => 'uploads/party/', 'allowed_types' => 'gif|jpg|png'];
                $file          = file_upload_admin ($key, $config);
                $content[$key] = $_FILES[$key]['name'];
            }

            $content['time_date'] = time ();
            $this -> common_model -> insert ('party', $content);
            set_message_admin ('Party added successfully', 'success');
            redirect ('party');
        }
    }

    /**
     * @param $id
     */
    function delete ($id)
    {
        if (is_string ($id))
        {
            $update['status'] = 2;
            $where['id']      = $id;
            $this -> common_model -> update ('party', $update, $where);
            set_message_admin ('Party deleted successfully', 'success');
        }
        redirect ('party');
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
            $this -> common_model -> update ('party', $update, $where);
            set_message_admin ('Party Status changed successfully', 'success');
        }
        redirect ('party');
    }

}

?>