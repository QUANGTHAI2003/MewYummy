<?php

namespace App\Exports;

use App\Models\Product;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class ProductsExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithStyles, WithColumnFormatting
{
    public function collection()
    {
        return Product::all();
    }

    public function headings(): array
    {
        return [
            'Id',
            'Tên danh mục',
            'Tên sản phẩm',
            'Slug',
            'Giá gốc',
            'Giá khuyến mãi',
            'Số lượng',
            'Trạng thái',
            'Ảnh sản phẩm',
            'Mô tả',
            'Ngày tạo',
            'Ngày cập nhật',
        ];
    }

    public function map($product): array
    {
        return [
            $product->id,
            $product->category->name,
            $product->name,
            $product->slug,
            $product->regular_price,
            $product->sale_price,
            $product->stock_quantity,
            $product->is_active,
            $product->thumbnail,
            $product->description,
            Date::dateTimeToExcel($product->created_at),
            Date::dateTimeToExcel($product->updated_at),
        ];
    }

    public function styles(Worksheet $sheet): array
    {
        return [
            1 => [
                'font' => [
                    'bold' => true,
                ],
            ],
        ];
    }

    public function columnFormats(): array
    {
        return [
            'E' => '#.##0 ₫',
            'F' => '#.##0 ₫',
            'H' => '0',
            'K' => 'dd/mm/yyyy hh:mm:ss AM/PM',
            'L' => 'dd/mm/yyyy hh:mm:ss AM/PM',
        ];
    }
}
