<?php

defined ('BASEPATH') OR exit ('No direct script access allowed');

class SuperAdmin extends CI_Controller {

    public function __construct ()
    {
        parent::__construct ();
    }

    public function login ()
    {
        $this -> form_validation -> set_rules ('username', 'User name', 'trim|required');
        $this -> form_validation -> set_rules ('password', 'Password', 'trim|required|callback_ValidateLogin');
        if ($this -> form_validation -> run () == false)
        {
            $data['content'] = $this -> load -> view ('login/login', '', true);
            $this -> load -> view ('templates/login_template', $data);
        }
        else
        {
            redirect ('dashboard');
        }
    }

    /**
     * @return bool
     */
    function ValidateLogin ()
    {
        if ($this -> input -> post ('password') != '')
        {
            $this -> load -> library ('encrypt');
            $username                 = $this -> input -> post ('username');
            $password                 = base64_encode (base64_encode ($this -> input -> post ('password')));
            $where['admin_user_name'] = $username;
            $where['admin_password']  = $password;
            $result                   = $this -> common_model -> get ('super_admin', $where);
            if ($result -> num_rows () > 0)
            {
                $admin_data = $result -> row ();
                $this -> session -> set_userdata ('BmsCartAdminLoginId', $admin_data -> id);
                $this -> session -> set_userdata ('BmsCartAdminUserType',$admin_data -> admin_user_type);
                $this -> session -> set_userdata ('BmsCartAdminUserName', $username);
                $this -> session -> set_userdata ('BmsCartAdminEmail', $admin_data -> admin_email);
                return true;
            }
            else
            {
                $this -> form_validation -> set_message ('ValidateLogin', 'User name or password is invalid.');
                return false;
            }
        }
        return true;
    }

    function logout ()
    {
        $this -> session -> unset_userdata ('BmsCartAdminLoginId');
        $this -> session -> unset_userdata ('BmsCartAdminUserName');
        $this -> session -> unset_userdata ('BmsCartAdminUserType');
        $this -> session -> unset_userdata ('BmsCartAdminEmail');
        redirect ('SuperAdmin/login');
    }

    /*
     * Not in use functions yet
     */

    function forgot_password ()
    {
        $this -> form_validation -> set_rules ('email', 'Email', 'required|valid_email|callback_validate_email');
        if ($this -> form_validation -> run () == false)
        {
            $data['content'] = $this -> load -> view ('admin/login/forgot_password', '', true);
            $this -> load -> view ('admin/templates/login_template', $data);
        }
        else
        {
            redirect ('users');
        }
    }

    /**
     * @param $id
     * @param $token
     */
    function reset_password ($id, $token)
    {
        $where['id']    = $id;
        $where['token'] = $token;
        $result         = $this -> common_model -> get ('super_admin', $where);
        if ($result -> num_rows () <= 0)
        {
            redirect ('');
        }
        $this -> form_validation -> set_rules ('password', 'Password', 'trim|required');
        $this -> form_validation -> set_rules ('confirm_password', 'Confirm Password', 'trim|required|matches[password]');
        if ($this -> form_validation -> run () == false)
        {
            $data['content'] = $this -> load -> view ('admin/login/reset_password', '', true);
            $this -> load -> view ('admin/templates/login_template', $data);
        }
        else
        {
            $update['admin_password'] = base64_encode (base64_encode ($this -> input -> post ('password')));
            $update['token']          = '';
            $condition                = ['id' => $id];
            $update                   = $this -> common_model -> update ('admin', $update, $condition);
            if ($update)
            {
                set_message_admin ('Password reset successfully', 'success');
            }
            else
            {
                set_message_admin (config_item ('admin_error_message'), 'danger');
            }
            redirect ('admin');
        }
    }

    /**
     * @return bool
     */
    function validate_email ()
    {
        $email     = $this -> input -> post ('email');
        $condition = ['admin_email' => $email];
        $result    = $this -> common_model -> get ('super_admin', $condition);
        if ($result -> num_rows () > 0)
        {
            $UserInfo        = $result -> row ();
            $token           = bin2hex (openssl_random_pseudo_bytes (2)) . time () . md5 (md5 ($UserInfo -> id));
            $update['token'] = $token;
            $condition       = ['id' => $UserInfo -> id];
            $update          = $this -> common_model -> update ('super_admin', $update, $condition);
            if ( ! $update)
            {
                set_message_admin (config_item ('admin_error_message'), 'danger');
            }
            //---------------email to user--------------
            $this -> load -> library ('email');
            $EmailTemp             = $this -> load -> view ('admin/emails/forgot_password', '', true);
            $message               = $EmailTemp;
            $site_url              = site_url ();
            $link                  = $site_url . 'admin/login/reset_password/' . ($UserInfo -> id) . '/' . $token;
            $link                  = '<a href="' . $link . '">Reset Password</a>';
            $site_name             = config_item ('site_name');
            $find                  = ["{site_url}", "{site_name}", "{link}"];
            $replace               = [$site_url, $site_name, $link];
            $message               = str_replace ($find, $replace, $message);
            $email_data['subject'] = config_item ('site_name') . ' ~ Forgot Password';
            $email_data['form']    = config_item ('from_email');
            $email_data['to']      = $UserInfo -> admin_email;
            $email_data['message'] = $message;
            $send                  = _send_email ($email_data);
            if ($send)
            {
                set_message_admin ('An Email has been sent to the email address you enter', 'success');
            }
            else
            {
                set_message_admin ('There is an error in email sending, Please try again latter', 'danger');
            }
            redirect ('admin/forgot_password');
        }
        else
        {
            $this -> form_validation -> set_message ('validate_email', 'Email you entered is not in our record');
            return false;
        }
        return true;
    }

}

?>