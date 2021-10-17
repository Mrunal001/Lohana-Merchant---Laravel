<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegisteredBusinessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registered_business', function (Blueprint $table) {
            $table->increments('business_id');
            $table->integer('user_id')->nullable();
            $table->string('business_card')->nullable();
            $table->string('business_title')->nullable();
            $table->string('contact_person')->nullable();
            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('business_category')->nullable();
            $table->string('business_type')->nullable();
            $table->string('mode_of_payment')->nullable();
            $table->string('year_of_establishment')->nullable();
            $table->string('specialist_in')->nullable();
            $table->text('about_business')->nullable();
            $table->string('website')->nullable();
            $table->string('email')->nullable();
            $table->string('mobileno')->nullable();
            $table->tinyInteger('status')->default('0');
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
        Schema::dropIfExists('registered_business');
    }
}
