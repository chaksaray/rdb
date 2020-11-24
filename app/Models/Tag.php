<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['toptic_id', 'title', 'description'];

    protected $searchableFields = ['*'];

    public function toptic()
    {
        return $this->belongsTo(Toptic::class);
    }
}
