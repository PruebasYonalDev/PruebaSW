<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estimate extends Model
{
    //
    protected $fillable = ['FK_id_user', 'FK_id_product', 'state_estimate'];
    protected $table = 'estimate';
}
