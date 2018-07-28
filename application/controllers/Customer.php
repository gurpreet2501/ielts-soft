<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
use App\Libs\ApiClient;

class Customer extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		auth_force();
		$this->load->helper('url');
		$this->load->library('tank_auth');
	}

	function index()
	{
		
		$this->load->view('customer-dashboard');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
