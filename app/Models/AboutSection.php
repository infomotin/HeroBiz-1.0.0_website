<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutSection extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'image',
        'heading',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function tabs()
    {
        return $this->hasMany(AboutTab::class);
    }
}
