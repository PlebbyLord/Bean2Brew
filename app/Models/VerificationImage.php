<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\BelongsToRelationship;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VerificationImage extends Model
{
    protected $fillable = ['verify_id', 'path'];

    public function verify(): BelongsTo
    {
        return $this->belongsTo(Verify::class, 'verify_id')->withDefault();
    }
}

