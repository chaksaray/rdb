<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'account_type_id',
        'gender_id',
        'report_user_type_id',
        'avatar',
        'bio',
        'is_recieve_new_letter',
        'is_social_notification',
        'is_recieve_email_from_followed_author',
        'is_metion_notification',
        'is_promotion',
    ];

    protected $searchableFields = ['*'];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_recieve_new_letter' => 'boolean',
        'is_social_notification' => 'boolean',
        'is_recieve_email_from_followed_author' => 'boolean',
        'is_metion_notification' => 'boolean',
        'is_promotion' => 'boolean',
    ];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function userSaveArticles()
    {
        return $this->hasMany(UserSaveArticle::class);
    }

    public function accountType()
    {
        return $this->belongsTo(AccountType::class);
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function reportUserType()
    {
        return $this->belongsTo(ReportUserType::class);
    }

    public function loginHistories()
    {
        return $this->hasMany(LoginHistory::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function shares()
    {
        return $this->hasMany(Share::class);
    }

    public function views()
    {
        return $this->hasMany(View::class);
    }

    public function saves()
    {
        return $this->hasMany(Save::class);
    }

    public function followTopics()
    {
        return $this->hasMany(FollowTopic::class);
    }

    public function followAuthors()
    {
        return $this->hasMany(FollowAuthor::class, 'author_id');
    }

    public function logoutHistories()
    {
        return $this->hasMany(LogoutHistory::class);
    }

    public function pageUsers()
    {
        return $this->hasMany(PageUser::class);
    }

    public function paymentMethods()
    {
        return $this->belongsToMany(PaymentMethod::class);
    }

    public function newsLetterTypes()
    {
        return $this->belongsToMany(NewsLetterType::class);
    }

    public function notificationTypes()
    {
        return $this->belongsToMany(NotificationType::class);
    }
}
