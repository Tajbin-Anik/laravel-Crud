<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $gueded = ['id'];

    public function post(){
        return $this->hasMany(Blog::class);
    }

}
