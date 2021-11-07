<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\Image;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content'];

    // public function comments()
    // {
    //     return $this->hasMany(Comment::class);
    // }

    // Relation one to one

    public function image()
    {
        return $this->hasOne(Image::class);
    }

    // Relation has one trough (post -> image -> artist)

    public function imageArtist()
    {
        return $this->hasOneThrough(Artist::class, Image::class);
    }

    // Many to Many

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    // One to many polymorphic (les commentaires peuvent etre d'un post ou d'une vidéo)

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    // Has one of Many

    // public function latestComment()
    // {
    //     return $this->hasOne(Comment::class)->latestOfMany();
    // }

    // public function oldestComment()
    // {
    //     return $this->hasOne(Comment::class)->oldestOfMany();
    // }
}
