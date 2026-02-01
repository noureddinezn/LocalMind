<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relations
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function responses()
    {
        return $this->hasMany(Response::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    // Helper methods
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function hasFavorited($questionId)
    {
        return $this->favorites()->where('question_id', $questionId)->exists();
    }
}