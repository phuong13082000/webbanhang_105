<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ExportProduct implements ToModel
{
    public function model(array $row)
    {
        return Product::all();

    }
}
