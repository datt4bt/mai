<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SlideImage extends Model
{
    protected $table = 'slide_image';
    protected $fillable = [
        'name',
    ];
    public $timestamps=false;
    protected $primaryKey='id';

}
