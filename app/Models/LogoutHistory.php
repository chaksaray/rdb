<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LogoutHistory extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['user_id'];

    protected $searchableFields = ['*'];

    protected $table = 'logout_histories';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
