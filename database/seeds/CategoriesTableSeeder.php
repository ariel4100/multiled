<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'text' => '{"es":{"name":"Espa\\u00f1ol","script":"Latn","native":"espa\\u00f1ol","regional":"es_ES","title":"Actualidad","order":"aa"}}',
                'order' => 'aa',
                'slug' => 'actualidad',
                'created_at' => '2019-09-24 13:16:40',
                'updated_at' => '2019-09-24 13:16:40',
            ),
            1 => 
            array (
                'id' => 2,
                'text' => '{"es":{"name":"Espa\\u00f1ol","script":"Latn","native":"espa\\u00f1ol","regional":"es_ES","title":"Productos","order":"bb"}}',
                'order' => 'bb',
                'slug' => 'productos',
                'created_at' => '2019-09-24 13:17:01',
                'updated_at' => '2019-09-24 13:17:01',
            ),
            2 => 
            array (
                'id' => 3,
                'text' => '{"es":{"name":"Espa\\u00f1ol","script":"Latn","native":"espa\\u00f1ol","regional":"es_ES","title":"Eventos","order":"cc"}}',
                'order' => 'cc',
                'slug' => 'eventos',
                'created_at' => '2019-09-24 13:17:10',
                'updated_at' => '2019-09-24 13:17:10',
            ),
        ));
        
        
    }
}