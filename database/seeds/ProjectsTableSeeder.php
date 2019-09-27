<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('projects')->delete();
        
        \DB::table('projects')->insert(array (
            0 => 
            array (
                'id' => 1,
                'text' => '{"es":{"name":"Espa\\u00f1ol","script":"Latn","native":"espa\\u00f1ol","regional":"es_ES","title":"Iluminaci\\u00f3n Deportiva - Club Ferrocarril Oeste","order":"aa","text":"Instalaci\\u00f3n de reflectores LED 100W 10000lm en canchas de Handball y Basquet en el Club Ferrocarril Oeste ","featured":true}}',
                'file' => '[{"image":"uploads\\/novedades\\/Jvv6DKA0m9P5cM98IubxMnME4VKHYelt1dgiQvrS.jpeg","title":"null"}]',
                'order' => 'aa',
                'slug' => 'iluminacion-deportiva-club-ferrocarril-oeste',
                'created_at' => '2019-09-27 17:02:55',
                'updated_at' => '2019-09-27 18:02:10',
            ),
            1 => 
            array (
                'id' => 2,
                'text' => '{"es":{"name":"Espa\\u00f1ol","script":"Latn","native":"espa\\u00f1ol","regional":"es_ES","title":"Boca Juniors en la Feria del Libro","order":"bb","text":"Boca Juniors\\nen la Feria del Libro","featured":true}}',
                'file' => '[{"image":"uploads\\/proyectos\\/ZdnsXqvRVtsqvB73XIRtoc5KekmzjrbFoUByrYXa.jpeg","title":"null"}]',
                'order' => 'bb',
                'slug' => 'boca-juniors-en-la-feria-del-libro',
                'created_at' => '2019-09-27 17:11:58',
                'updated_at' => '2019-09-27 18:02:24',
            ),
            2 => 
            array (
                'id' => 3,
                'text' => '{"es":{"name":"Espa\\u00f1ol","script":"Latn","native":"espa\\u00f1ol","regional":"es_ES","title":"Fundaci\\u00f3n Garrahan en la Feria del Libro","order":"cc","text":"Fundaci\\u00f3n Garrahan\\nen la Feria del Libro","featured":true}}',
                'file' => '[{"image":"uploads\\/proyectos\\/o22Urut9y0sOeauqFBnJmXkHodavzB8NYd0njw9m.jpeg","title":"null"}]',
                'order' => 'cc',
                'slug' => 'fundacion-garrahan-en-la-feria-del-libro',
                'created_at' => '2019-09-27 17:12:22',
                'updated_at' => '2019-09-27 18:11:03',
            ),
            3 => 
            array (
                'id' => 4,
                'text' => '{"es":{"name":"Espa\\u00f1ol","script":"Latn","native":"espa\\u00f1ol","regional":"es_ES","title":"San Lorenzo  Campe\\u00f3n de la LNB","order":"dd","featured":true}}',
                'file' => '[{"image":"uploads\\/proyectos\\/PouI5wSjIsP7c3E0Yyae97gMOMI6FDaQCqvv54Zn.jpeg","title":"null"}]',
                'order' => 'dd',
                'slug' => 'san-lorenzo-campeon-de-la-lnb',
                'created_at' => '2019-09-27 17:12:40',
                'updated_at' => '2019-09-27 18:10:59',
            ),
        ));
        
        
    }
}