<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutTab extends Model
{
    protected $fillable = [
        'about_section_id',
        'title',
        'content',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
