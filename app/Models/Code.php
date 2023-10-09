<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Code extends Model
{
    use HasFactory;
    protected $fillable = ['code'];

    public function parts(): BelongsToMany
    {
        return $this->belongsToMany(
            Part::class,
            'parts_codes',
            'code_id',
            'part_id'
        )->withPivot('quantity');
    }
}
