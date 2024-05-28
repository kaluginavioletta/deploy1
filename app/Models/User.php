<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    public $timestamps = false;

    protected $primaryKey = 'id_user';

    protected $fillable = [
        'surname',
        'name',
        'patronymic',
        'tel',
        'email',
        'login',
        'password',
        'id_role',
        'id_order',
        'api_token', // Добавляем новый столбец для массового заполнения
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function roles()
    {
        return $this->belongsTo(Role::class, 'id_role', 'id_role');
    }

    public function orders()
    {
        return $this->belongsTo(Order::class, 'id_user', 'id_user');
    }

    public function cart_items()
    {
        return $this->hasMany(CartOrder::class, 'id_user', 'id_user');
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class, 'id_user', 'id_user');
    }
}
