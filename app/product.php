<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table='table_product';
    protected $attributes = [
       'name_en' => '',
    ];
}
