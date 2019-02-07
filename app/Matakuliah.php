<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Matakuliah extends Model
{
    use SoftDeletes;
    protected $table = 'matakuliah';
    protected $primaryKey = 'kode_mk';
    public $incrementing = false;
    protected $guarded = [];
}
