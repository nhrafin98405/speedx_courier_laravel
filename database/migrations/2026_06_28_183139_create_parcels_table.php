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
        Schema::create('parcels', function (Blueprint $table) {
            $table->id();

            // Tracking ID
            $table->string('tracking_id')->unique();

            // Sender Information
            $table->string('sender_name');
            $table->string('sender_phone');
            $table->string('sender_email')->nullable();
            $table->foreignId('sender_hub_id')->constrained('hubs')->cascadeOnUpdate();
            $table->text('sender_address');

            // Receiver Information
            $table->string('receiver_name');
            $table->string('receiver_phone');
            $table->string('receiver_email')->nullable();
            $table->foreignId('receiver_hub_id')->constrained('hubs')->cascadeOnUpdate();
            $table->text('receiver_address');

            // Delivery Information
            $table->date('pickup_date');
            $table->date('estimated_delivery')->nullable();
            $table->decimal('delivery_charge', 10, 2)->default(0);

            // Status
            $table->enum('status', [
                'pending',
                'picked_up',
                'in_transit',
                'delivered',
                'cancelled'
            ])->default('pending');

            // Admin/User who booked
            $table->foreignId('booked_by')->constrained('users')->cascadeOnUpdate();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parcels');
    }
};