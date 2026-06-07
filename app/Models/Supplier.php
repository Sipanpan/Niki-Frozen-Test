<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'perusahaan', 'telepon', 'alamat', 'email'];

    public function pembelians()
    {
        return $this->hasMany(Pembelian::class);
    }

    public function hutangs()
    {
        return $this->hasManyThrough(Hutang::class, Pembelian::class);
    }
}
