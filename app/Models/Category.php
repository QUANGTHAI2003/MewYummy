<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{

    use HasFactory;

    protected $table = "categories";

    protected $fillable = [
        'id',
        'name',
        'slug',
        'is_active',
        'created_at',
        'updated_at'
    ];

    public function getAllCategory()
    {
        $data = DB::table($this->table)
            ->orderBy('id', "DESC")
            ->paginate(8);

        return $data;
    }

    public function getOneCategory($id)
    {
        $data = DB::table($this->table)
            ->where('id', $id)
            ->first();

        return $data;
    }

    public function addProduct($data)
    {
        $data = [
            'name' => $data['name'],
            'slug' => $data['slug'],
            'is_active' => $data['is_active']
        ];

        DB::table($this->table)->insert($data);

        return TRUE;
    }

    public function updateProduct($data, $id)
    {
        $data = [
            'name' => $data['name'],
            'slug' => $data['slug'],
            'is_active' => $data['is_active']
        ];

        DB::table($this->table)->where('id', $id)->update($data);

        return TRUE;
    }

    public function deleteProduct($id)
    {
        DB::table($this->table)->where('id', $id)->delete();

        return TRUE;
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

}
