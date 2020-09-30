<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;
    protected $table = 'task';
    protected $fillable = [
        'name', 'description','status', 'id_user','id_category'
    ];
    public $timestamps=false;
    protected $primaryKey='id';
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id_user');
    }
     public function category()
    {
        return $this->belongsTo('App\Models\Category', 'id_category');
    }
}
