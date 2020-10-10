<?php

namespace App\Exports;

use App\Product;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProductsExport implements FromCollection
{
    // public function headings(): array
    // {
    //     return [
    //         'mpn',
    //         'brand_id',
    //         'product_tags',
    //     ];
    // }


    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Product::all();
    }
}
