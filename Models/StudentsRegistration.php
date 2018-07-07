<?php
namespace Models;
use Illuminate\Database\Eloquent\Model;

class StudentsRegistration extends Model
{ 
    protected $table    = 'students_registration';
    protected $fillable    = [];

    function feesDetails(){
    	return $this->hasMany(FeesDetails::class, 'students_registration_id', 'id');
    }

    // function studentCourses(){
    // 	return $this->hasMany(StudentsRegistrationCourses::class, 'students_registration_id', 'id');	
    // }
}	
