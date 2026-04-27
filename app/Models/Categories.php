<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categories extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'slug',
        'description',
        'is_active',
    ];

    public function news()
    {
        return $this->hasMany(News::class);
    }  
    
}
