<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WeekCode extends Model
{
    use HasFactory;
    protected $fillable = [
        'day',
        'shift',
        'quantity',
        'week_plan_id',
        'code_id'
    ];

    public function code(): BelongsTo
    {
        return $this->belongsTo(Code::class);
    }
}
