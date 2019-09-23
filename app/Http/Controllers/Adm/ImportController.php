<?php

namespace App\Http\Controllers\adm;

use App\Brand;
use App\Client;
use App\Family;
use App\Price;
use App\PriceList;
use App\Product;
use App\Seller;
use App\Subfamily;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx as ReaderXlsx;

class ImportController extends Controller
{
    public function index(Request $request)
    {
//        dd('d');
        set_time_limit(0);
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('subfamilies')->truncate();
        DB::table('products')->truncate();
        DB::table('price_lists')->truncate();
        DB::table('sellers')->truncate();
        DB::table('clients')->truncate();

        if ($request->hasFile('file'))
        {
            $file = $request->file('file')->storeAs('excel', Str::random(4).'-'.$request->file('file')->getClientOriginalName());
            $file = storage_path('app/'.$file);
            $reader = new ReaderXlsx();
            $spreadsheet = $reader->load($file);
            $sheet = $spreadsheet->getAllSheets();
//            dd($sheet);
//            $rows = $sheet->toArray();
//            dd($sheet);
            foreach ($sheet as $k => $worksheets)
            {
                //sheet subfamilias
                if ($k == 0)
                {
//                    dd($worksheets);
                    $rows = $worksheets->toArray();
                    foreach ($rows as $f => $row)
                    {
                        if ($f == 0)continue;
//                        dd($row);
                        $subfamilias = Subfamily::firstOrCreate([
                            'text' => ['es' => ['title' => $row[1],'order' => $row[2] ]],
                            'order' => $row[2],
                            'family_id' => 5,
                            'slug' => Str::slug($row[1]),
                        ]);
                    }
                }
                //sheet marcas
                if ($k == 1)
                {
                    $rows = $worksheets->toArray();
                    foreach ($rows as $m => $row)
                    {
//                        dd($row);
//                        if ($m == 0)continue;
////                        dd($row);
//                        $marca = Brand::firstOrCreate([
//                            'text' => ['es' => ['title' => $row[1],'order' => $row[2] ]],
//                            'slug' => Str::slug($row[1]),
//                        ]);
                    }
                }
                //sheet articulos
                if ($k == 2)
                {
//                    dd($worksheets);
                    $rows = $worksheets->toArray();
                    foreach ($rows as $p => $row)
                    {
//                        dd($row);
                        if ($p == 0)continue;
//                        dd($row);
                        $productos = Product::firstOrCreate([
                            'code' => $row[0],
                            'subfamily_id' => $row[1],
                            'text' => ['es' => ['title' => $row[2],'text' => $row[4],'featured' => $row[18],'order' => $row[25],'keyword' => $row[19] ]],
                            'order' => $row[25],
                            'slug' => Str::slug($row[2]),
                        ]);
                    }
                }
                //sheet vendedores
                if ($k == 3)
                {
//                    dd($worksheets);
                    $rows = $worksheets->toArray();
                    foreach ($rows as $v => $row)
                    {
//                        dd($row);
                        if ($v == 0)continue;
                        $vendedor = Seller::firstOrCreate([
                            'id' => $row[0],
                            'name' => $row[1],
                            'username' => $row[1],
//                            'email' => $row[1],
                        ]);
                    }
                }
                //sheet precio de lista
                if ($k == 4)
                {
//                    dd($worksheets);
                    $rows = $worksheets->toArray();
                    foreach ($rows as $pl => $row)
                    {
//                        dd($row);
                        //cabecera
//                        if ($pl == 0)
//                        {
//                            dd($rows[0][1]);
//                            foreach ($row as $valor => $r)
//                            {
//                            var_dump($r);
                                Price::firstOrCreate([
                                    'code' => $row[0],
                                    'l1' => $row[1],
                                    'l2' => $row[2],
                                    'l3' => $row[3],
                                    'l4' => $row[4],
                                    'l5' => $row[5],
                                    'l6' => $row[6],
                                    'l7' => $row[7],
                                    'l8' => $row[8],
                                    'l9' => $row[9],
//                                    'l10' => $row[1],
                                    'iva' => $row[10],
                                ]);
//                            }
//                        }

                    }
//                    exit('aca');
                }
                //sheet clientes
                if ($k == 5)
                {
//                    dd($worksheets);
                    $rows = $worksheets->toArray();
                    foreach ($rows as $v => $row)
                    {
//                        dd($row);
                        if ($v == 0)continue;
                        $cliente = Client::firstOrCreate([
                            'id' => $row[0],
                            'name' => $row[1],
//                            'username' => $row[1],
                            'seller_id' => $row[1],
                            'price_list' => strtolower($row[4]),
//                            'discount_id' => $row[1],
//                            'bonus_id' => $row[1],
//                            'email' => $row[1],
                        ]);
                    }
                }

            }

            return back()->with('status', "Carga finalizada");
        }
    }
}
