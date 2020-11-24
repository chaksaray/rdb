<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BackUser extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['back_user_role_id', 'status_id'];

    protected $searchableFields = ['*'];

    protected $table = 'back_users';

    public function backUserRole()
    {
        return $this->belongsTo(BackUserRole::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
