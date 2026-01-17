<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class countrise extends Model
{

    protected $table="countrise";
    protected $fillable=['name','created_at','updated_at','active'];
}
