<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'user_id',
        'status_id',
        'category_id',
        'article_status_id',
        'report_article_type_id',
        'title',
        'body',
        'feature_image',
        'page_id',
        'tags',
        'read_time',
    ];

    protected $searchableFields = ['*'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function userSaveArticles()
    {
        return $this->hasMany(UserSaveArticle::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function articleStatus()
    {
        return $this->belongsTo(ArticleStatus::class);
    }

    public function reportArticleType()
    {
        return $this->belongsTo(ReportArticleType::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function shares()
    {
        return $this->hasMany(Share::class);
    }

    public function views()
    {
        return $this->hasMany(View::class);
    }

    public function saves()
    {
        return $this->hasMany(Save::class);
    }
}
