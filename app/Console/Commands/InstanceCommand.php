<?php
/**
 * Created by PhpStorm.
 * User: xiangyuwang
 * Date: 8/10/16
 * Time: 3:12 PM
 */

namespace  App\Console\Commands;


use App\Models\Instance;
use Illuminate\Console\Command;

class  InstanceCommand extends Command{


    /**
     * @var string
     */
    protected $signature = 'instance:update';
    /**
     * @var string
     */
    protected $description = 'Update all aws instance type';
    /**
     * @return int
     */
    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
    {

        $string = file_get_contents(storage_path().'/index.json');

        $json = \GuzzleHttp\json_decode($string);
        foreach($json->products as $item)
        {
            $attributes = [
                'sku'=> $item->sku,
                'product_family'=> property_exists($item,'productFamily') ? $item->productFamily : '',
                'instance_type'=> property_exists($item->attributes,'instanceType') ? $item->attributes->instanceType : '',
                'current_generation'=> property_exists($item->attributes,'currentGeneration') ? $item->attributes->currentGeneration : '',
                'enhanced_networking_supported'=> property_exists($item->attributes,'enhancedNetworkingSupported') ? $item->attributes->enhancedNetworkingSupported : '',
                'network_performance'=> property_exists($item->attributes,'networkPerformance') ? $item->attributes->networkPerformance : '',
                'dedicated_ebs_throughput'=> property_exists($item->attributes,'dedicatedEbsThroughput') ? $item->attributes->dedicatedEbsThroughput : '',
                'pre_installed_sw'=> property_exists($item->attributes,'preInstalledSw') ? $item->attributes->preInstalledSw : '',
                'license_model'=> property_exists($item->attributes,'licenseModel') ? $item->attributes->licenseModel : '',
                'servicecode'=> property_exists($item->attributes,'servicecode') ? $item->attributes->servicecode : '',
                'tenancy'=> property_exists($item->attributes,'tenancy') ? $item->attributes->tenancy : '',
                'usagetype'=> property_exists($item->attributes,'usagetype') ? $item->attributes->usagetype : '',
                'instance_family'=> property_exists($item->attributes,'instanceFamily') ? $item->attributes->instanceFamily : '',
                'location'=> property_exists($item->attributes,'location') ? $item->attributes->location : '',
                'location_type'=> property_exists($item->attributes,'locationType') ? $item->attributes->locationType : '',
                'operating_system'=> property_exists($item->attributes,'operatingSystem') ? $item->attributes->operatingSystem : '',
                'operation'=> property_exists($item->attributes,'operation') ? $item->attributes->operation : '',
                'physical_processor'=> property_exists($item->attributes,'physicalProcessor') ? $item->attributes->physicalProcessor : '',
                'processor_architecture'=> property_exists($item->attributes,'processorArchitecture') ? $item->attributes->processorArchitecture : '',
                'processor_features'=> property_exists($item->attributes,'processorFeatures') ? $item->attributes->processorFeatures : '',
                'storage'=> property_exists($item->attributes,'storage') ? $item->attributes->storage : '',
                'clock_speed'=> property_exists($item->attributes,'clockSpeed') ? $item->attributes->clockSpeed : '',
                'vcpu'=> property_exists($item->attributes,'vcpu') ? $item->attributes->vcpu : '',
            ];
            Instance::create($attributes);
        }

    }

}