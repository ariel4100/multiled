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
                'text' => '{"es":{"name":"Espa\\u00f1ol","script":"Latn","native":"espa\\u00f1ol","regional":"es_ES","title":"PANEL LED","order":"aa"}}',
                'file' => '[{"image":"uploads\\/familia\\/OLP2gCsbPfO7GNGAKqke9z834PVOGapefvsZ53oh.jpeg","title":"null"}]',
                'order' => 'aa',
                'slug' => 'panel-led',
                'created_at' => '2019-09-24 12:25:07',
                'updated_at' => '2019-09-27 13:53:54',
            ),
            1 => 
            array (
                'id' => 2,
                'text' => '{"es":{"name":"Espa\\u00f1ol","script":"Latn","native":"espa\\u00f1ol","regional":"es_ES","title":"TIRAS LED","order":"bb"}}',
                'file' => NULL,
                'order' => 'bb',
                'slug' => 'tiras-led',
                'created_at' => '2019-09-24 12:25:33',
                'updated_at' => '2019-09-26 18:20:05',
            ),
            2 => 
            array (
                'id' => 3,
                'text' => '{"es":{"name":"Espa\\u00f1ol","script":"Latn","native":"espa\\u00f1ol","regional":"es_ES","title":"BIPIN LED","order":"cc"}}',
                'file' => NULL,
                'order' => 'cc',
                'slug' => 'bipin-led',
                'created_at' => '2019-09-24 12:26:04',
                'updated_at' => '2019-09-26 18:20:50',
            ),
            3 => 
            array (
                'id' => 4,
                'text' => '{"es":{"name":"Espa\\u00f1ol","script":"Latn","native":"espa\\u00f1ol","regional":"es_ES","title":"BA\\u00d1ADORES","order":"dd"}}',
                'file' => NULL,
                'order' => 'dd',
                'slug' => 'banadores',
                'created_at' => '2019-09-24 12:26:11',
                'updated_at' => '2019-09-26 18:21:03',
            ),
            4 => 
            array (
                'id' => 5,
                'text' => '{"es":{"name":"Espa\\u00f1ol","script":"Latn","native":"espa\\u00f1ol","regional":"es_ES","title":"CEILINGS LED","order":"EE"}}',
                'file' => NULL,
                'order' => 'EE',
                'slug' => 'ceilings-led',
                'created_at' => '2019-09-26 18:21:23',
                'updated_at' => '2019-09-26 18:21:23',
            ),
        ));
        
        
    }
}