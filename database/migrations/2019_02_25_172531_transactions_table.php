<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TransactionsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        \Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('transactor_id')->unsigned()->nullable();
            $table->decimal('amount', 12, 2);
            $table->dateTime('transacted_at');
            $table->foreign('transactor_id')->references('id')->on('transactors')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        \Schema::drop('transactions');
    }

}
