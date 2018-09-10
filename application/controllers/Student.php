<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
use App\Libs\ApiClient;
use App\Libs\MobileSms;

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

	public function bulk_sms(){
		$courses = Models\Courses::where('added_by',user_id())->get();

		$js_files = [
			base_url('assets/js/input-clearance.js')
		];

		$data['js_files'] = $js_files;
		$data['courses'] = $courses;

		$this->load->view('student/bulk-sms',$data);
	}

	public function bulk_sms_post(){
		
		
		foreach ($_POST as $key => $value)
			$data[$key] = htmlspecialchars($value);
		
		  $students = Models\StudentsRegistration::with('studentCourses')->where('added_by', user_id())->get();
		$phone_nos = [];
		
		foreach ($students as $key => $student) {
			foreach ($student->studentCourses as $key => $course) {
				if($course->pivot->course_id == $data['course_id']){
							$phone_nos[] = 	$student->phone;
				}

			}
		}

		MobileSms::sendToMany($phone_nos,$data['sms_text']);			
		success('Sms Sent Successfully');
		redirect('student/bulk_sms');
	}

		public function add_student()
	{ 

			$crud = new grocery_CRUD();
			
			$crud->columns('student_unique_code','email','phone','registration_date','registration_confirmation','fees_status');
			$crud->set_table('students_registration');
			$crud->add_action('Pay Fees', '', 'fees/details','fa fa-cc-visa');
			$crud->where('added_by',user_id());
			$crud->display_as('id','#Student Id');
			$crud->display_as('city_id','City');
			$crud->display_as('state_id','State');
			$crud->display_as('country_id','Country');
			$crud->callback_after_insert(array($this, 'update_student_unique_code'));
			$crud->set_relation('country_id','countries','name');
			$crud->set_relation('state_id','states','name');
			$crud->set_relation('city_id','cities','name');
			$crud->callback_after_update(array($this, 'update_student_unique_code'));
			$crud->set_relation_n_n('courses', 'students_registration_courses', 'courses', 'students_registration_id', 'course_id', 'course_name','',['courses.added_by' => user_id()]);
			$crud->unset_texteditor('address');
			$crud->field_type('registration_confirmation', 'dropdown', array('1' => 'Confirmed', '0' => 'Pending'));
			// $crud->unique_fields(array('email','phone'));
			$crud->required_fields('name','email','phone','city','address','highest_qualification');
			$crud->set_field_upload('profile_image','assets/uploads/students/profile_images');

			if($crud->getState()=='add'){
				$crud->field_type('registration_confirmation','hidden',0);
			  $crud->field_type('fees_status','hidden');
			}

			$crud->field_type('added_by','hidden',user_id());
			$crud->field_type('student_unique_code','hidden');
			$crud->field_type('registration_date','hidden',date('Y-m-d H:i:s'));
			$crud->field_type('created_at','hidden',date('Y-m-d H:i:s'));
			$crud->field_type('updated_at','hidden',date('Y-m-d H:i:s'));
			$crud->set_theme('bootstrap');
	    $output = $crud->render();
			$this->_example_output($output);

	} 

  function update_student_unique_code($post_array,$primary_key)
	{
		
		$data = array(
			"student_unique_code" => 'STU'.$primary_key,
			'fees_status' => 'UNPAID'
		);

		$this->db->update('students_registration', $data, array('id' => $primary_key));	 
			 
		return true;
	}

		public function courses()
	{ 

			$crud = new grocery_CRUD();
			$crud->set_theme('bootstrap');
			$crud->columns('course_name','course_fees','course_detail');
			$crud->set_table('courses');
			$crud->unset_texteditor('course_detail');
			$crud->where('added_by',user_id());
			$crud->field_type('added_by','hidden',user_id());
			$crud->field_type('created_at','hidden',date('Y-m-d H:i:s'));
			$crud->field_type('updated_at','hidden',date('Y-m-d H:i:s'));
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
