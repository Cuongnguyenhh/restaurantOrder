<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoresModel extends Model
{
    use HasFactory;
    protected $table ='stores';
    protected $fillable = [
        'name',
        'address',
        'phone',
        'phone',
        'open_time',
        'close_time',

    ];
   protected $primaryKey = 'id';

}
