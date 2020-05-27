<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_log', function (Blueprint $table) {
            $table->id('job_logID');
            $table->string('comment');
            $table->timestamps();
            $table->foreignId('jobID')->constrained();
            // $table->foreignId('technicianID')->constrained();
            $table->foreignId('id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_log');
    }
}
