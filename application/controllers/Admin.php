<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');




use App\Libs\RestPaginator;

use Illuminate\Pagination\Paginator;



class Admin extends CI_Controller {



	public function __construct(){
		parent::__construct();
    $this->load->library('grocery_CRUD');
    if(user_role() != 'ADMIN')
    	redirect('auth/logout');
	}



 	public function index($lang=false){
 	
    redirect('dashboard/index');

  }



}



