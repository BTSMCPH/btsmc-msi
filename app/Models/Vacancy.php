<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vacancy extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'vacancy_banner_image',
        'vacancy_banner_title',
        'vacancy_banner_subtitle'
    ];

    protected $casts = [
        'deleted_at' => 'datetime',
    ];

    public function jobs(): HasMany
    {
        return $this->hasMany(Job::class);
    }
}
