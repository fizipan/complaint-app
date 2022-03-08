<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToComplaintResponseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('complaint_response', function (Blueprint $table) {
            $table->foreign('complaint_id', 'fk_complaint_response_to_complaint')
                    ->references('id')
                    ->on('complaint')
                    ->onUpdate('CASCADE')
                    ->onDelete('CASCADE');

            $table->foreign('users_id', 'fk_complaint_response_to_users')
                    ->references('id')
                    ->on('users')
                    ->onUpdate('CASCADE')
                    ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('complaint_response', function (Blueprint $table) {
            $table->dropForeign('fk_complaint_response_to_complaint');
            $table->dropForeign('fk_complaint_response_to_users');
        });
    }
}
