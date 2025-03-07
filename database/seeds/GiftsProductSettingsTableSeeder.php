<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;

class GiftsProductSettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::table('gifts_product_settings')->delete();
        
        \DB::table('gifts_product_settings')->insert(array (
            0 => 
            array (
                'purchase_product_name' => 'Coins',
                'purchase_product_image' => '',
                'redeem_product_name' => 'Diamond',
                'redeem_product_image' => ''
            )
        ));
        
        
    }
}