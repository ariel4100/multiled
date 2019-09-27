<?php

use Illuminate\Database\Seeder;

class ContentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('contents')->delete();
        
        \DB::table('contents')->insert(array (
            0 => 
            array (
                'id' => 1,
                'section' => 'contacto',
                'text' => '{"phones":[{"type":"tel","numero":"4373-9500"},{"type":"wha","numero":"11-1234-5678"}],"emails":[{"email":"ventas@multiled.com.ar","notify_contact":1}],"address":[{"address":"Salta 285, Ciudad de Buenos Aires"}]}',
                'file' => '[]',
                'slider' => '[]',
                'order' => NULL,
                'created_at' => '2019-09-23 11:50:16',
                'updated_at' => '2019-09-24 14:28:06',
            ),
            1 => 
            array (
                'id' => 2,
                'section' => 'home',
                'text' => '{"es":{"name":"Espa\\u00f1ol","script":"Latn","native":"espa\\u00f1ol","regional":"es_ES","title":"L\\u00edderes en fabricaci\\u00f3n y comercializaci\\u00f3n de tecnolog\\u00eda LED","text":"<h2 style=\\"text-align: center;\\"><span style=\\"color: #173E8D;\\"><strong>Ofrecemos Soluciones Electr\\u00f3nicas de la m\\u00e1s alta<\\/strong><\\/span><\\/h2><h2 style=\\"text-align: center;\\"><span style=\\"color: #173E8D;\\"><strong> calidad, sumando valor al negocio de nuestros clientes<\\/strong><\\/span><\\/h2>","text_2":"<h3>Bienvenidos a <strong>Club Multiled<\\/strong>,<\\/h3><h3> \\ndonde tus compras son premios<\\/h3>","title_2":"Proyectos","banner":"uploads\\/images\\/ttTLzJRNQauUcHmrdNma2k9iCZAWAiBwDGS2mcEE.jpeg"}}',
                'file' => '[{"image":"uploads\\/images\\/p6Ham2r8VEUaAJMHgeOfGa7hpgAVsXciIaVPqnGl.jpeg","title":"Se\\u00f1alizaci\\u00f3n","keyword":"","description":""},{"image":"uploads\\/images\\/12RmnopgHlVXBsbtENK2R918xy5ztLrEM2reGPUK.jpeg","title":"Iluminaci\\u00f3n","keyword":"","description":""},{"image":"uploads\\/images\\/wLMlwzDOR4YDKspXdm1wU05NbYJaIzOcsBGDa4LB.jpeg","title":"Publicidad","keyword":"","description":""},{"image":"uploads\\/images\\/6VOUXIcKeVlbDAJZ6klmVyDI9k9njxBh8Idlc6Z0.jpeg","title":"Vial","keyword":"","description":""}]',
                'slider' => '[{"image":"uploads\\/gallery\\/fIhxhFjSnQE828waIQrSI3qYrAHqVsY97hVDBtMI.jpeg","title":"Iluminaci\\u00f3n LED\\nen v\\u00eda p\\u00fablica","text":"Desde hace m\\u00e1s de veinte a\\u00f1os\\nacompa\\u00f1ando a nuestros clientes"}]',
                'order' => NULL,
                'created_at' => '2019-09-23 12:11:59',
                'updated_at' => '2019-09-23 17:41:16',
            ),
            2 => 
            array (
                'id' => 3,
                'section' => 'empresa',
            'text' => '{"es":{"name":"Espa\\u00f1ol","script":"Latn","native":"espa\\u00f1ol","regional":"es_ES","title":"MULTILED LIDER EN TECNOLOG\\u00cdA LED","text":"<p style=\\"box-sizing: border-box; margin: 0px 0px 10px; font-family: Roboto, sans-serif; font-weight: 300; color: rgb(51, 51, 51); font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; text-align: justify;\\"><strong style=\\"box-sizing: border-box; font-weight: 700; margin-bottom: 0px;\\">Multiled S.A<\\/strong>., es una empresa que fue fundada en&nbsp; 1997 en la ciudad de Buenos Aires, Argentina, con el objetivo de comercializar&nbsp;pantallas, letreros , tanteadores, cambio de jugadores, se\\u00f1alizaci\\u00f3n electr\\u00f3nica, tableros industriales, carteles de seguridad vial, sem\\u00e1foros , productos de iluminaci\\u00f3n y todo tipo de productos&nbsp;con tecnolog\\u00eda LED eco-friendly,&nbsp;sin radiaci\\u00f3n ultravioleta e infrarroja.<\\/p><p style=\\"box-sizing: border-box; margin: 0px 0px 10px; font-family: Roboto, sans-serif; font-weight: 300; color: rgb(51, 51, 51); font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; text-align: justify;\\">Se trabaja bajo normas de calidad internacional y procedimientos estandarizados buscando la mejora continua.<\\/p><p style=\\"box-sizing: border-box; margin: 0px 0px 10px; font-family: Roboto, sans-serif; font-weight: 300; color: rgb(51, 51, 51); font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; text-align: justify;\\">Todas las l\\u00edneas que ofrecemos tienen productos de LED de calidad, con dise\\u00f1os innovadores y que no da\\u00f1an el medio ambiente ni perjudican la salud.<\\/p><p style=\\"box-sizing: border-box; margin: 0px 0px 10px; font-family: Roboto, sans-serif; font-weight: 300; color: rgb(51, 51, 51); font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; text-align: justify;\\">Comercializamos&nbsp;productos con sello de marca otorgado por&nbsp;<strong style=\\"box-sizing: border-box; font-weight: 700; margin-bottom: 0px;\\">TUV Reinland Argentina S.A<\\/strong>., que asegura que los productos se fabrican bajo un Sistema de Calidad Certificado.<\\/p><p style=\\"box-sizing: border-box; margin: 0px 0px 10px; font-family: Roboto, sans-serif; font-weight: 300; color: rgb(51, 51, 51); font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; text-align: justify;\\">Lanzamos&nbsp;<strong style=\\"box-sizing: border-box; font-weight: 700; margin-bottom: 0px;\\">Multiled Iluminaci\\u00f3n<\\/strong>, apuntando al comercio, industria, profesionales y consumidor final, como tambi\\u00e9n iluminaci\\u00f3n para entidades deportivas.<\\/p><p style=\\"box-sizing: border-box; margin: 0px 0px 10px; font-family: Roboto, sans-serif; font-weight: 300; color: rgb(51, 51, 51); font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; text-align: justify;\\"><strong style=\\"box-sizing: border-box; font-weight: 700; margin-bottom: 0px;\\">Multiled Publicidad<\\/strong>&nbsp;posee pantallas LED ubicadas en accesos a Capital Federal y en el interior del pa\\u00eds, en distintos estadios de f\\u00fatbol y en la Liga Nacional de B\\u00e1squet.<\\/p><p style=\\"box-sizing: border-box; margin: 0px 0px 10px; font-family: Roboto, sans-serif; font-weight: 300; color: rgb(51, 51, 51); font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; text-align: justify;\\">Buscamos generar una mejora continua en los procesos y productos, ofreciendo&nbsp;<strong style=\\"box-sizing: border-box; font-weight: 700; margin-bottom: 0px;\\">soluciones electr\\u00f3nicas de la m\\u00e1s alta calidad, sumando valor al negocio de nuestros clientes.<\\/strong>&nbsp;Somos l\\u00edderes en la fabricaci\\u00f3n de se\\u00f1alizaci\\u00f3n LED proveyendo a reconocidas instituciones nacionales y del exterior.<\\/p>","banner":"undefined"}}',
                'file' => '[{"image":"uploads\\/images\\/q4BTQ8mDgaCrwEoT5CVYyf51LQP4vQG8MGjl30Zh.jpeg","title":"","subtitle":"","text":"","keyword":"","description":"","featured":0}]',
                'slider' => '[{"image":"uploads\\/gallery\\/V3g3dozoQZQlGOJipn5Xujje4zBvLPP7CoduZHUX.jpeg","title":"Nosotros Somos\\nMultiled","text":""}]',
                'order' => NULL,
                'created_at' => '2019-09-23 17:51:08',
                'updated_at' => '2019-09-27 19:22:10',
            ),
            3 => 
            array (
                'id' => 4,
                'section' => 'logos',
                'text' => NULL,
                'file' => '[{"image":"uploads\\/images\\/AEEd70TEcoQbOcIc7ByNqXxFl6GLdIwD1KS32ztS.jpeg","title":"favicon","subtitle":"undefined","text":"undefined","keyword":"","description":"","featured":0},{"image":"uploads\\/images\\/1hu0qoCkcpQ8wFSmPoeolDZFzUyCbzQtcUwXHokg.png","title":"header","subtitle":"undefined","text":"undefined","keyword":"","description":"","featured":0},{"image":"uploads\\/images\\/0dDy7TlrCbwIpzZu1OxM1s46hCa3uYH3UYjGXQxj.jpeg","title":"footer","subtitle":"undefined","text":"undefined","keyword":"","description":"","featured":0}]',
                'slider' => '[]',
                'order' => NULL,
                'created_at' => '2019-09-23 18:00:31',
                'updated_at' => '2019-09-27 14:48:49',
            ),
            4 => 
            array (
                'id' => 5,
                'section' => 'metadatos',
                'text' => '{"es":{"name":"Espa\\u00f1ol","script":"Latn","native":"espa\\u00f1ol","regional":"es_ES"}}',
                'file' => '[{"image":"[object Object]","title":"INICIO","keyword":"MULTILED,LED,","description":"Descripcion breve"},{"image":"[object Object]","title":"NOSOTROS","keyword":"","description":""}]',
                'slider' => '[]',
                'order' => NULL,
                'created_at' => '2019-09-23 18:16:55',
                'updated_at' => '2019-09-24 11:31:36',
            ),
            5 => 
            array (
                'id' => 6,
                'section' => 'redes',
                'text' => '{"redes":[{"type":"fab fa-facebook-f","link":"https:\\/\\/www.facebook.com\\/multiled"},{"type":"fab fa-twitter","link":"https:\\/\\/twitter.com\\/Multiled_SA"},{"type":"fab fa-instagram","link":"https:\\/\\/www.instagram.com\\/multiled\\/"}]}',
                'file' => '[]',
                'slider' => '[]',
                'order' => NULL,
                'created_at' => '2019-09-23 19:45:04',
                'updated_at' => '2019-09-24 14:15:01',
            ),
            6 => 
            array (
                'id' => 7,
                'section' => 'productos',
                'text' => NULL,
                'file' => NULL,
                'slider' => NULL,
                'order' => NULL,
                'created_at' => '2019-09-24 11:36:52',
                'updated_at' => '2019-09-24 11:36:52',
            ),
            7 => 
            array (
                'id' => 8,
                'section' => 'categorias',
                'text' => NULL,
                'file' => NULL,
                'slider' => NULL,
                'order' => NULL,
                'created_at' => '2019-09-24 11:46:49',
                'updated_at' => '2019-09-24 11:46:49',
            ),
            8 => 
            array (
                'id' => 9,
                'section' => 'categorias_novedades',
                'text' => NULL,
                'file' => NULL,
                'slider' => NULL,
                'order' => NULL,
                'created_at' => '2019-09-24 13:01:00',
                'updated_at' => '2019-09-24 13:01:00',
            ),
            9 => 
            array (
                'id' => 10,
                'section' => 'novedades',
                'text' => NULL,
                'file' => NULL,
                'slider' => NULL,
                'order' => NULL,
                'created_at' => '2019-09-24 13:17:14',
                'updated_at' => '2019-09-24 13:17:14',
            ),
            10 => 
            array (
                'id' => 11,
                'section' => 'servicios',
                'text' => NULL,
                'file' => NULL,
                'slider' => NULL,
                'order' => NULL,
                'created_at' => '2019-09-24 15:29:16',
                'updated_at' => '2019-09-24 15:29:16',
            ),
            11 => 
            array (
                'id' => 12,
                'section' => 'proyectos',
                'text' => '{"es":{"name":"Espa\\u00f1ol","script":"Latn","native":"espa\\u00f1ol","regional":"es_ES"}}',
                'file' => '[{"image":"uploads\\/images\\/ne3ycHiHeD2TynYA1ZlH07f1G3PVmelA3jrQku7q.png","title":"","subtitle":"Iluminaci\\u00f3n Deportiva - Club Ferrocarril Oeste","text":"Instalaci\\u00f3n de reflectores LED 100W 10000lm en canchas de Handball y Basquet en el Club Ferrocarril Oeste","keyword":"","description":"","featured":1},{"image":"uploads\\/images\\/SWOnWh67C4mGLPy1r1BItZMohqhxNIgyhrncqixA.jpeg","title":"","subtitle":"Boca Juniors en la Feria del Libro","text":"","keyword":"","description":"","featured":1},{"image":"uploads\\/images\\/ia789ayBPD1RWc5UAaNjbqcZpKWPkG5aWcLujvt7.jpeg","title":"","subtitle":"Fundaci\\u00f3n Garrahan en la Feria del Libro","text":"Fundaci\\u00f3n Garrahan\\nen la Feria del Libro","keyword":"","description":"","featured":1},{"image":"uploads\\/images\\/L8Z0tSY0gCopwyfXtKQRz2ev88b66A0XUDeq3BAT.jpeg","title":"","subtitle":"San Lorenzo  Campe\\u00f3n de la LNB","text":"San Lorenzo \\nCampe\\u00f3n de la LNB","keyword":"","description":"","featured":1}]',
                'slider' => '[]',
                'order' => NULL,
                'created_at' => '2019-09-24 18:28:50',
                'updated_at' => '2019-09-27 15:01:12',
            ),
            12 => 
            array (
                'id' => 13,
                'section' => 'vial',
                'text' => NULL,
                'file' => NULL,
                'slider' => NULL,
                'order' => NULL,
                'created_at' => '2019-09-26 14:01:30',
                'updated_at' => '2019-09-26 14:01:30',
            ),
            13 => 
            array (
                'id' => 14,
                'section' => 'senalizacion',
                'text' => NULL,
                'file' => NULL,
                'slider' => NULL,
                'order' => NULL,
                'created_at' => '2019-09-26 17:21:27',
                'updated_at' => '2019-09-26 17:21:27',
            ),
            14 => 
            array (
                'id' => 15,
                'section' => 'terminos',
                'text' => '{"es":{"name":"Espa\\u00f1ol","script":"Latn","native":"espa\\u00f1ol","regional":"es_ES","title":"terminos y condiciones","text":"texto de terminos y condiciones","banner":"undefined"}}',
                'file' => '[]',
                'slider' => '[]',
                'order' => NULL,
                'created_at' => '2019-09-27 14:31:14',
                'updated_at' => '2019-09-27 19:25:50',
            ),
        ));
        
        
    }
}