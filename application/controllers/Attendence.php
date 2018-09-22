<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
use App\Libs\ApiClient;
use App\Libs\AttendenceHandler;


class Attendence extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		auth_force();
		$this->load->helper('url');
		$this->load->library('tank_auth');
		// if(user_role() != 'ADMIN')
  //   	redirect('auth/logout');
	}

	function save()
	{
		if(empty($_GET))
			return 404;

		$obj =  new AttendenceHandler();
		$resp = $obj->processing($_GET);
		echo "<pre>";
		print_r(json_encode($resp,JSON_PRETTY_PRINT));
		exit;
		return $resp;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
