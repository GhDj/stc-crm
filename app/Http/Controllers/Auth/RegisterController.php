<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Role;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('role:developer');
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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
      //  dd($data);
        if ($data['role'] == "manager") {

            $manager_role = Role::where('slug', 'manager')->first();
            $manager = new User();
            $manager->name = $data['name'];
            $manager->email = $data['email'];
            $manager->password = bcrypt($data['password']);
            $manager->save();
            $manager->roles()->attach($manager_role);
            return redirect()->back();
        } elseif ($data['role'] == "agent") {

            $agent_role = Role::where('slug', 'agent')->first();
            $agent = new User();
            $agent->name = $data['name'];
            $agent->email = $data['email'];
            $agent->password = bcrypt($data['password']);
            $agent->save();
            $agent->roles()->attach($agent_role);
            return redirect()->back();
        }

    }
}
