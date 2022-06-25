<?php

namespace App\Imports;

use App\Models\CategoryProduct;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportCategory implements ToModel
{
    public function model(array $row)
    {
        return new CategoryProduct([
            'meta_keywords' => $row[0],
            'category_name' => $row[1],
            'slug_category_product' => $row[2],
            'category_desc' => $row[3],
            'category_status' => $row[4],
        ]);
    }
}
