<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = ['image', 'name_product', 'description_product', 'FK_id_category', 'price', 'state_product'];
    protected $table = 'products';
}
