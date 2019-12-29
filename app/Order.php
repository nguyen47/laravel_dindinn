<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['name', 'client_id', 'vendor_id'];

    public function client()
    {
        return $this->belongsTo('App\Client', 'client_id');
    }
}
