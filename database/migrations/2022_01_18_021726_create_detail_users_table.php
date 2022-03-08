<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->nullable()->index('fk_detail_users_to_users');
            $table->string('number_id')->nullable();
            $table->string('photo')->nullable();
            $table->dateTime('date_of_birth')->nullable();
            $table->enum('gender', [1, 2])->nullable();
            $table->string('mobile_phone')->nullable();
            $table->longText('address')->nullable();
            $table->longText('information')->nullable();
            $table->integer('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_users');
    }
}
