<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Part extends Model
{
    use HasFactory;
    protected $fillable = [
        'plan_id',
        'number',
        'description',
        'length',
        'type'
    ];

    public function plan(): BelongsTo
    {
        return $this->belongsTo(Plan::class);
    }
    public function codes(): BelongsToMany
    {
        return $this->belongsToMany(
            Code::class,
            'parts_codes',
            'part_id',
            'code_id'
        )->withPivot('quantity');
    }
}
