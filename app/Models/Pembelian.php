<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_id', 'no_faktur', 'tanggal', 'total',
        'status_bayar', 'keterangan',
    ];

    protected function casts(): array
    {
        return [
            'tanggal' => 'date',
            'total' => 'decimal:2',
        ];
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function details()
    {
        return $this->hasMany(DetailPembelian::class);
    }

    public function hutang()
    {
        return $this->hasOne(Hutang::class);
    }

    public function returPembelians()
    {
        return $this->hasMany(ReturPembelian::class);
    }
}
