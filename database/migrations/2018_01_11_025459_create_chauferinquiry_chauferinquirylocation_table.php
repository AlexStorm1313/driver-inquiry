<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChauferinquiryChauferinquirylocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chauferinquiry_chauferinquirylocation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('chauferinquiry_id');
            $table->integer('chauferinquirylocation_id');
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
        Schema::dropIfExists('chauferinquiry_chauferinquirylocation');
    }
}
