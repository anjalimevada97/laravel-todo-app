<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string'],
            'last_name' => [
                'required',
                'string',
            ],
            'email' => [
                'required',
                'string',
                'email',
                'email:rfc,dns',
                'unique:users',
            ],
            'phone' => [
                'required',
                'string',
            ],
            'gender' => [
                'required',
                'string',
                Rule::in(['MALE', 'FEMALE', 'OTHER']),
            ],
            'dob' => [
                'nullable',
                'date',
            ],
            'brothers' => [
                'required',
                'numeric',
                'min:0',
            ],
            'sisters' => [
                'required',
                'numeric',
                'min:0',
            ],
            'address' => [
                'required',
                'string',
            ],
            'city' => [
                'required',
                'string',
            ],
            'state' => [
                'required',
                'string',
            ],
            'zip' => [
                'required',
                'numeric',
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
            ],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'dob' => $data['dob'],
            'gender' => $data['gender'],
            'brothers' => $data['brothers'],
            'sisters' => $data['sisters'],
            'address' => $data['address'],
            'city' => $data['city'],
            'state' => $data['state'],
            'zip' => $data['zip'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
