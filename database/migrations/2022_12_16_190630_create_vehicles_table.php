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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\User::class)->references('id')->on('users')->cascadeOnDelete();
            $table->string('plate');
            $table->string('brand');
            $table->string('model');
            $table->string('year');
            $table->date('last_maintenance')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vehicles',function (Blueprint $table){
            $table->dropForeignIdFor(\App\Models\User::class);
        });
        Schema::dropIfExists('vehicles');
    }
};
