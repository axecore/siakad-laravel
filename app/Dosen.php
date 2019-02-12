<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dosen extends Model
{
    use SoftDeletes;

    protected $table = 'dosen';
    protected $primaryKey = 'nik_nip';
    protected $guarded = [];
    public $incrementing = false;
}
