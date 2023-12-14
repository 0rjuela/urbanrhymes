<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Socialite;
use App\User;
use App\SocialAccount;
use Laravel\Socialite\Contracts\User as ProviderUser;

class SocialController extends Controller
{

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        try {
            $user = Socialite::driver($provider)->stateless()->user();

            $authUser = $this->findOrCreateUser($user, $provider);
            Auth::login($authUser, true);
        } catch (\Exception $e) {

        }

        return redirect('/home');
    }

    public function findOrCreateUser(ProviderUser $user, $provider)
    {
        $authUser = User::where('provider_id', $user->id)
                ->where('email', $user->email)->first();
        if ($authUser) {
            if (empty($authUser->provider_id) || is_null($authUser->provider_id)) {
                $authUser->provider_id = $user->id;
                $authUser->provider    = $provider;
                $authUser->save();
            }

            return $authUser;
        }
        return User::create([
                'name' => $user->name,
                'email' => $user->email,
                'provider' => $provider,
                'provider_id' => $user->id
        ]);
    }

    public function callback(Request $request)
    {
        try {
            $user = Socialite::with('facebook')->user();
        } catch (\Exception $e) {
            return redirect()->route('home');
        }

        $authUser = $this->findOrCreateUser($user);
        Auth::login($authUser, true);

        return redirect()->route('home');
    }
}