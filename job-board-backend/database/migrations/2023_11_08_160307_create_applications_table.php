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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->date('application_date');
            $table->unsignedBigInteger('job_id');
            $table->unsignedBigInteger('user_id');
            // $table->string('stauts');
            $table->timestamps();
            $table->foreign('job_id')
            ->references('id')->on('jobs')->onDelete('cascade');
            $table->foreign('user_id')
            ->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applicatios');
    }
};
