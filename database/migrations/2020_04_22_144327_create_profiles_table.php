<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->text('description');
            $table->text('education')->default('High School');
            $table->text('experience')->nullable();
            $table->string('address');
            $table->string('phone_number');
            $table->string('github_profile_link')->nullable();
            $table->string('linkedin_profile_link')->nullable();
            $table->string('instagram_profile_link')->nullable();
            $table->text('skills')->nullable();
            $table->timestamps();

            $table->foreign('id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
