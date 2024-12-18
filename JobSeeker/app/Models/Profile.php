<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
    protected $guarded = ['id'];

    public function jobpost(): BelongsTo
    {
        return $this->belongsTo(Jobpost::class);
    }
}
