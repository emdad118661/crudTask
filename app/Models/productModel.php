<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productModel extends Model
{
    use HasFactory;

    protected $table = 'product_info';
    protected $primaryKey = 'product_id';
    public $timestamps = false;
}
