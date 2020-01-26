<?php

namespace Modules\Projects\Entities;

use Illuminate\Database\Eloquent\Model;

use Modules\Blog\Entities\BlogPost;

class Project extends Model
{
    protected $fillable = [];

    public function blogPost()
    {
        return $this->belongsTo(BlogPost::class);
    }
}
