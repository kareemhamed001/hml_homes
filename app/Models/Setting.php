<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $guarded = [];

    function getWebsiteLogoAttribute(){
        if (empty($this->attributes['website_logo'])) return null;
        return url($this->attributes['website_logo']);
    }
    function getWebsiteLogoDarkAttribute(){
        if (empty($this->attributes['website_logo_dark'])) return null;
        return url($this->attributes['website_logo_dark']);
    }
}
