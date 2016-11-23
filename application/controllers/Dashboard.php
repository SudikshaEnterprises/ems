<?php

defined ('BASEPATH') OR exit ('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct ()
    {
        parent::__construct ();
        is_login ();
        $this -> load -> model ('common_model');
    }

    public function index ()
    {
        $data['party_data'] = $this ->common_model->get('party');
        $data['content'] = $this -> load -> view ('dashboard', $data, true);
        $this -> load -> view ('templates/template', $data);
    }

}

?>