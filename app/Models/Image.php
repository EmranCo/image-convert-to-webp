<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['filename'];

    public function getThumAttribute()
    {
        return route('images.download',$this->filename);
    }

    public function getUrlAttribute()
    {
        return route('images.download',$this->filename);
    }

    public function getThumbUrlAttribute()
    {
        return route('images.download',$this->filename);
    }
}
