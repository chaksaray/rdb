<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BackUserRole extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['status_id'];

    protected $searchableFields = ['*'];

    protected $table = 'back_user_roles';

    public function backUsers()
    {
        return $this->hasMany(BackUser::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
