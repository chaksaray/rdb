<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Search extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['keyword', 'is_found', 'user_id'];

    protected $searchableFields = ['*'];

    protected $casts = [
        'is_found' => 'boolean',
    ];
}
