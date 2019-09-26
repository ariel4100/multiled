<?php

use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('news')->delete();
        
        \DB::table('news')->insert(array (
            0 => 
            array (
                'id' => 1,
            'text' => '{"es":{"name":"Espa\\u00f1ol","script":"Latn","native":"espa\\u00f1ol","regional":"es_ES","category_id":3,"title":"SAN LORENZO CAMPE\\u00d3N DE LA LNB 2016-17","order":"aa","text":"<span style=\\"color: rgb(51, 51, 51); font-family: Roboto, sans-serif; font-size: 15px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 300; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\\">Durante el transcurso del partido los espectadores y jugadores pudieron observar: puntos, faltas y tiempos muertos con el tanteador deportivo Publisport y en las pantallas perimetrales LED se transmitieron publicidades de los sponsors.<\\/span><br>"}}',
                'file' => '[{"image":"uploads\\/novedades\\/2lP4cU061qzuW5Z2jS8Uh2wImtrLYXZ3e276Ko0c.jpeg","title":"null"}]',
                'order' => 'aa',
                'slug' => 'san-lorenzo-campeon-de-la-lnb-2016-17',
                'category_id' => 3,
                'created_at' => '2019-09-24 13:22:29',
                'updated_at' => '2019-09-26 12:38:52',
            ),
        ));
        
        
    }
}