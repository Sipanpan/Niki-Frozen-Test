<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Piutang extends Model
{
    use HasFactory;

    protected $fillable = ['penjualan_id', 'jumlah', 'sisa', 'jatuh_tempo', 'status'];

    protected function casts(): array
    {
        return [
            'jumlah' => 'decimal:2',
            'sisa' => 'decimal:2',
            'jatuh_tempo' => 'date',
        ];
    }

    public function penjualan()
    {
        return $this->belongsTo(Penjualan::class);
    }
}
