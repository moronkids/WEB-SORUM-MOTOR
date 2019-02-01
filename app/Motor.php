<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Motor extends Model
{
    protected $table = 'Motors';
    protected $primary_key = 'id';
    protected $fillable = [
      'nama_motor',
      'brand_motor',
      'tipe_motor'
    ];
}
