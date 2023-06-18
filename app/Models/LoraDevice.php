<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoraDevice extends Model
{
    protected $table = 'appdevices';
    
    public function images()
    {
        return $this->hasMany(DeviceImage::class);
    }
}
