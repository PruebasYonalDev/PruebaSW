<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = ['FK_id_user', 'commet', 'total', 'state_order'];
    protected $table = 'orders';
}
