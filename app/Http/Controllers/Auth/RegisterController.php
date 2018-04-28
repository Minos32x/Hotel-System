<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Rinvex\Country\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;



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
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        // $this->guard()->login($user);

        return view('pending');
    }

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
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'photo' => 'image|mimes:jpg,jpeg',
            'phone' => 'required|min:11',
            'gender' => ['required',
                Rule::in(['male', 'female'])],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $request = app('request');

        if (empty($data['avatar'])) {
            $image = 'avatar.jpg';
        } else {

            $image = time() . '.' . $request->avatar->getCLientOriginalName();
            Storage::putFileAs('public/avatars', $data['avatar'], $image);
        }

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'phone' => $data['phone'],
            'country' => $data['country'],
            'last_login' => now(),
            'photo' => $image,
            'approved_state'=>0
        ]);
    }

    public function showRegistrationForm()
    {
        $countries = countries();
        return view('auth.register', ['countries' => $countries]);

    }
}
