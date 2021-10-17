<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    protected $table = 'advertisement';
    protected $fillable = ['advertise_id','user_id','business_name','address','person_name','business_card','city','state','country','mobileno','status'];

}
