<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
use App\Libs\ApiClient;

class Fees extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		auth_force();
		$this->load->helper('url');
		$this->load->library('tank_auth');
	}


	public function _example_output($output = null)
	{
		$this->load->view('crud.php',(array)$output);
	}

	public function index()
	{
		$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}


		public function payment()
	{ 

		 $students = Models\StudentsRegistration::paginate(10);
		
		 $this->load->view('fees/payment',[
		 	'data' => $students
		 ]);

	} 


	function on_update_encrypt_password_callback($post_array){
		if($post_array['password'] != '__DEFAULT_PASSWORD_'){
      $password=$post_array['password'];
			$hasher = new PasswordHash(
	    		$this->config->item('phpass_hash_strength', 'tank_auth'),
		    	$this->config->item('phpass_hash_portable', 'tank_auth')
			);

			$post_array['password'] = $hasher->HashPassword($password);
			$post_array['activated'] = 1;
			return $post_array;
		}

		unset($post_array['password']);
		return $post_array;
	}

	  function edit_password_callback($post_array){
		return '<input type="password" class="form-control" value="__DEFAULT_PASSWORD_" name="password" style="width:462px">';
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
