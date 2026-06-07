<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'nama', 'telepon', 'alamat',
        'jabatan', 'gaji', 'tanggal_masuk', 'is_active',
    ];

    protected function casts(): array
    {
        return [
            'gaji' => 'decimal:2',
            'tanggal_masuk' => 'date',
            'is_active' => 'boolean',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function absensis()
    {
        return $this->hasMany(Absensi::class);
    }
}
