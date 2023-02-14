<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecialProduct extends Model
{
    use HasFactory;
    protected $fillable=[
        'name','price','photo','categoryid','brandId','color','choices','quantity','size','description','discountoffer'
    ];
}
