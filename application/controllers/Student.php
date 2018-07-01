<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
use App\Libs\ApiClient;

class Student extends CI_Controller
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


		public function add_student()
	{ 

			$crud = new grocery_CRUD();
			$crud->columns('id','email','phone','city','registration_confirmation');
			$crud->set_table('students_registration');
			$crud->where('added_by',user_id());
			$crud->field_type('registration_confirmation', 'dropdown', array('1' => 'Confirmed', '0' => 'Pending'));
			$crud->unique_fields(array('email','phone'));
			$crud->required_fields('name','email','phone','city','address','highest_qualification');
			$crud->set_field_upload('image','assets/uploads/students/profile_images');
			if($crud->getState()=='add')
				$crud->field_type('registration_confirmation','hidden',0);
			$crud->field_type('added_by','hidden',user_id());
			$crud->field_type('registration_date','hidden',date('Y-m-d H:i:s'));
			$crud->field_type('created_at','hidden',date('Y-m-d H:i:s'));
			$crud->field_type('updated_at','hidden',date('Y-m-d H:i:s'));
			$crud->set_theme('datatables');
	    $output = $crud->render();
			$this->_example_output($output);

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
