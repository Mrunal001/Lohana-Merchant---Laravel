<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegisteredBusiness extends Model
{
    protected $table = 'registered_business';
    protected $fillable = ['business_id','user_id','business_card','business_title','contact_person','address','city','state','country','business_category','business_type','mode_of_payment','year_of_establishment','specialist_in','about_business','website','email','mobileno','status'];

    public function setCategoryAttribute($value)
    {
        $this->attributes['mode_of_payment'] = json_encode($value);
    }

    public function getCategoryAttribute($value)
    {
        return $this->attributes['mode_of_payment'] = json_decode($value);
    }
}

