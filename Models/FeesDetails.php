<?php
namespace Models;
use Illuminate\Database\Eloquent\Model;

class FeesDetails extends Model
{ 
    protected $table    = 'fees_details';
    protected $fillable    = [];

 	  function courseDetails(){
    	return $this->hasOne(Courses::class,'id','course_id');
    }

}	
