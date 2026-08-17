<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $fillable = [
        'title',
        'icon',
        'color',
        'description',
        'content',
        'checklist_items',
        'image',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'checklist_items' => 'array',
        'is_active' => 'boolean',
    ];
}
