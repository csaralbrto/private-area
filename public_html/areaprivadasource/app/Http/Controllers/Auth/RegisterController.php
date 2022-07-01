<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Input;
use Mail;
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
        if ($data['type']==1) {
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8'],
                'g-recaptcha-response' => 'required',
                // 'g-recaptcha-response' => ['required','recaptcha']
                // 'document' =>['required','unique:users,document'],
                // 'captcha'=>[Input::get('captcha')],
            ]);
        }elseif($data['type']==4){

            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'name_agent' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8'],
                'g-recaptcha-response' => 'required',
                // 'captcha'=>'required|captcha',
                // 'g-recaptcha-response' => ['required','recaptcha'],
                'document' =>['required','unique:users,document']
            ]);

        }elseif($data['type']==5){

            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'Tdocument' => ['required', 'string'],
                'document' => ['required', 'numeric'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8'],
                'g-recaptcha-response' => 'required',
                // 'captcha'=>'required|captcha',
                // 'g-recaptcha-response' => ['required','recaptcha'],
                'document' =>['required','unique:users,document']
            ]);

        }elseif ($data['type']!=1 &&  $data['type']!=4) {
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8'],
                'g-recaptcha-response' => 'required',
                'document' =>['required','unique:users,document'],
                // 'g-recaptcha-response' => ['required','recaptcha']
                // 'captcha'=>'required|captcha',

            ]);
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if ($data['type']==1) {
            $check = isset($data['meGustaria']) ?$data['meGustaria']:'off';
            $user = User::create([
                'name' => $data['name'],
                'tipo_usuario'=>$data['type'],
                'email' => $data['email'],
                'cel_phone'=>$data["phone"],
                'password' => Hash::make($data['password']),
                ]);
                $user->check_notificaciones = $check;
                $user->save();
            }elseif ($data['type']!=1) {
                $user =  User::create([
                'name' => $data['name'],
                'tipo_documento' =>($data['type'] == 2 || $data['type'] == 3) ? 1: $data['Tdocument'],
                'document'=>$data['document'],
                'email'=>$data['email'],
                'cel_phone'=>$data["phone"],
                'password' => Hash::make($data['password']),
                'tipo_usuario'=>$data['type'],
                ]);
            }
        if ($user) {
            $email = $user->email;
            $name = $user->name;
            Mail::send('mails.Bienvenida', $data, function ($message) use ($email,$name) {
                $message->from('servicioalcliente@areaprivada.co', 'Área Privada');
                $message->subject('!Hola! Bienvenid@ a Área Privada.');
                $message->to($email,$name);
            });
        }
        return $user; 
    }
}
