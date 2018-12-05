<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id');

            $table->string('screen_type')->nullable();
            $table->string('screen_color')->nullable();
            $table->string('resolution')->nullable();
            $table->string('screen_size')->nullable();
            $table->string('touch_technology')->nullable();
            $table->string('touch')->nullable();
            $table->string('screen_standard')->nullable();

            $table->string('system_operating')->nullable();
            $table->string('language')->nullable();

            $table->string('front_camera')->nullable();
            $table->string('behind_camera')->nullable();
            $table->string('flash_light')->nullable();
            $table->string('video')->nullable();
            $table->string('video_call')->nullable();

            $table->string('cpu_speed')->nullable();
            $table->string('chipset')->nullable();
            $table->string('multiplier')->nullable();
            $table->string('gpu')->nullable();

            $table->string('contact')->nullable();
            $table->string('memory_card')->nullable();
            $table->string('max_memory_card')->nullable();

            $table->integer('battery')->nullable();
            $table->string('battery_type')->nullable();
            $table->string('battery_removable')->nullable();
            $table->string('max_time_call')->nullable();
            $table->string('max_time')->nullable();
            $table->string('max_time_media')->nullable();

            $table->string('sim_type')->nullable();
            $table->string('2g')->nullable();
            $table->string('3g')->nullable();
            $table->string('4g')->nullable();
            $table->string('sim_slot')->nullable();
            $table->string('wifi')->nullable();
            $table->string('gps')->nullable();
            $table->string('bluetooth')->nullable();
            $table->string('gprs_edge')->nullable();
            $table->string('jack')->nullable();
            $table->string('nfc')->nullable();
            $table->string('usb')->nullable();
            $table->string('other_connect')->nullable();
            $table->string('port_charger')->nullable();

            $table->string('style')->nullable();
            $table->string('size')->nullable();
            $table->string('weight')->nullable();
            $table->string('material')->nullable();

            $table->string('play_movie')->nullable();
            $table->string('play_music')->nullable();
            $table->string('record')->nullable();
            $table->string('limit_call')->nullable();
            $table->string('fm_radio')->nullable();
            $table->string('other_feature')->nullable();
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
        Schema::dropIfExists('products_detail');
    }
}
