<?php

namespace App\Models;

use App\Models\Thread;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'message_text',
        'thread_id',
        'user_id',
    ];

    public function thread() : BelongsTo
    {
        return $this->belongsTo(Thread::class);
    }
}
