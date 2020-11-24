<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Status extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'description'];

    protected $searchableFields = ['*'];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function backUsers()
    {
        return $this->hasMany(BackUser::class);
    }

    public function backUserRoles()
    {
        return $this->hasMany(BackUserRole::class);
    }

    public function articleStatuses()
    {
        return $this->hasMany(ArticleStatus::class);
    }

    public function reportArticleTypes()
    {
        return $this->hasMany(ReportArticleType::class);
    }

    public function reportUserTypes()
    {
        return $this->hasMany(ReportUserType::class);
    }

    public function toptics()
    {
        return $this->hasMany(Toptic::class);
    }

    public function accountTypes()
    {
        return $this->hasMany(AccountType::class);
    }

    public function pages()
    {
        return $this->hasMany(Page::class);
    }

    public function pageRoles()
    {
        return $this->hasMany(PageRole::class);
    }

    public function notificationTypes()
    {
        return $this->hasMany(NotificationType::class);
    }

    public function paymentMethods()
    {
        return $this->hasMany(PaymentMethod::class);
    }

    public function genders()
    {
        return $this->hasMany(Gender::class);
    }

    public function freqAskQuestions()
    {
        return $this->hasMany(FreqAskQuestion::class);
    }
}
