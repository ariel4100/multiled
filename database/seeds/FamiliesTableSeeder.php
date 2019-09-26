<?php

use Illuminate\Database\Seeder;

class FamiliesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('families')->delete();
        
        \DB::table('families')->insert(array (
            0 => 
            array (
                'id' => 1,
                'text' => '{"es":{"name":"Espa\\u00f1ol","script":"Latn","native":"espa\\u00f1ol","regional":"es_ES","title":"SE\\u00d1ALIZACI\\u00d3N","order":"aa"}}',
                'file' => NULL,
                'order' => 'aa',
                'slug' => 'senalizacion',
                'created_at' => '2019-09-24 12:25:07',
                'updated_at' => '2019-09-24 12:25:07',
            ),
            1 => 
            array (
                'id' => 2,
                'text' => '{"es":{"name":"Espa\\u00f1ol","script":"Latn","native":"espa\\u00f1ol","regional":"es_ES","title":"ILUMINACI\\u00d3N","order":"bb"}}',
                'file' => NULL,
                'order' => 'bb',
                'slug' => 'iluminacion',
                'created_at' => '2019-09-24 12:25:33',
                'updated_at' => '2019-09-24 12:25:33',
            ),
            2 => 
            array (
                'id' => 3,
                'text' => '{"es":{"name":"Espa\\u00f1ol","script":"Latn","native":"espa\\u00f1ol","regional":"es_ES","title":"PUBLICIDAD","order":"cc"}}',
                'file' => NULL,
                'order' => 'cc',
                'slug' => 'publicidad',
                'created_at' => '2019-09-24 12:26:04',
                'updated_at' => '2019-09-24 12:26:04',
            ),
            3 => 
            array (
                'id' => 4,
                'text' => '{"es":{"name":"Espa\\u00f1ol","script":"Latn","native":"espa\\u00f1ol","regional":"es_ES","title":"VIAL","order":"dd"}}',
                'file' => NULL,
                'order' => 'dd',
                'slug' => 'vial',
                'created_at' => '2019-09-24 12:26:11',
                'updated_at' => '2019-09-24 12:26:11',
            ),
        ));
        
        
    }
}