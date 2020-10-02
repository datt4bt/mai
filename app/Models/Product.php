<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $fillable = [
        'name', 'picture','summary', 'description'
    ];
    public $timestamps=false;
    protected $primaryKey='id';
    public function image_product()
    {
        return $this->hasMany('App\Models\ImageProduct');
    }

}
