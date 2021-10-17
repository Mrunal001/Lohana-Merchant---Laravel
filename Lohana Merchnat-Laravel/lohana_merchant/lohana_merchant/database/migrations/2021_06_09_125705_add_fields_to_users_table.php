<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
               $table->string('fullname')->nullable()->after('id');
               $table->date('birthdate')->nullable()->after('fullname');
               $table->string('mobileno')->nullable()->after('birthdate');
               $table->string('gender')->nullable()->after('mobileno');
               $table->string('country')->nullable()->after('email');
               $table->string('state')->nullable()->after('country');
               $table->string('city')->nullable()->after('state');
           
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('users', function (Blueprint $table) {
           $table->dropColumn('fullname');
           $table->dropColumn('birthdate');
           $table->dropColumn('mobileno');
           $table->dropColumn('gender');
           $table->dropColumn('country');
           $table->dropColumn('state');
           $table->dropColumn('city');
       });
    }
}
