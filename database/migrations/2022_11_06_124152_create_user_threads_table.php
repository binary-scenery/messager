<?php

use App\Models\Thread;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up() : void
    {
        Schema::create('thread_user', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Thread::class);
            $table->timestamps();
        });
    }

    public function down() : void
    {
        Schema::dropIfExists('thread_user');
    }
};
