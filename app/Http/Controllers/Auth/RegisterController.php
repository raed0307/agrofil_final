<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use App\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        if ($data['userType'] == 'agency') {
            $agencyName = ['required', 'string', 'max:255'];
            $rne = ['required', 'string', 'max:255'];
        } else {
            $agencyName = ['nullable'];
            $rne = ['nullable'];
        }
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'userType' => ['required', 'string', 'max:255'],
            'agencyName' => $agencyName,
            'RNE' => $rne,
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'dob' => ['required', 'date', 'before:today'],
            'avatar' => ['sometimes', 'image', 'mimes:jpg,jpeg,png', 'max:1024']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if (request()->has('avatar')) {
            $avataruloaded = request()->file('avatar');
            $avatarname = time() . '.' . $avataruloaded->getClientOriginalExtension();
            $avatarpath = public_path('/images/');
            $avataruloaded->move($avatarpath, $avatarname);
            $user = User::create([
                'name' => $data['name'],
                'userType' => $data['userType'],
                'agencyName' => $data['agencyName'],
                'RNE' => $data['RNE'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'dob' => $data['dob'],
                'avatar' => '/images/' . $avatarname,
            ]);
        } else {
            $user = User::create([
                'name' => $data['name'],
                'userType' => $data['userType'],
                'agencyName' => $data['agencyName'],
                'RNE' => $data['RNE'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'dob' => $data['dob'],
                'avatar' => $data['avatar'],
            ]);
        }
        $role = Role::select('id')->where('name', 'user')->first();
        $user->roles()->attach($role);
        return $user;
    }
}
