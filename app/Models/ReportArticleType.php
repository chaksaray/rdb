<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReportArticleType extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['status_id', 'title', 'description'];

    protected $searchableFields = ['*'];

    protected $table = 'report_article_types';

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
