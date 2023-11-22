<?php

// Verify.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Verify extends Model
{
    protected $guarded = [];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define the relationship with the VerificationImage model
    public function images()
{
    return $this->hasMany(VerificationImage::class);
}

}
