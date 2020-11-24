<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Page extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'name',
        'description',
        'website',
        'profile',
        'cover',
        'user_name',
        'created_by',
        'category_id',
        'status_id',
        'custom_url',
        'phone',
        'email',
    ];

    protected $searchableFields = ['*'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function pageUsers()
    {
        return $this->hasMany(PageUser::class);
    }
}
