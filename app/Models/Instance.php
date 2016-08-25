<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Instance extends Model{

    use SoftDeletes;

    protected $table = 'instance_type';

    protected $fillable = [
        'sku','product_family','current_generation','enhanced_networking_supported','license_model','network_performance', 'pre_installed_sw',
        'servicecode','tenancy','usagetype','vcpu','dedicated_ebs_throughput',
        'instance_family','instance_type','location','location_type','memory','operating_system','operation','physical_processor',
        'processor_architecture','storage','clock_speed',
    ];


}