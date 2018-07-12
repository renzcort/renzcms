<?php 
/**
* 
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth
{
	protected $session_data;

	public function logged_in(){
		$CI =& get_instance();
		$CI->load->library('session');
		$session_data = $CI->session->userdata('logged_in');
		if(!$session_data) {
			redirect('admin/login','refresh');
		} else {
			return $session_data;
		}
	}
}