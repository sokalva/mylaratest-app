<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'body', 'img', 'slug'];

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function state() {
        return $this->hasOne(State::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    public function scopeAllPaginate($query, $numbers) {
        return $query->with('tags', 'state')->orderBy('id')->paginate($numbers);
    }

    public function scopeFindBySlug($query, $slug) {
        return $query->with('comments', 'tags', 'state')->where('slug', $slug)->firstOrFail();
    }

    public function scopeFindByTag($query) {
        return $query->with('tags')->orderBy('created_at', 'desc')->paginate(10);
    }

}


