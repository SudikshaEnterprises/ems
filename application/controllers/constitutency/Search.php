<?php

defined ('BASEPATH') OR exit ('No direct script access allowed');

class Search extends CI_Controller {

    public function __construct ()
    {
        parent::__construct ();
    }

    public function index ()
    {
        $this->form_validation->set_rules ('year1', 'Must Select First year', 'trim|required');
        $this->form_validation->set_rules ('year2', 'Must Select Second year', 'trim|required');
        $this->form_validation->set_rules ('booth_id', 'Must Select Booth', 'trim|required');

        if ($this->form_validation->run () == FALSE)
        {
            $data['listing'] = 'hide';
        }
        else
        {
            $search['candidate.year']      = $this->input->post ('year1');
            $search['candidate.booth_id']  = $this->input->post ('booth_id');
            $data['search_candidate_data'] = $this->common_model->get_candidate ($search);

            $search2['booth.year']     = $this->input->post ('year2');
            $search2['booth.id']       = $this->input->post ('booth_id');
            $data['search_booth_data'] = $this->common_model->get_booth ($search2);

            $data['listing'] = 'show';
        }


        $data['party_data'] = $this->common_model->get ('party');
        $data['booth_data'] = $this->common_model->get_booth ();
        # get booth search data
        $data['content']    = $this->load->view ('constitutency/search', $data, true);
        $this->load->view ('templates/template', $data);
    }

    public function viewConstitutency ()
    {
        $data['year_listing']  = 'hide';
        $data['thana_listing'] = 'hide';
        if ($this->input->post ('year') && $this->input->post ('thana_id'))
        {
            $data['thana_listing'] = 'show';
            $where['thana.year']   = $this->input->post ('year');
            $where['thana.id']     = $this->input->post ('thana_id');
            $data['total_thana']         = $this->common_model->get ('thana', $where);
            // show_query();
        }
        elseif ($this->input->post ('year'))
        {
            $total_thana         = 0;
            $where['thana.year'] = $this->input->post ('year');
            $total_thana         = $this->common_model->get ('thana', $where);
            $data['total_thana'] = $total_thana->num_rows ();

            $total_ward         = $this->common_model->get_ward ($where);
            $data['total_ward'] = $total_ward->num_rows ();

            $total_polling_station         = $this->common_model->get_polling_station ($where);
            $data['total_polling_station'] = $total_polling_station->num_rows ();

            $total_booth          = $this->common_model->get_booth ($where);
            $data['total_booth']  = $total_booth->num_rows ();
            $data['year_listing'] = 'show';
        }
        $data['party_data'] = $this->common_model->get ('party');
        $data['thana']      = $this->common_model->get ('thana');

        # get booth search data
        $data['content'] = $this->load->view ('constitutency/view_constitutency', $data, true);
        $this->load->view ('templates/template', $data);
    }

    public function get_ward_id () // for ward dropdown only
    {
        $where['ward.thana_id='] = $this->input->post ('id');
        echo json_encode ($this->common_model->get_ward ($where)->result ());
    }

    public function get_polling_station_id () // for booth dropdown only
    {
        $where['polling_station.ward_id='] = $this->input->post ('id');
        echo json_encode ($this->common_model->get_polling_station ($where)->result ());
    }

    public function get_booth_id () // for booth dropdown only
    {
        $where['booth.polling_station_id='] = $this->input->post ('id');
        echo json_encode ($this->common_model->get_booth ($where)->result ());
    }

}

?>