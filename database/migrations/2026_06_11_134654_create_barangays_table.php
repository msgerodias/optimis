<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('barangays', function (Blueprint $table) {
            $table->id('brgy_id');

            $table->string('brgy_name');

            $table->unsignedBigInteger('brgy_municipality');

            $table->unsignedInteger('brgy_purok_count')->default(1);

            $table->timestamps();

            $table->foreign('brgy_municipality')
                ->references('municipality_id')
                ->on('municipalities')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('barangays');
    }
};