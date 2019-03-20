<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends BaseModel
{
    //
    protected $fillable = ['service_name','service_description','service_image_url','price'];


}
