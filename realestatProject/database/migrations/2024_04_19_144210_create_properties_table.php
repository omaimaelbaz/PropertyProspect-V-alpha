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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('city');
            $table->string('country')->default('morocoo');
            $table->string('postal_code');
            $table->enum('property_type');
            $table->integer('size_area')->nullable();
            $table->integer('num_bedrooms')->nullable();
            $table->integer('num_bathrooms')->nullable();
            $table->enum('status', ['sale', 'soldout', 'rente'])->default('rent');
            $table->decimal('price')->nullable();
            $table->text('description')->nullable();
            $table->timestamp('listed_date')->nullable();
            $table->unsignedBigInteger('agent_id')->nullable();
            $table->unsignedBigInteger('listed_by'); // User ID of the person who listed the property
            $table->timestamps();

            $table->foreign('agent_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('listed_by')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
