<?php

defined ('BASEPATH') OR exit ('No direct script access allowed');

class Candidate extends CI_Controller {

    public function __construct ()
    {
        parent::__construct ();
    }

    public function index ()
    {
        // $where['status!='] = '2';
        $data['party_data'] = $this -> common_model -> get ('party');
        $data['candidate']  = $this -> common_model -> get_candidate ();

        $data['content']    = $this -> load -> view ('constitutency/candidate/listing', $data, true);
        $this -> load -> view ('templates/template', $data);
    }

    function validate_anubagh ()
    {
        $where['english_name'] = $this -> input -> post ('english_name');
        $where['year']         = $this -> input -> post ('year');
        $result                = $this -> common_model -> get ('anubagh', $where);
        if ($result -> num_rows () > 0)
        {
            $this -> form_validation -> set_message ('validate_anubagh', 'Anubagh Name already exist for this year ');
            return false;
        }
        return true;
    }

    public function add ()
    {
        $this -> form_validation -> set_rules ('unique_id', 'Anubagh ID', 'trim|required|callback_validate_anubagh');
        $this -> form_validation -> set_rules ('year', 'Year', 'trim|required');
        $this -> form_validation -> set_rules ('candidate_name', 'Candidate Name', 'trim|required');
        $this -> form_validation -> set_rules ('party_short_name', 'Party Short Name', 'trim|required');
        if ($this -> form_validation -> run () == false)
        {
            $data['party_data'] = $this -> common_model -> get ('party');
            $data['booth']    = $this -> common_model -> get ('booth');
            $data['content']    = $this -> load -> view ('constitutency/candidate/add', $data, true);
            $this -> load -> view ('templates/template', $data);
        }
        else
        {
            unset ($_POST['submit']);
            foreach ($_POST as $key => $value)
            {
                $content[$key] = $this -> input -> post ($key);
            }
            $this -> common_model -> insert ('candidate', $content);

            set_message_admin ('Anubagh added successfully', 'success');
            redirect ('/constitutency/candidate');
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
            $this -> common_model -> delete ('anubagh', $where);
            set_message_admin ('Anubagh deleted successfully', 'success');
        }
        redirect ('/constituency/candidate');
    }

    function edit ($id)
    {
        $this -> form_validation -> set_rules ('unique_id', 'Thana ID', 'trim|required');
        $this -> form_validation -> set_rules ('year', 'Year', 'trim|required');
        $this -> form_validation -> set_rules ('candidate_name', 'Candidate Name', 'trim|required');
        $this -> form_validation -> set_rules ('party_short_name', 'Party Short Name', 'trim|required');
        if ($this -> form_validation -> run () == false)
        {
            $where              = ['id' => $id];
            $data['candidate']  = $this -> common_model -> get ('candidate', $where);
            $data['booth']    = $this -> common_model -> get ('booth');
            $data['anubagh']    = $this -> common_model -> get ('anubagh');

            $data['content'] = $this -> load -> view ('constitutency/candidate/edit', $data, true);
            $this -> load -> view ('templates/template', $data);
        }
        else
        {
            unset ($_POST['submit']);
            unset ($_POST['0']);
            
//            pre($_POST);
            foreach ($_POST as $key => $value)
            {
                $content[$key] = $this -> input -> post ($key);
            }

            $where = ['id' => $id];
            $this -> common_model -> update ('candidate', $content, $where);

            set_message_admin ('candidate updated successfully', 'success');
            redirect ('/constitutency/candidate');
        }
    }

    /**
     * @return bool
     */
//    function validate_candidate_edit ()
//    {
//        $where['english_name'] = $this -> input -> post ('english_name');
//        $where['year']         = $this -> input -> post ('year');
//        $where['id!=']         = $this -> input -> post ('id');
//        $result                = $this -> common_model -> get ('thana', $where);
//        //show_query();
//        if ($result -> num_rows () > 0)
//        {
//            $this -> form_validation -> set_message ('validate_thana_edit', 'Thana Name already exist for this year ');
//            return false;
//        }
//        return true;
//    }

    public function csv_upload ()
    {
        $csv_content  = array ();
        $handle       = fopen ($_FILES['csv']['tmp_name'], "r");
        $total_column = count (fgetcsv ($handle));

        #mention all field names that are in CSV and DB
        $db_fields = ['year', 'unique_id', 'candidate_name', 'party_short_name', 'vote_get', 'anubagh_id'];

        while (($data = fgetcsv ($handle, 1000, ",")) !== FALSE) //row
        {
            for ($i = 0; $i < $total_column; $i ++ ) // for columns
            {
                $content[$db_fields[$i]] = $data[$i];
            }
            $this -> common_model -> insert ('candidate', $content);
        }
        fclose ($handle);

        if (is_uploaded_file ($_FILES['csv']['tmp_name']))
        {
            set_message_admin ('Anubagh added successfully', 'success');
            redirect ('./constitutency/candidate');
        }
        else
        {
            
        }
    }

    function download_csv ()
    {
        header ("Content-Type: text/csv");
        header ("Content-Disposition: attachment; filename=candidate.csv");

        // Disable caching
        // header ("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1
        // header ("Pragma: no-cache"); // HTTP 1.0
        // header ("Expires: 0"); // Proxies

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
                'year', 'unique_id', 'candidate_name', 'party_short_name', 'vote_get', 'anubagh_id'
            )
        ));
        $candidate = $this -> common_model -> get ('candidate');

        if ($candidate -> num_rows () > 0)
        {
            foreach ($candidate -> result () as $list)
            {
                outputCSV (array (
                    array (
                        $list -> id,
                        $list -> year,
                        $list -> unique_id,                       
                        $list -> candidate_name,
                        $list -> party_short_name,
                        $list -> vote_get,
                        $list -> anubagh_id
                        )
                ));
            }
        }
    }
}

?>