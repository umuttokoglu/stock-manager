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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->uuid('code')->nullable(false);
            $table->string('name')->nullable(false);
            $table->string('image')->nullable(false);
            $table->integer('amount')->default(0)->nullable(false);
            $table->double('height')->nullable(false);
            $table->double('width')->nullable(false);
            $table->string('color')->nullable(false);
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
        Schema::dropIfExists('products');
    }
};
