<?php

use App\Models\User;
use App\Models\Thread;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up() : void
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Thread::class);
            $table->text('message_text');
            $table->timestamps();
        });
    }

    public function down() : void
    {
        Schema::dropIfExists('messages');
    }
};
