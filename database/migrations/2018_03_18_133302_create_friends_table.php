<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFriendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('friends', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');//jesli nazwiemy inaczenij niz user_id to wtedy musimy recznie laczyc relacje
            $table->integer('friend_id');
            $table->boolean('accepted')->default(0);
            $table->timestamps();
            $table->unique(['user_id', 'friend_id']); //to robi to ze para tych dwoch zmiennych musi byc unikalna
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('friends');
    }
}
