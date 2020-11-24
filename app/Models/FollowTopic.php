<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FollowTopic extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['user_id', 'toptic_id'];

    protected $searchableFields = ['*'];

    protected $table = 'follow_topics';

    public function save()
    {
        return $this->belongsTo(User::class);
    }

    public function toptic()
    {
        return $this->belongsTo(Toptic::class);
    }
}
