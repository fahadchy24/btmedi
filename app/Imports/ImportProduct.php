<?php

namespace App\Imports;

use App\Product;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ImportProduct implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $key => $row) {
            if ($key > 0) {
                $product                    = new Product();
                $product->product_name      = $row[0];
                $product->short_description = $row[1];
                $product->full_description  = $row[2];
                $product->unit_per_cost     = $row[3];
                $product->cost              = $row[4];
                $product->regular_price     = $row[5];
                $product->sku               = $row[6];
                $product->stock_quantity    = $row[7];
                $product->backorders        = $row[8];
                $product->main_image        = $row[9];
                $product->status            = $row[10];
                $product->brand_id          = $row[11];
                $product->save();
            }
        }
    }
}
