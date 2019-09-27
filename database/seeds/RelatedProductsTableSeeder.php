<?php

use Illuminate\Database\Seeder;

class RelatedProductsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('related_products')->delete();
        
        \DB::table('related_products')->insert(array (
            0 => 
            array (
                'id' => 1,
                'related_id' => 1,
                'product_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'related_id' => 2,
                'product_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'related_id' => 4,
                'product_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}