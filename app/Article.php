<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['name', 'body', 'published_at'];

    protected $dates = [
        'published_at'
    ];

    /*
    |------------------------------------------------------------------------------------
    | Relations
    |------------------------------------------------------------------------------------
    */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /*
    |------------------------------------------------------------------------------------
    | Scopes
    |------------------------------------------------------------------------------------
    */
    public function scopeRecherche($query)
    {
        $q = request('q');
        $query->where('name', 'like', "%$q%");
    }
    public function scopeLatestArticles($q, $limit = 10)
    {
        $q->orderBy('id', 'desc')->take($limit);
    }

    /*
    |------------------------------------------------------------------------------------
    | Attribute
    |------------------------------------------------------------------------------------
    */
    public function getNameFormatedAttribute()
    {
        return str_replace(request('q'), '<mark>' . request('q'). '</mark>', $this->name);
    }
    public function getPublicationSinceAttribute()
    {
        if ($this->published_at) {
            return $this->published_at->diffForHumans();
        }
    }
}
