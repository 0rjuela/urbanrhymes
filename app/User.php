<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\SocialAccount;
use Auth;

class User extends Authenticatable
{

    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'provider', 'provider_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function SocialAccount()
    {
        return $this->hasMany(SocialAccount::class);
    }

    public function facebook_id()
    {
        return SocialAccount::where('user_id', Auth::User()->id)
                ->where('provider', 'facebook')
                ->get(['provider_user_id'])->first();
    }
}