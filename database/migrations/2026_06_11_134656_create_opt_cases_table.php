<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('opt_cases', function (Blueprint $table) {
            $table->id('opt_id');

            $table->unsignedBigInteger('child_id');

            $table->decimal('height', 6, 2);
            $table->decimal('weight', 6, 2);

            $table->date('date_measured');

            $table->unsignedInteger('age_in_months');

            $table->enum('weight_for_age_status', [
                'Normal (N)',
                'Overweight (OW)',
                'Moderately Underweight (UW)',
                'Severely Underweight (SUW)',
            ]);

            $table->enum('height_for_age_status', [
                'Normal (N)',
                'Tall (T)',
                'Stunted (St)',
                'Severely Stunted (SSt)',
            ]);

            $table->enum('weight_for_ltht_status', [
                'Normal (N)',
                'Overweight (OW)',
                'Obese (Ob)',
                'Wasted (W)',
                'MW/MAM',
            ]);

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
        Schema::dropIfExists('opt_cases');
    }
};