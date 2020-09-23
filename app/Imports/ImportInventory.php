<?php

namespace App\Imports;

use App\ProductReceive;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ImportInventory implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $key => $row) {
            if ($key > 0) {
                $productReceive                     = new ProductReceive();
                $productReceive->receive_date       = $row[0];
                $productReceive->vendor_id          = $row[1];
                $productReceive->tracking_number	= $row[2];
                $productReceive->sku                = $row[3];
                $productReceive->product_name       = $row[4];
                $productReceive->quantity           = $row[5];
                $productReceive->cost               = $row[6];
                $productReceive->save();
            }
        }
    }
}
