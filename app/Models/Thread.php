<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Thread extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title'
    ];

    // the owner of the thread
    public function user() : BelongsTo
    {
        return $this->BelongsTo(User::class);
    }

    // the thread participants
    public function users() : BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
