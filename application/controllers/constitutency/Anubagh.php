<?php

defined ('BASEPATH') OR exit ('No direct script access allowed');

class Anubagh extends CI_Controller {

    public function __construct ()
    {
        parent::__construct ();
    }

    public function index ()
    {
        // $where['status!='] = '2';
        $data['party_data'] = $this -> common_model -> get ('party');
        $data['anubagh']    = $this -> common_model -> get_anubagh ();
        $data['content']    = $this -> load -> view ('constitutency/anubagh/listing', $data, true);
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
        $this -> form_validation -> set_rules ('english_name', 'English Name', 'trim|required');
        $this -> form_validation -> set_rules ('hindi_name', 'Hindi Name', 'trim|required');
        $this -> form_validation -> set_rules ('total_voters', 'Total Voters', 'trim|required');
        if ($this -> form_validation -> run () == false)
        {
            $data['party_data'] = $this -> common_model -> get ('party');
            $data['booth_data'] = $this -> common_model -> get ('booth');
            $data['content']    = $this -> load -> view ('constitutency/anubagh/add', $data, true);
            $this -> load -> view ('templates/template', $data);
        }
        else
        {
            unset ($_POST['submit']);
            foreach ($_POST as $key => $value)
            {
                $content[$key] = $this -> input -> post ($key);
            }
            $this -> common_model -> insert ('anubagh', $content);

            set_message_admin ('Anubagh added successfully', 'success');
            redirect ('/constitutency/anubagh');
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
        redirect ('/constituency/anubagh');
    }

    function edit ($id)
    {
        $this -> form_validation -> set_rules ('unique_id', 'Thana ID', 'trim|required|callback_validate_anubagh_edit');
        $this -> form_validation -> set_rules ('year', 'Year', 'trim|required');
        $this -> form_validation -> set_rules ('english_name', 'English Name', 'trim|required');
        $this -> form_validation -> set_rules ('hindi_name', 'Hindi Name', 'required');
        if ($this -> form_validation -> run () == false)
        {
            $where              = ['id' => $id];
            $data['anubagh']    = $this -> common_model -> get ('anubagh', $where);
            $data['party_data'] = $this -> common_model -> get ('party');

            $data['content'] = $this -> load -> view ('constitutency/anubagh/edit', $data, true);
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
            $this -> common_model -> update ('anubagh', $content, $where);

            set_message_admin ('Anubagh updated successfully', 'success');
            redirect ('/constitutency/anubagh');
        }
    }

    /**
     * @return bool
     */
    function validate_anubagh_edit ()
    {
        $where['english_name'] = $this -> input -> post ('english_name');
        $where['year']         = $this -> input -> post ('year');
        $where['id!=']         = $this -> input -> post ('id');
        $result                = $this -> common_model -> get ('thana', $where);
        //show_query();
        if ($result -> num_rows () > 0)
        {
            $this -> form_validation -> set_message ('validate_thana_edit', 'Thana Name already exist for this year ');
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
        $db_fields = ['year', 'unique_id', 'english_name', 'hindi_name', 'total_voters', 'booth_id'];

        while (($data = fgetcsv ($handle, 1000, ",")) !== FALSE) //row
        {
            for ($i = 0; $i < $total_column; $i ++ ) // for columns
            {
                $content[$db_fields[$i]] = $data[$i];
            }
            $this -> common_model -> insert ('anubagh', $content);
        }
        fclose ($handle);

        if (is_uploaded_file ($_FILES['csv']['tmp_name']))
        {
            set_message_admin ('Anubagh added successfully', 'success');
            redirect ('./constitutency/anubagh');
        }
        else
        {
            
        }
    }

    function download_csv ()
    {
        header ("Content-Type: text/csv");
        header ("Content-Disposition: attachment; filename=anubagh.csv");

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
                'Anubagh ID',
                'Year',
                'English Name',
                'Hindi Name', 
                'total_voters', 
                'booth_id'
            )
        ));
        $anubagh = $this -> common_model -> get ('anubagh');

        if ($anubagh -> num_rows () > 0)
        {
            foreach ($anubagh -> result () as $list)
            {
                outputCSV (array (
                    array (
                        $list -> id,
                        $list -> unique_id,
                        $list -> year,
                        $list -> english_name,
                        $list -> hindi_name,
                        $list -> total_voters,
                        $list -> booth_id
                        )
                ));
            }
        }
    }

}

?>