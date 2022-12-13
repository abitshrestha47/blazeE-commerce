<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable=[
        'name','price','photo','categoryid','brand','color','choices','quantity','size',
    ];
    public function category(){
        return $this->belongsTo(Category::class,'categoryid');
    }
}
