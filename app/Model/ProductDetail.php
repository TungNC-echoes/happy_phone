<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends BaseModel
{
    protected $table = 'products_detail';

    protected $fillable = [
        'product_id',
        'screen_type',
        'screen_color',
        'resolution',
        'screen_size',
        'touch_technology',
        'touch',
        'screen_standard',
        'system_operating',
        'language',
        'front_camera',
        'behind_camera',
        'flash_light',
        'video',
        'video_call',
        'spu_speed',
        'chipset',
        'multiplier',
        'gpu',
        'contact',
        'memory_card',
        'nax_memory_card',
        'battery',
        'battery_type',
        'battery_removable',
        'max_time_call',
        'max_time',
        'max_time_media',
        'sim_type',
        '2g',
        '3g',
        '4g',
        'sim_slot',
        'wifi',
        'gps',
        'bluetooth',
        'gprs_edge',
        'jack',
        'nfc',
        'usb',
        'other_connect',
        'port_charge',
        'style',
        'size',
        'weight',
        'material',
        'play_movie',
        'play_music',
        'record',
        'limit_call',
        'fm_radio',
        'other_feature'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function product()
    {
        return $this->hasOne(Product::class);
    }
}
