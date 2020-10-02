<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageProduct extends Model
{
    protected $table = 'image_product';
    protected $fillable = [
        'product_id','name',
    ];
    public $timestamps=false;
    protected $primaryKey='id';
    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }
}
