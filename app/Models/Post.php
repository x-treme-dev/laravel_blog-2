<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
        'category_id',
        'user_id',
        'physical_properties',  
        'price',                
        'delivery_conditions',   
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
