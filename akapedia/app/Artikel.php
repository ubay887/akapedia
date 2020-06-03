<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Artikel extends Model
{
    use Sluggable;

    protected $table = 'artikel';
    protected $fillable = ['user_id', 'tittle', 'content', 'slug', 'thumbnail'];
    protected $date = ['created_at'];


    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'tittle'
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

        return asset('artikel/'. $this->thumbnail);
    }


}
