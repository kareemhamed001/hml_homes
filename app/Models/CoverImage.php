<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoverImage extends Model
{
    use HasFactory;
    protected $guarded = [];

    function getImageAttribute(){
        return url($this->attributes['image']);
    }

}
