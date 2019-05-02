<?php

namespace App\Model;

use App\User;
use App\Model\Reply;
use App\Model\Category;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['title', 'slug', 'body', 'user_id', 'category_id'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function getPathAttribute()
    {
        return "question/$this->slug";
    }
}
