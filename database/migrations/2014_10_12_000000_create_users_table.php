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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('phone_number')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('grade')->nullable();
            $table->integer('parent_id')->nullable();
            $table->text('image')->nullable();
            $table->enum('user_type',['parent','student','teacher'])->default(null);
            $table->rememberToken();
            $table->timestamps();
        });



        // new User
        $user = new \App\User();
        $user->name = 'Super Admin';
        $user->email = 'teacher@admin.com';
        $user->user_type = 'teacher';
        $user->password = \Illuminate\Support\Facades\Hash::make('secret');
        $user->save();

        $user = new \App\User();
        $user->name = 'User';
        $user->email = 'student@user.com';
        $user->user_type = 'student';
        $user->password = \Illuminate\Support\Facades\Hash::make('secret');
        $user->save();
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
