<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TrendingPost extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['article_id'];

    protected $searchableFields = ['*'];

    protected $table = 'trending_posts';
}
