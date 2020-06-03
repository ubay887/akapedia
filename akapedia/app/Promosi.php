<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Promosi extends Model
{
    protected $table = "promosi";
    protected $fillable = ['user_id', 'title', 'content', 'slug', 'thumbnail'];
    protected $date = ['created_at'];

    use Sluggable;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getAvatar()
    {
        if (!$this->thumbnail) {
            return asset('no-thumbnail.jpg');
        }

        return asset('promosi/'. $this->thumbnail);
    }
}
