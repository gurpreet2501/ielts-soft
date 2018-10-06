<?php
namespace Models;
use Illuminate\Database\Eloquent\Model;

class StudentsAttendence extends Model
{ 
    protected $table    = 'students_attendence';
    protected $fillable    = ['course_id','student_id','card_id','attendence_time','machine_id','added_by'];

}	
