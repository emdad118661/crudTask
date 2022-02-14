<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_info extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'order_id';
    protected $table = 'customer_orders'; 
}
