<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
