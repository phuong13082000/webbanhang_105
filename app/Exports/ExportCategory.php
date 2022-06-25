<?php

namespace App\Exports;

use App\Models\CategoryProduct;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportCategory implements FromCollection
{
    public function collection()
    {
        return CategoryProduct::all();
    }
}
