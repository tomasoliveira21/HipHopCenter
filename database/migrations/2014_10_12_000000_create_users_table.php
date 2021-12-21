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
            $table->id()->bigIncrements();
            $table->string('name')->unique();
            $table->string('firstName')->nullable();
            $table->string('lastName')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('type')->default(0); //normalUser=0   premiumUser=1   adminUser=2
            $table->string('password');
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
