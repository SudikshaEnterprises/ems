<?php

if (!defined ('BASEPATH'))
    exit ('No direct script access allowed');

/**
 * Class Common_model
 */
class Common_model extends CI_Model {

    /**
     * Common_model constructor.
     */
    function __construct ()
    {
        parent::__construct ();
    }

    /**
     * @param        $table_name
     * @param array  $where
     * @param string $fields
     * @return mixed
     */
    function get ($table_name, $where = [], $fields = '*')
    {
        $this->db->select ($fields);
        if (count ($where) > 0)
        {
            $this->db->where ($where);
        }
        $result = $this->db->get ($table_name);
        return $result;
    }

    function get_ward ($where = [])
    {
        if (count ($where) > 0)
        {
            $this->db->where ($where);
        }
        $this->db->select ('ward.*, thana.unique_id as thana_unique_id');
        $this->db->join ('thana', 'thana.id=ward.thana_id');
        $result = $this->db->get ('ward');
        return $result;
    }

    function get_polling_station ($where = [])
    {
        if (count ($where) > 0)
        {
            $this->db->where ($where);
        }
        $this->db->select ('polling_station.*, ward.unique_id as ward_unique_id');
        $this->db->join ('ward', 'ward.id=polling_station.ward_id');
        $this->db->join ('thana', 'thana.id=ward.thana_id');
        $result = $this->db->get ('polling_station');
        return $result;
    }

    function get_booth ($where = [])
    {
        if (count ($where) > 0)
        {
            $this->db->where ($where);
        }
        $this->db->select ('booth.*, polling_station.unique_id as polling_station_unique_id');
        $this->db->join ('polling_station', 'polling_station.id=booth.polling_station_id');
        $this->db->join ('ward', 'ward.id=polling_station.ward_id');
        $this->db->join ('thana', 'thana.id=ward.thana_id');
        $result = $this->db->get ('booth');
        return $result;
    }

    function get_thana_search ($where = [])
    {
        if (count ($where) > 0)
        {
            $this->db->where ($where);
        }
        $this->db->select ('thana.english_name as th_eng_name, thana.hindi_name as th_hindi_name, booth.total_voter_booth, ward.english_name as ward_eng_name, ward.hindi_name as ward_hindi_name');
        $this->db->join ('polling_station', 'polling_station.id=booth.polling_station_id');
        $this->db->join ('ward', 'ward.id=polling_station.ward_id');
        $this->db->join ('thana', 'thana.id=ward.thana_id');
        $result = $this->db->get ('booth');
        return $result;
    }

    function get_anubagh ()
    {
        $this->db->select ('anubagh.*, booth.unique_id as booth_unique_id');
        $this->db->join ('booth', 'booth.id=anubagh.booth_id');
        $this->db->join ('polling_station', 'polling_station.id=booth.polling_station_id');
        $this->db->join ('ward', 'ward.id=polling_station.ward_id');
        $this->db->join ('thana', 'thana.id=ward.thana_id');
        $result = $this->db->get ('anubagh');
        return $result;
    }

    function get_candidate ($where = [])
    {
        if (count ($where) > 0)
        {
            $this->db->where ($where);
        }
        $this->db->select ('candidate.*,booth.*, booth.unique_id as  booth_unique_id');
        $this->db->join ('booth', 'booth.id=candidate.booth_id');
        $this->db->join ('polling_station', 'polling_station.id=booth.polling_station_id');
        $this->db->join ('ward', 'ward.id=polling_station.ward_id');
        $this->db->join ('thana', 'thana.id=ward.thana_id');
        $result = $this->db->get ('candidate');
        return $result;
    }

    /**
     * @param $table_name
     * @param $data
     * @param $where
     * @return mixed
     */
    function update ($table_name, $data, $where)
    {
        $this->db->update ($table_name, $data, $where);
        if ($this->db->affected_rows () > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * @param $table_name
     * @param $data
     * @return mixed
     */
    function insert ($table_name, $data)
    {
        $this->db->insert ($table_name, $data);
        if ($this->db->affected_rows () > 0)
        {
            return $this->db->insert_id ();
        }
        else
        {
            return false;
        }
    }

    /**
     * @param $table_name
     * @param $where
     * @return bool
     */
    function delete ($table_name, $where)
    {
        $this->db->where ($where);
        $this->db->delete ($table_name);
        if ($this->db->affected_rows () > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * @param $table_name
     * @param $data
     * @return mixed
     */
    function insert_batch ($table_name, $data)
    {
        $this->db->insert_batch ($table_name, $data);
        if ($this->db->affected_rows () > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * @param $sql
     * @return mixed
     */
    function query ($sql)
    {
        return $this->db->query ($sql);
    }

}
