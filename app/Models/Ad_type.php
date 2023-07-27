<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad_type extends Model
{
    use HasFactory;

    protected $table = 'ad_types';

    protected $fillable = ['name'];

    public $timestamps = false;
}
