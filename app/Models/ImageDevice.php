<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageDevice extends Model
{
    use HasFactory;

    public function loraDevice()
    {
        return $this->belongsTo(LoraDevice::class, 'dev_eui', 'devEUI');
    }
}
