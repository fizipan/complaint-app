<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToComplaintTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('complaint', function (Blueprint $table) {
            $table->foreign('users_id', 'fk_complaint_to_users')
                    ->references('id')
                    ->on('users')
                    ->onUpdate('CASCADE')
                    ->onDelete('CASCADE');

            $table->foreign('province_id', 'fk_complaint_to_provinces')
                    ->references('id')
                    ->on('provinces')
                    ->onUpdate('CASCADE')
                    ->onDelete('RESTRICT');

            $table->foreign('regency_id', 'fk_complaint_to_regencies')
                    ->references('id')
                    ->on('regencies')
                    ->onUpdate('CASCADE')
                    ->onDelete('RESTRICT');
            
            $table->foreign('district_id', 'fk_complaint_to_districts')
                    ->references('id')
                    ->on('districts')
                    ->onUpdate('CASCADE')
                    ->onDelete('RESTRICT');
            
            $table->foreign('category_complaint_id', 'fk_complaint_to_category_complaint')
                    ->references('id')
                    ->on('category_complaint')
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
        Schema::table('complaint', function (Blueprint $table) {
            $table->dropForeign('fk_complaint_to_users');
            $table->dropForeign('fk_complaint_to_provinces');
            $table->dropForeign('fk_complaint_to_regencies');
            $table->dropForeign('fk_complaint_to_districts');
            $table->dropForeign('fk_complaint_to_category_complaint');
        });
    }
}
