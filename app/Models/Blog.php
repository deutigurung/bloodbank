<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blogs';

    protected $fillable =  [
        'name',
        'description',
        'image',
        'blog_category_id',
    ];

    public function blogCategory(){
        return $this->belongsTo(BlogCategory::class,'blog_category_id');
    }
}
