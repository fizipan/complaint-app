<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplaintTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaint', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->nullable()->index('fk_complaint_to_users');
            $table->foreignId('province_id')->nullable()->index('fk_complaint_to_provinces');
            $table->foreignId('regency_id')->nullable()->index('fk_complaint_to_regencies');
            $table->foreignId('district_id')->nullable()->index('fk_complaint_to_districts');
            $table->foreignId('category_complaint_id')->nullable()->index('fk_complaint_to_category_complaint');
            $table->string('title');
            $table->longText('content');
            $table->dateTime('incident_date');
            $table->enum('status', [1, 2, 3])->nullable()->default(1);
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
        Schema::dropIfExists('complaint');
    }
}
