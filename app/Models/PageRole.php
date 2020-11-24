<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PageRole extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['title', 'description', 'status_id'];

    protected $searchableFields = ['*'];

    protected $table = 'page_roles';

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function pageUsers()
    {
        return $this->hasMany(PageUser::class);
    }
}
