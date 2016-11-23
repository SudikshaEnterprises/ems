<?php

defined ('BASEPATH') OR exit ('No direct script access allowed');

class Ward extends CI_Controller {

    public function __construct ()
    {
        parent::__construct ();
    }

    public function index ()
    {
        $data['party_data'] = $this->common_model->get ('party');
        $data['ward']       = $this->common_model->get_ward ();   
        $data['content']    = $this->load->view ('constitutency/ward/listing', $data, true);
        $this->load->view ('templates/template', $data);
    }

    function validate_ward ()
    {
        $where['english_name'] = $this->input->post ('english_name');
        $where['year']         = $this->input->post ('year');
        $result                = $this->common_model->get ('ward', $where);
        if ($result->num_rows () > 0)
        {
            $this->form_validation->set_message ('validate_ward', 'Thana Name already exist for this year ');
            return false;
        }
        return true;
    }

    public function add ()
    {
        $this->form_validation->set_rules ('unique_id', 'Thana ID', 'trim|required|callback_validate_ward');
        $this->form_validation->set_rules ('year', 'Year', 'trim|required');
        $this->form_validation->set_rules ('english_name', 'English Name', 'trim|required');
        $this->form_validation->set_rules ('hindi_name', 'Hindi Name', 'trim|required');
        if ($this->form_validation->run () == false)
        {
            $data['thana']      = $this->common_model->get ('thana');
            $data['party_data'] = $this->common_model->get ('party');
            $data['content']    = $this->load->view ('constitutency/ward/add', $data, true);
            $this->load->view ('templates/template', $data);
        }
        else
        {
            unset ($_POST['submit']);
            foreach ($_POST as $key => $value)
            {
                $content[$key] = $this->input->post ($key);
            }
            $this->common_model->insert ('ward', $content);

            set_message_admin ('Thana added successfully', 'success');
            redirect ('/constitutency/ward');
        }
    }

   

    /**
     * @param $id
     */
    function delete ($id)
    {
        if (is_string ($id))
        {
            $where = ['id' => $id];
            $this->common_model->delete ('ward', $where);
            set_message_admin ('Thana deleted successfully', 'success');
        }
        redirect ('/constitutency/ward');
    }

    function edit ($id)
    {
        $this->form_validation->set_rules ('unique_id', 'Thana ID', 'trim|required|callback_validate_ward_edit');
        $this->form_validation->set_rules ('year', 'Year', 'trim|required');
        $this->form_validation->set_rules ('english_name', 'English Name', 'trim|required');
        $this->form_validation->set_rules ('hindi_name', 'Hindi Name', 'required');
        if ($this->form_validation->run () == false)
        {
            $where              = ['id' => $id];
            $data['ward']       = $this->common_model->get ('ward', $where);
            $data['thana']      = $this->common_model->get ('thana');
            $data['party_data'] = $this->common_model->get ('party');

            $data['content'] = $this->load->view ('constitutency/ward/edit', $data, true);
            $this->load->view ('templates/template', $data);
        }
        else
        {
            unset ($_POST['submit']);
            foreach ($_POST as $key => $value)
            {
                $content[$key] = $this->input->post ($key);
            }

            $where = ['id' => $id];
            $this->common_model->update ('ward', $content, $where);

            set_message_admin ('Admin updated successfully', 'success');
            redirect ('/constitutency/ward');
        }
    }

    /**
     * @return bool
     */
    function validate_ward_edit ()
    {
        $where['english_name'] = $this->input->post ('english_name');
        $where['year']         = $this->input->post ('year');
        $where['id!=']         = $this->input->post ('id');
        $result                = $this->common_model->get ('ward', $where);
        //show_query();
        if ($result->num_rows () > 0)
        {
            $this->form_validation->set_message ('validate_ward_edit', 'Thana Name already exist for this year ');
            return false;
        }
        return true;
    }
    public function csv_upload ()
    {
        $csv_content  = array ();
        $handle       = fopen ($_FILES['csv']['tmp_name'], "r");
        $total_column = count (fgetcsv ($handle));

        #mention all field names that are in CSV and DB 
        $db_fields = ['year', 'unique_id', 'english_name', 'hindi_name', 'thana_id'];

        while (($data = fgetcsv ($handle, 1000, ",")) !== FALSE) //row
        {
            for ($i = 0; $i < $total_column; $i ++ ) // for columns 
            {
                $content[$db_fields[$i]] = $data[$i];
            }
           
            $this -> common_model -> insert ('ward', $content);
        }
        fclose ($handle);

        if (is_uploaded_file ($_FILES['csv']['tmp_name']))
        {
            set_message_admin ('Ward added successfully', 'success');
            redirect ('./constitutency/ward');
        }
        else
        {
            
        }
    }

    function download_csv ()
    {
        header ("Content-Type: text/csv");
        header ("Content-Disposition: attachment; filename=ward.csv");
        // Disable caching
        header ("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1
        header ("Pragma: no-cache"); // HTTP 1.0
        header ("Expires: 0"); // Proxies

        function outputCSV ($data)
        {
            $output = fopen ("php://output", "w");
            foreach ($data as $row)
            {
                fputcsv ($output, $row); // here you can change delimiter/enclosure
            }
            fclose ($output);
        }

        outputCSV (array (
            array (
                'Sno',
                'Year',
                'Ward Unique ID',
                'Thana ID',
                'English Name',
                'Hindi Name'
            )
        ));
        $ward = $this -> common_model -> get ('ward');

        if ($ward -> num_rows () > 0)
        {
            foreach ($ward -> result () as $list)
            {
                outputCSV (array (
                    array (
                        $list -> id,
                        $list -> year,
                        $list -> unique_id,
                        $list -> thana_id,
                        $list -> english_name,
                        $list -> hindi_name)
                ));
            }
        }
    }

}

?>