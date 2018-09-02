<?php

namespace App;

use App\Models\Category;
use App\Models\Race;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'slug', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function races()
    {
        return $this->belongsToMany(Race::class, 'user_races')->withPivot('start_time');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'user_categories')->withPivot('status');
    }
}
