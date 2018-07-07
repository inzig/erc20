<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('all_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->morphs('icoable');
            $table->text('from');
            $table->string('to');
            $table->string('hash');
            $table->string('amount');
            $table->string('currency', 10);
            $table->text('input_data');
            $table->boolean('completed')->default(0);
            $table->boolean('processed')->default(0);
            $table->timestamp('updated_when')->nullable();
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
        Schema::dropIfExists('all_transactions');
    }
}
