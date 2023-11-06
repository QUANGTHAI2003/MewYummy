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
        return Product::with('categories', 'product_images')->get();
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
            $product->categories->name ?: '',
            $product->name,
            $product->slug,
            $product->regular_price,
            $product->sale_price == 0 ? 'Không có' : $product->sale_price,
            $product->stock_qty < 1 ? 'Hết hàng' : $product->stock_qty,
            $product->is_active ? 'Đang hoạt động' : 'Không hoạt động',
            $product->product_images->where('is_main', 1)->first()->image ?: '',
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
