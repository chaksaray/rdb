<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Toptic extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'category_id',
        'title',
        'description',
        'status_id',
        'image',
        'icon',
    ];

    protected $searchableFields = ['*'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->hasMany(Tag::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function followTopics()
    {
        return $this->hasMany(FollowTopic::class);
    }
}
