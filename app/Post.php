<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    
    protected $fillable = [ 'user_id','caption','diary' ]; //for solve the development error . because we want send data with model so model must have parameters
    //or
    //protected $guarded =[];  
    
    
    
   public function User()
   {
       return $this->belongsTo(User::class);
   }
}
