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
        Schema::create('software_request', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Username');
            $table->string('Software_Name');
            $table->string('Software_Version');
            $table->string('Software_Link');
            $table->string('cost');
            $table->decimal('Software_Cost', 8, 2)->default('0');
            $table->string('Department_Paying');
            $table->string('Module_Code');
            $table->mediumText('DS_Notes')->nullable();
            $table->mediumText('Software_Reason');
            $table->string('Request_Stage')->default('Submitted');
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
        //
    }
};
