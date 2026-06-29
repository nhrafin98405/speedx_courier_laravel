<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hubs', function (Blueprint $table) {

            $table->id();

            // Basic Information
            $table->string('name');
            $table->string('code')->unique();

            // Location
            $table->string('district');
            $table->string('area');
            $table->text('address');

            // Contact
            $table->string('phone', 20);
            $table->string('email')->nullable();

            // Status
            $table->enum('status', ['active', 'inactive'])
                ->default('active');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hubs');
    }
};
