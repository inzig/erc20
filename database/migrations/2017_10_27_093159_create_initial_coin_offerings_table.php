<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInitialCoinOfferingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('initial_coin_offerings', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id');
            $table->string('slug', 5);
            $table->string('type', 20);
            $table->string('title')->nullable();
            $table->text('address');
            $table->string('hard_cap')->nullable();
            $table->string('earnings')->nullable();
            $table->string('usd')->nullable();
            $table->string('minimum')->nullable();
            $table->boolean('active')->default(1);

            $table->timestamp('pre_sale_at')->nullable();
            $table->timestamp('pre_sale_end_at')->nullable();
            $table->timestamp('pre_ico_at')->nullable();
            $table->timestamp('pre_ico_end_at')->nullable();
            $table->timestamp('main_ico_at')->nullable();
            $table->timestamp('ico_expire_at')->nullable();

            $table->timestamp('updated_once')->nullable();

            $table->text('address_errors')->nullable();

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
        Schema::dropIfExists('initial_coin_offerings');
    }
}
