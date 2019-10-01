<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelajar extends Model
{
    protected $table = 'pelajar';
    protected $fillable = ['namaDepan','namaBelakang', 'jantina','alamat'];
}
