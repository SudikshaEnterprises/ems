<?php

defined ('BASEPATH') OR exit ('No direct script access allowed');

class Booth extends CI_Controller {

    public function __construct ()
    {
        parent::__construct ();
    }

    public function index ()
    {
        $data['party_data'] = $this -> common_model -> get ('party');
        $data['booth']      = $this -> common_model -> get_booth ();
      //  show_query();
        $data['content']    = $this -> load -> view ('constitutency/booth/listing', $data, true);
        $this -> load -> view ('templates/template', $data);
    }

    function validate_booth ()
    {
        $where['english_name'] = $this -> input -> post ('english_name');
        $where['year']         = $this -> input -> post ('year');
        $result                = $this -> common_model -> get ('booth', $where);
        if ($result -> num_rows () > 0)
        {
            $this -> form_validation -> set_message ('validate_booth', 'Thana Name already exist for this year ');
            return false;
        }
        return true;
    }

    public function add ()
    {
        $this -> form_validation -> set_rules ('unique_id', 'Thana ID', 'trim|required|callback_validate_booth');
        $this -> form_validation -> set_rules ('year', 'Year', 'trim|required');
        $this -> form_validation -> set_rules ('english_name', 'English Name', 'trim|required');
        $this -> form_validation -> set_rules ('hindi_name', 'Hindi Name', 'trim|required');
        $this -> form_validation -> set_rules ('total_voter_booth', 'Total vooter of Booth', 'trim|required');
        $this -> form_validation -> set_rules ('voter_turnout', 'Voter Turnout', 'trim|required');
        $this -> form_validation -> set_rules ('male_voter_turnout', 'Male Voter Turnout', 'trim|required');
        $this -> form_validation -> set_rules ('female_voter_turnout', 'Female Voter Turnout', 'trim|required');
        $this -> form_validation -> set_rules ('target', 'Target', 'trim|required');
        if ($this -> form_validation -> run () == false)
        {
            $data['polling_station'] = $this -> common_model -> get ('polling_station');
            $data['party_data']      = $this -> common_model -> get ('party');
            $data['content']         = $this -> load -> view ('constitutency/booth/add', $data, true);
            $this -> load -> view ('templates/template', $data);
        }
        else
        {
            unset ($_POST['submit']);
            foreach ($_POST as $key => $value)
            {
                $content[$key] = $this -> input -> post ($key);
            }
            $this -> common_model -> insert ('booth', $content);
            set_message_admin ('Booth added successfully', 'success');
            redirect ('/constitutency/booth');
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
            $this -> common_model -> delete ('booth', $where);
            set_message_admin ('Thana deleted successfully', 'success');
        }
        redirect ('/constitutency/booth');
    }

    function edit ($id)
    {
        $this -> form_validation -> set_rules ('unique_id', 'Thana ID', 'trim|required|callback_validate_booth_edit');
        $this -> form_validation -> set_rules ('year', 'Year', 'trim|required');
        $this -> form_validation -> set_rules ('english_name', 'English Name', 'trim|required');
        $this -> form_validation -> set_rules ('hindi_name', 'Hindi Name', 'trim|required');
        $this -> form_validation -> set_rules ('total_voter_booth', 'Total vooter of Booth', 'trim|required');
        $this -> form_validation -> set_rules ('voter_turnout', 'Voter Turnout', 'trim|required');
        $this -> form_validation -> set_rules ('male_voter_turnout', 'Male Voter Turnout', 'trim|required');
        $this -> form_validation -> set_rules ('female_voter_turnout', 'Female Voter Turnout', 'trim|required');
        $this -> form_validation -> set_rules ('target', 'Target', 'trim|required');
        if ($this -> form_validation -> run () == false)
        {
            $where                   = ['id' => $id];
            $data['booth']           = $this -> common_model -> get ('booth', $where);
            $data['polling_station'] = $this -> common_model -> get ('polling_station');
            $data['party_data']      = $this -> common_model -> get ('party');

            $data['content'] = $this -> load -> view ('constitutency/booth/edit', $data, true);
            $this -> load -> view ('templates/template', $data);
        }
        else
        {
            unset ($_POST['submit']);
            foreach ($_POST as $key => $value)
            {
                $content[$key] = $this -> input -> post ($key);
            }

            $where = ['id' => $id];
            $this -> common_model -> update ('booth', $content, $where);

            set_message_admin ('Admin updated successfully', 'success');
            redirect ('/constitutency/booth');
        }
    }

    /**
     * @return bool
     */
    function validate_booth_edit ()
    {
        $where['english_name'] = $this -> input -> post ('english_name');
        $where['year']         = $this -> input -> post ('year');
        $where['id!=']         = $this -> input -> post ('id');
        $result                = $this -> common_model -> get ('booth', $where);
        //show_query();
        if ($result -> num_rows () > 0)
        {
            $this -> form_validation -> set_message ('validate_booth_edit', 'Thana Name already exist for this year ');
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
        $db_fields = ['year', 'unique_id', 'english_name', 'hindi_name', 'polling_station_id',
'total_voter_booth', 'voter_turnout', 'male_voter_turnout', 'female_voter_turnout', 'target'];
        while (($data = fgetcsv ($handle, 1000, ",")) !== FALSE) //row
        {
            for ($i = 0; $i < $total_column; $i ++ ) // for columns 
            {
                $content[$db_fields[$i]] = $data[$i];
            }

            $this -> common_model -> insert ('booth', $content);
        }
        fclose ($handle);

        if (is_uploaded_file ($_FILES['csv']['tmp_name']))
        {
            set_message_admin ('Booth added successfully', 'success');
            redirect ('./constitutency/booth');
        }
        else
        {
            
        }
    }

    function download_csv ()
    {
        header ("Content-Type: text/csv");
        header ("Content-Disposition: attachment; filename=booth.csv");
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
                'Booth Unique ID',
                'pooling station ID',
                'English Name',
                'Hindi Name',
                'total_voter_booth',
                'voter_turnout', 
                'male_voter_turnout', 
                'female_voter_turnout', 
                'target'
            )
        ));
        $booth = $this -> common_model -> get ('booth');

        if ($booth -> num_rows () > 0)
        {
            foreach ($booth -> result () as $list)
            {
                outputCSV (array (
                    array (
                        $list -> id,
                        $list -> year,
                        $list -> unique_id,
                        $list -> polling_station_id,
                        $list -> english_name,
                        $list -> hindi_name,
                        $list -> total_voter_booth,
                        $list -> voter_turnout,
                        $list -> male_voter_turnout,
                        $list -> female_voter_turnout,
                        $list -> target)
                ));
            }
        }
    }

}

?>