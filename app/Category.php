<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = ['name_category', 'description_category', 'state_category'];
    protected $table = 'category';
}
