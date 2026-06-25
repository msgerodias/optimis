<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bhws', function (Blueprint $table) {
            $table->id('bhw_id');

            $table->string('lastname');
            $table->string('firstname');
            $table->string('middlename')->nullable();

            $table->string('contact_no')->nullable();
            $table->string('email_address')->unique();

            $table->text('address')->nullable();

            $table->enum('gender', [
                'Male',
                'Female',
            ]);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bhws');
    }
};