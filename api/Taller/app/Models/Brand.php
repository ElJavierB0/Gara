<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'logo', 'category_id'];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
