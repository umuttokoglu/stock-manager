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
        Schema::table('orders', function (Blueprint $table) {
            $table->smallInteger('status')
                ->default(0)
                ->after('motor_brand')
                ->comment('0 -> Onay Bekliyor, 1 -> Hazırlanıyor, 2 -> Hazırlandı, 3 ->Kargoya Verildi, 4 -> İptal Edildi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
};
