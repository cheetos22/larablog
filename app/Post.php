<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'content', 'date', 'type','image', 'published', 'premium',
    ];

    protected $dates = ['date'];

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
    public function setDateAttribute($value)
    {
        $this->attributes['date'] = is_null($value) ? now() : $value;
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getExcerptAttribute()
    {
        return Str::limit(strip_tags($this->content), 350);
    }

    public function getPhotoAttribute()
    {
        return Str::startsWith($this->image,'http') ? $this->image : Storage::url($this->image);
    }

    public function scopePublished($query)
    {
        $user = auth()->user();

        if ($user && $user->can('manage-posts')) {
            return $query;
        }

        if (!$user) {
            return $query->where('premium', '<>', '1');
        }

        return $query->where('published', 1);

    }
}
