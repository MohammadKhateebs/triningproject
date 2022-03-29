<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\model\Student;
use App\model\Volunteer;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    public function redirectTo()
    {
        switch (Auth::user()->role) {
            case 1:
                $this->redirectTo="/admin";
                return $this->redirectTo;
                break;
            case 2:
                $this->redirectTo="/techar/".Auth::user()->userid;
                return $this->redirectTo;
                break;

            case 3:
                $this->redirectTo="/volunteer/".Auth::user()->userid;
                return $this->redirectTo;
                break;
            case 4:
                $this->redirectTo="/home/".Auth::user()->userid;

                return $this->redirectTo;
                break;

            default:


                $this->redirectTo="/register";
                return     $this->redirectTo;
                break;
        }
    }
    public function showRegistrationForm()
    {

        return view('auth.register');
    }
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();


        if (Student::where('identification', '=', $request['userid'])->exists()) {
            $s=Student::select('firstName','lastName')->where('identification', $request['userid'])->get();
            $request['role']=4;
            $request['name']=$s[0]->firstName." ".$s[0]->lastName;
        }
        elseif(Volunteer::where('identification', '=', $request['userid'])->exists()){
            $v=Volunteer::select('firstName','lastName')->where('identification', $request['userid'])->get();
            $request['role']=3;
            $request['name']=$v[0]->firstName." ".$v[0]->lastName;
        }
        else{
            $request['role']=0;
        }

        if($request->role!=0){
            event(new Registered($user = $this->create($request->all())));

            $this->guard()->login($user);

            if ($response = $this->registered($request, $user)) {
                return $response;
            }

            return $request->wantsJson()
                ? new JsonResponse([], 201)
                : redirect($this->redirectPath());
        }
        else{
            return redirect()->back()->with(["valid"=>' لايمكن انشاء حساب لهذا المستخدم ']);
        }
    }

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
        return Validator::make($data, [

            'userid' => ['required'],
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
        if($data['role']==3){
            Volunteer::where('identification', $data['userid'])->update(array('active' => 'active'));

        }elseif ($data['role']==4){
            Student::where('identification', $data['userid'])->update(array('active' => 'active'));

        }

        return User::create([
            'userid' => $data['userid'],
            'role'=>$data['role'],
            'password' => Hash::make($data['password']),
            'name'=>$data['name'],
        ]);


    }

}
