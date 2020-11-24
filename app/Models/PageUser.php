<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PageUser extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['user_id', 'page_id', 'page_role_id'];

    protected $searchableFields = ['*'];

    protected $table = 'page_users';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    public function pageRole()
    {
        return $this->belongsTo(PageRole::class);
    }
}
