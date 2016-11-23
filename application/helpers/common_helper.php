<?php if(!defined('BASEPATH'))
	exit('No direct script access allowed');
	/**
	 * @param     $array
	 * @param int $die
	 */
	function pre($array, $die = 1){
		echo '<pre>';
		print_r($array);
		echo '</pre>';
		if($die == 1){
			exit;
		}
	}

	/**
	 * @param int $die
	 */
	function show_query($die = 1){
		$CI = &get_instance();
		echo $CI->db->last_query();
		if($die == 1){
			exit;
		}
	}

	/**
	 * @param $email_data
	 * @return bool
	 */
	function _send_email($email_data){
		$CI = &get_instance();
		$CI->load->library('email');
		$config['mailtype'] = 'html';
		$config['charset']  = 'iso-8859-1';
		$config['wordwrap'] = true;
		$CI->email->initialize($config);
		$email_sent = $CI->email->from($email_data['form'])
								->to($email_data['to'])
								->subject($email_data['subject'])
								->message($email_data['message'])
								->set_crlf("\r\n")
								->send();
		if(!$email_sent){
			return false;
		}
		return true;
	}