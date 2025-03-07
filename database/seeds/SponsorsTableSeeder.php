<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;

class SponsorsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sponsors')->delete();
        
        \DB::table('sponsors')->insert(array (
            0 => 
            array (
                'active' => 1,
                'heading' => 'Unify SoftTech',
                'image' => '20210507113650_SponsorIcon.png',
                'sponsor_id' => 1,
                'title' => 'Leuke APP',
                'url' => 'https://www.unifysofttech.com',
            ),
        ));
        
        
    }
}