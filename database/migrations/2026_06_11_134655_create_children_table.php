<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('children', function (Blueprint $table) {
            $table->id('child_id');

            $table->string('lastname');
            $table->string('firstname');
            $table->string('middlename')->nullable();

            $table->enum('belongs_to_ip_group', [
                'yes',
                'no',
            ])->default('no');

            $table->enum('gender', [
                'Male',
                'Female',
            ]);

            $table->date('birthday');

            $table->unsignedBigInteger('municipality_id');
            $table->unsignedBigInteger('barangay_id');

            $table->unsignedInteger('purok');

            $table->timestamps();

            $table->foreign('municipality_id')
                ->references('municipality_id')
                ->on('municipalities')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreign('barangay_id')
                ->references('brgy_id')
                ->on('barangays')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('children');
    }
};