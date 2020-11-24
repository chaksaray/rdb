<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserSaveArticle extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['user_id', 'article_id'];

    protected $searchableFields = ['*'];

    protected $table = 'user_save_articles';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
