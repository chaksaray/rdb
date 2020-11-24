<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FollowAuthor extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['follower_id', 'author_id'];

    protected $searchableFields = ['*'];

    protected $table = 'follow_authors';

    public function user()
    {
        return $this->belongsTo(User::class, 'follower_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
