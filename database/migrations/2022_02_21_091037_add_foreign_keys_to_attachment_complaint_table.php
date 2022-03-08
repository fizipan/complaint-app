<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAttachmentComplaintTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('attachment_complaint', function (Blueprint $table) {
            $table->foreign('complaint_id', 'fk_attachment_complaint_to_complaint')
                    ->references('id')
                    ->on('complaint')
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
        Schema::table('attachment_complaint', function (Blueprint $table) {
            $table->dropForeign('fk_attachment_complaint_to_complaint');
        });
    }
}
