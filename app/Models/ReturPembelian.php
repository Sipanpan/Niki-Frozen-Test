<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturPembelian extends Model
{
    use HasFactory;

    protected $fillable = ['pembelian_id', 'tanggal', 'total', 'keterangan'];

    protected function casts(): array
    {
        return ['tanggal' => 'date', 'total' => 'decimal:2'];
    }

    public function pembelian()
    {
        return $this->belongsTo(Pembelian::class);
    }
}
