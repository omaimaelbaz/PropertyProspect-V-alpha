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
            $table->enum('status', ['sale', 'soldout', 'rent'])->default('rent');
            $table->decimal('price', 10, 2);
            $table->text('description')->nullable();
            $table->timestamp('listed_date')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id');
            $table->enum('postStatus', ['pending', 'active'])->default('pending');
            $table->boolean('is_investment_property')->default(false);


            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
