<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
			$table->unsignedBigInteger('patients_id');
			$table->foreign('patients_id')->references('id')->on('patients')->cascadeOnDelete();
			$table->unsignedBigInteger('doctors_id');
			$table->foreign('doctors_id')->references('id')->on('doctors')->cascadeOnDelete();
			$table->date('apdate');
			$table->enum('status',['Fixed', 'Completed', 'Cancelled'])->default('Fixed');
			$table->enum('created_by',['Admin', 'Patients'])->default('Patients');
            $table->timestamps();
			$table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
