<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FreqAskQuestion extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['question', 'answer', 'status_id'];

    protected $searchableFields = ['*'];

    protected $table = 'freq_ask_questions';

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
