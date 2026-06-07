<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    protected $fillable = ['order_id', 'gross_amount', 'customer_name', 'customer_email', 'payment_status', 'snap_token'];
    use HasFactory;
}
