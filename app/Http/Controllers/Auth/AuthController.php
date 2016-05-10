<?php

namespace CakeDeal\Http\Controllers\Auth;

use Auth;
use Alert;
use Redirect;
use CakeDeal\User;
use Validator;
use Socialite;
use CakeDeal\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
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

    /**
     * checks if user exists then creates new if user does not exist.
     */
    private function findOrCreateUser($theUser, $provider)
    {
        $checkUser = User::where('uid', $theUser->id)->first();
        if (is_null($checkUser)) {
            $checkUser = User::create([
                  'username'    => $theUser->name,
                  'email'       => $theUser->email,
                  'provider'    => $provider,
                  'uid'         => $theUser->id,
                  'avatar_url'  => $theUser->avatar,
              ]);

        Auth::login($checkUser);

            return redirect('/profile');
        }

        Auth::login($checkUser);

        return redirect($this->redirectTo);
    }

    /**
     *  Redirects to provider authentication page.
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     *  Logs in user with their social media credentials.
     */
    public function handleProviderCallback($provider)
    {
        try {
            $user = Socialite::driver($provider)->user();
        } catch (Exception $e) {
            return Redirect::to('auth/'.$provider);
        }

        return $this->findOrCreateUser($user, $provider);

    }

    /**
     * Logs out an authentiacated user.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogin()
    {
        return view('app.login');
    }


    /**
     * Logs out an authentiacated user.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogout()
    {
        Auth::logout();
        Alert::success('See you again!', 'miss you');

        return redirect()->route('index');
    }
}
