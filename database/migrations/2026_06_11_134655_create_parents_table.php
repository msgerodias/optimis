<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('parents', function (Blueprint $table) {
            $table->id('parent_id');

            $table->string('lastname');
            $table->string('firstname');
            $table->string('middlename')->nullable();

            $table->string('contact_no')->nullable();
            $table->string('email_address')->unique();

            $table->string('authorized_guardian')->nullable();

            $table->unsignedBigInteger('child_id');

            $table->timestamps();

            $table->foreign('child_id')
                ->references('child_id')
                ->on('children')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('parents');
    }
};