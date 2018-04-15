<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class Jobdetail extends Model implements Authenticatable
{
    use AuthenticableTrait;
    protected $primaryKey = 'job_id';
    protected $fillable = ['job_role','job_description','qualification','key_skills','experience','interview_dates','company_name','company_profile','address','email_address','contact_number','cat_id','location'];
    //
}
