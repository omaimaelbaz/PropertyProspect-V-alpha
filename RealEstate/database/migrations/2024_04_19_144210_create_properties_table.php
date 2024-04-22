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
            $table->string('country', 100)->default('Morocco');
            $table->unsignedSmallInteger('year_built')->nullable();
            $table->unsignedInteger('size_area')->nullable();
            $table->unsignedTinyInteger('num_bedrooms')->nullable();
            $table->unsignedTinyInteger('num_bathrooms')->nullable();
            $table->enum('status', ['sale', 'soldout', 'rent']);
            $table->decimal('price', 10, 2);
            $table->text('description')->nullable();
            $table->timestamp('listed_date')->nullable();
            $table->unsignedBigInteger('agent_id')->nullable();
            $table->unsignedBigInteger('listed_by'); // User ID of the person who listed
            $table->unsignedBigInteger('property_type_id');

            $table->timestamps();

            $table->foreign('agent_id')->references('id')->on('agents')->onDelete('set null');
            $table->foreign('listed_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('property_type_id')->references('id')->on('property_type')->onDelete('cascade');
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
