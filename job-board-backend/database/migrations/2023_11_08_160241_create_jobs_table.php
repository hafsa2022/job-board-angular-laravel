<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
	        $table->id();
            $table->string("title");
            $table->string("description");
            $table->string("salary");
            $table->date("posted_date");
            $table->date("expiration_date")->nullable();
            $table->string("is_active");
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('location_id');
            $table->timestamps();
            $table->foreign("category_id")
            ->references('id')->on('categories')->onDelete('cascade');
            $table->foreign("company_id")
            ->references('id')->on('companies')->onDelete('cascade');
            $table->foreign("location_id")
            ->references('id')->on('locations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
};
