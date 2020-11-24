<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReportUserType extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['status_id', 'title', 'description'];

    protected $searchableFields = ['*'];

    protected $table = 'report_user_types';

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
