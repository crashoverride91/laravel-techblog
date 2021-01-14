<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');                            //User Name
            $table->string('email')->unique();                  //User email
            $table->timestamp('email_verified_at')->nullable(); //Verifica User Email
            $table->string('password');                         //User Password
            $table->string('image')->nullable();                //User Image Profile
            $table->text('description')->nullable();            //User Description Profile
            $table->string('slug')->nullable();                                            
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
