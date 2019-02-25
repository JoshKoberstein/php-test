<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TransactorsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        \Schema::create('transactors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        \Schema::drop('transactors');
    }

}
