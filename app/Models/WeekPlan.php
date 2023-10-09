<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WeekPlan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id'
    ];

    public function codes(): HasMany
    {
        return $this->hasMany(WeekCode::class);
    }
}
