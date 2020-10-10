<?php

namespace App\Http\Controllers\Auth;

use App\City;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\State;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/';

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
        // return Validator::make($data, [
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'string', 'min:8', 'confirmed'],
        // ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // return User::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'password' => Hash::make($data['password']),
        // ]);
    }


    // Registration Functions
    public function registration(Request $request)
    {
        if($request->isMethod('post')){

            $rules = [
            //     'first_name' => 'required|string|max:255',
            //     'last_name' => 'required|string|max:255',
            //     'email' => 'required|unique:users|max:255|email',
                'password' => 'required|string|min:6|confirmed',
            ];
            $customMessages = [
            //     'first_name.required' => 'First Name is required.',
            //     'first_name.string' => 'Name must have a word.',
            //     'last_name.required' => 'Last Name is required.',
            //     'last_name.string' => 'Name must have a word.',
            //     'email.required' => 'Email is required.',
            //     'email.email' => 'Valid email address is required.',
            //     'email.unique' => 'This email already exists.',
                'password.required' => 'Password is required.',
            //     'password.min' => 'Password must have 6 letters atleast.',
            //     'password.string' => 'Password consists of letters and numbers.',

            ];
            $this->validate($request, $rules, $customMessages);

            $data = $request->all();

            $data['password'] = Hash::make($data['password']);



            if($data['userType'] == "Wholesale"){
                $data['isActive']= 0;
            }

            $success = User::create($data);

            if ($success) {
                $notification=array(
                 'message' => 'Registration has been successful',
                 'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            }
            else
            {
                $notification=array(
                'message' => 'Something Went wrong!',
                'alert-type' => 'danger'
                );
                return redirect()->back()->with($notification);
            }
        }
        return view('frontend.auth.register');
    }
}
