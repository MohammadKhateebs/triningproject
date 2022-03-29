<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVolunteersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('volunteers', function (Blueprint $table) {
            $table->String('firstName');
            $table->String('secondName');
            $table->String('thirdName');
            $table->String('lastName');
            $table->String('gender');
            $table->integer('identification')->unique();
            $table->integer('phone');
            $table->String('address');
            $table->String('university');
            $table->integer('universityId');
            $table->String('specialization');
            $table->string('academicYear');
            $table->string('active')->default('inactive');
            $table->boolean('confirmed')->nullable();
            $table->string('studyLevel')->nullable();
            $table->integer('permissionEvaluation')->default(0);
            $table->integer('transportation')->nullable();
            $table->integer('archives')->default(0);
            $table->primary(['identification','archives']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('volunteers');
    }
}
