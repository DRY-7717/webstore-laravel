<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactiondetail extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['product','transaction'];

    public function product()
    {
        return $this->hasOne(Product::class,'id','product_id');
    }
    public function transaction()
    {
        return $this->hasOne(Transaction::class,'id','transaction_id');
    }
}
