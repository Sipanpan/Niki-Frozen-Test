<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $fillable = [
        'karyawan_id', 'tanggal', 'jam_masuk', 'jam_keluar',
        'status', 'shift', 'keterangan',
    ];

    protected function casts(): array
    {
        return [
            'tanggal' => 'date',
        ];
    }

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
}
