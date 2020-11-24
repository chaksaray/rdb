<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ArticleStatus extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['status_id'];

    protected $searchableFields = ['*'];

    protected $table = 'article_statuses';

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
