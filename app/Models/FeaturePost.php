<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FeaturePost extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['artilce_id'];

    protected $searchableFields = ['*'];

    protected $table = 'feature_posts';
}
