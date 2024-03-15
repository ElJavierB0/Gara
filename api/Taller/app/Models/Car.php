<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Brand;

class Car extends Model
{
    use HasFactory;

    protected $fillable = ['name','status', 'img', 'brand_id'];

    public function brand(){
        return $this->belongsTo(Brand::class);
    }
}
