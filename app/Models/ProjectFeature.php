<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectFeature extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function project(){
        return $this->belongsTo(Project::class);
    }

    function getImageAttribute(){
        if (empty($this->attributes['image'])) {
            return null;
        }
        return url($this->attributes['image']);
    }
}
