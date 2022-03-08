<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplaintResponseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaint_response', function (Blueprint $table) {
            $table->id();
            $table->foreignId('complaint_id')->nullable()->index('fk_complaint_response_to_complaint');
            $table->foreignId('users_id')->nullable()->index('fk_complaint_response_to_users');
            $table->longText('response');
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
        Schema::dropIfExists('complaint_response');
    }
}
