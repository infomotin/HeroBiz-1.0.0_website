<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceDetail extends Model
{
    protected $fillable = [
        'service_id',
        'image',
        'title',
        'description',
        'icon',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
