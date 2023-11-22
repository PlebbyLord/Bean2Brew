<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VerificationImage extends Model
{
    protected $fillable = ['verify_id', 'path'];

    public function verify()
    {
        return $this->belongsTo(Verify::class, 'verify_id')->withDefault();
    }
}

