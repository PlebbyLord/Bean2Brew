<?php

// Verify.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo as RelationsBelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Verify extends Model
{
    protected $guarded = [];

    // Define the relationship with the User model
    public function user(): RelationsBelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Define the relationship with the VerificationImage model
    public function images(): HasMany
{
    return $this->hasMany(VerificationImage::class);
}

}
