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
        Schema::create('maintenances', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Vehicle::class)
                ->references('id')
                ->on('vehicles')
                ->cascadeOnDelete();
            $table->date('date');
            $table->integer('status')->default(0);
            $table->text('description')->nullable();
            $table->float('coust')->default(0.0);
            $table->foreignIdFor(\App\Models\User::class,)->references('id')->on('users')->cascadeOnDelete();
            $table->string('odometer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('maintenances', function (Blueprint $table){
            $table->dropForeignIdFor(\App\Models\Vehicle::class);
        });
        Schema::dropIfExists('maintenances');
    }
};
