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

  $data['css_files'] = [base_url('assets/css/app-style.css')];
  $data['js_files'] = [
  	base_url('assets/plugins/simplebar/js/simplebar.js'),
		base_url('assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js'),
		base_url('assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js'),
		base_url('assets/plugins/sparkline-charts/jquery.sparkline.min.js'),
		base_url('assets/plugins/Chart.js/Chart.min.js'),
		base_url('assets/plugins/notifications/js/lobibox.min.js'),
		base_url('assets/plugins/notifications/js/notifications.min.js'),
		base_url('assets/plugins/index.js') 
  ];

		$this->load->view('customer-dashboard',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
