<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OnfocusSection extends Model
{
    protected $fillable = [
        'heading',
        'description',
        'checklist_items',
        'video_url',
        'btn_text',
        'btn_link',
        'is_active',
    ];

    protected $casts = [
        'checklist_items' => 'array',
        'is_active' => 'boolean',
    ];
}
