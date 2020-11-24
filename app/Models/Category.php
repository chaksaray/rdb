<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'status_id',
        'title',
        'description',
        'image',
        'icon',
    ];

    protected $searchableFields = ['*'];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function toptics()
    {
        return $this->hasMany(Toptic::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function pages()
    {
        return $this->hasMany(Page::class);
    }
}
