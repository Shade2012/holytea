<?php

namespace App\Models\API;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $incrementing = false; // Tidak menggunakan auto-incrementing untuk UUID
    protected $keyType = 'string'; // Tipe data kunci adalah string

    protected $fillable = [
        'id', 'product_code', 'product_name', 'product_price'
    ];

    protected $hidden = [
        'deleted_at'
    ];

    protected static function boot()
    {
        parent::boot();

        // Menggunakan UUID secara otomatis saat menciptakan model baru
        static::creating(function ($model) {
            $model->id = Str::uuid();
        });
    }

}
