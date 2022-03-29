<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->String('firstName');
            $table->String('secondName');
            $table->String('thirdName');
            $table->String('lastName');
            $table->String('gender');
            $table->date('birthday');
            $table->integer('branch_id');
            $table->integer('identification');
            $table->integer('phone');
            $table->String('address');
            $table->String('active')->default('inactive');
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
        Schema::dropIfExists('students');
    }
}
