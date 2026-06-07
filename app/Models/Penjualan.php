<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_nota', 'pelanggan_id', 'user_id', 'tanggal', 'total',
        'diskon', 'bayar', 'kembalian', 'metode_bayar', 'status',
        'midtrans_order_id', 'midtrans_transaction_status', 'keterangan',
    ];

    protected function casts(): array
    {
        return [
            'tanggal' => 'date',
            'total' => 'decimal:2',
            'diskon' => 'decimal:2',
            'bayar' => 'decimal:2',
            'kembalian' => 'decimal:2',
        ];
    }

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function details()
    {
        return $this->hasMany(DetailPenjualan::class);
    }

    public function piutang()
    {
        return $this->hasOne(Piutang::class);
    }

    public function returPenjualans()
    {
        return $this->hasMany(ReturPenjualan::class);
    }

    public static function generateNoNota(): string
    {
        $today = now()->format('Ymd');
        $last = static::where('no_nota', 'like', "INV-{$today}-%")->latest('id')->first();
        $sequence = $last ? ((int) substr($last->no_nota, -4)) + 1 : 1;
        return "INV-{$today}-" . str_pad($sequence, 4, '0', STR_PAD_LEFT);
    }
}
