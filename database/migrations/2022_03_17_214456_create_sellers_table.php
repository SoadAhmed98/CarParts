<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellers', function (Blueprint $table) {
            $table->id();
            $table->string('name',32);
            $table->string('email',32)->unique();
            $table->string('phone',11)->unique();
            $table->string('password');
            $table->string('national_id',14)->unique();
            $table->enum('gender',['f','m']);
            $table->tinyInteger('status')->default(1)->comment('0=>blocked , 1=>active');
            $table->string('social_links')->nullable();
            $table->timestamp('email_verified_at')->nullable();
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
        Schema::dropIfExists('sellers');
    }
};
