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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('street',255);
            $table->string('building',255);
            $table->string('floar',255);
            $table->string('flat',255);
            $table->string('notes',255)->nullable();
            $table->tinyInteger('status')->default(0)->comment('0=>not deliverd,1=>deliverd');
            $table->foreignId('user_id')->constrained()->restrictOnDelete()->restrictOnUpdate();
            $table->foreignId('region_id')->constrained()->restrictOnDelete()->restrictOnUpdate();
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
        Schema::dropIfExists('addresses');
    }
};
