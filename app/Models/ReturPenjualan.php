<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturPenjualan extends Model
{
    use HasFactory;

    protected $fillable = ['penjualan_id', 'tanggal', 'total', 'keterangan'];

    protected function casts(): array
    {
        return ['tanggal' => 'date', 'total' => 'decimal:2'];
    }

    public function penjualan()
    {
        return $this->belongsTo(Penjualan::class);
    }
}
