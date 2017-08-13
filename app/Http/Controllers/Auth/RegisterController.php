<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Socialite;
use App\Profile;
use Auth;
use Session;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     *
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleProviderCallback()
    {
        try {
            $socicalUser = Socialite::driver('facebook')->user();
            $user = User::where('facebook_id', $socicalUser->getId())->first();
            if (!$user) {
                $user = new User();
                $user->facebook_id = $socicalUser->getId();
                $user->name = $socicalUser->getName();
                $user->email = $socicalUser->getEmail();
                $user->thumbnail = $socicalUser->getAvatar();
                $user->is_activated = 1;
                $user->save();

                $profile = new Profile();
                $profile->user_id = $user['id'];
                $profile->first_name = $socicalUser->getName();
                $profile->last_name = $socicalUser->getName();
                $profile->address = "";
                $profile->phone = 0;
                $profile->status = 1;
                $profile->save();
            }

            Auth::login($user);

            return redirect('/');
        } catch (Exception $e) {
            return redirect('home');
        }
    }
}
