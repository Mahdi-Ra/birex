<?php

namespace App\Http\Controllers\Auth;

use App\Gateway;
use App\GeneralSettings;
use App\Http\Controllers\Controller;
use App\User;
use App\Etemplate;
use App\UserCryptoBalance;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
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
    protected $redirectTo = '/user/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    
    public function showRegistrationForm()
    {
        $basic = GeneralSettings::first();


        if ($basic->registration != 1) {
            return back()->with('alert', 'Registration Disable Now');
        }

        $data['page_title'] = "Sign Up";

        return view('auth.register', $data);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'phone' => 'required|numeric|min:11|unique:users|phone:              
                AF,AX,AL,DZ,AS,AD,AO,AI,AQ,AG,AR,AM,AW,AU,AT,AZ,BS,BH,BD,BB,BY,BE,BZ,BJ,BM,BT,BO,BQ,BA,
                BW,BV,BR,IO,BN,BG,BF,BI,CV,KH,CM,CA,KY,CF,TD,CL,CN,CX,CC,CO,KM,CG,CD,CK,CR,CI,HR,CU,CW,
                CY,CZ,DK,DJ,DM,DO,EC,EG,SV,GQ,ER,EE,ET,FK,FO,FJ,FI,FR,GF,PF,TF,GA,GM,GE,DE,GH,GI,GR,GL,
                GD,GP,GU,GT,GG,GN,GW,GY,HT,HM,VA,HN,HK,HU,IS,IN,ID,IR,IQ,IE,IM,IL,IT,JM,JP,JE,JO,KZ,KE,
                KI,KW,KG,LA,LV,LB,LS,LR,LY,LI,LT,LU,MO,MK,MG,MW,MY,MV,ML,MT,MH,MQ,MR,MU,YT,MX,FM,MD,MC,
                MN,ME,MS,MA,MZ,MM,NA,NR,NP,NL,NC,NZ,NI,NE,NG,NU,NF,KP,MP,NO,,OM,PK,PW,PS,PA,PG,PY,PE,PH,
                PN,PL,PT,PR,QA,,RE,RO,RU,RW,BL,SH,KN,LC,MF,PM,VC,WS,,SM,ST,SA,SN,RS,SC,SL,SG,SX,SK,SI,SB,
                SO,ZA,GS,KR,SS,ES,LK,SD,SR,SJ,SZ,SE,CH,SY,TW,TJ,TZ,TH,TL,TG,TK,TO,TT,TN,TR,TM,TC,TV,UG,UA,
                AE,GB,UM,US,UY,UZ,VU,VE,VN,VG,VI,WF,EH,YE,ZM,ZW,
                mobile',
                'username' => 'required|min:5|unique:users|regex:/^\S*$/u',
                'password' => 'required|string|min:4|confirmed
                |regex:/[a-z]+/
                |regex:/[A-Z]+/
                |regex:/[$@#&!]+/
                |regex:/[0-9]+/',

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $basic = GeneralSettings::first();

        if ($basic->email_verification == 1) {
            $email_verify = 0;
        } else {
            $email_verify = 1;
        }

        if ($basic->sms_verification == 1) {
            $phone_verify = 0;
        } else {
            $phone_verify = 1;
        }

        $verification_code = rand(10000, 99999);

        $sms_code = rand(10000, 99999);
        $email_time = Carbon::parse()->addMinutes(2);
        $phone_time = Carbon::parse()->addMinutes(2);

        return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'username' => $data['username'],
                'email_verify' => $email_verify,
                'verification_code' => $verification_code,
                'sms_code' => $sms_code,
                'email_time' => $email_time,
                'phone_verify' => $phone_verify,
                'phone_time' => $phone_time,
                'phone' => $data['phone'],
                'custom_image_cond' => random_int(1, 5),
                'tauth' => 0,
                'tfver' => 1,
                'password' => Hash::make($data['password']),
        ]);
    }

    protected function registered(Request $request, $user)
    {

        $gateway = Gateway::all();
        foreach ($gateway as $data) {
            UserCryptoBalance::create([
                    'user_id' => $user->id,
                    'gateway_id' => $data->id,
                    'balance' => 0.0000,
            ]);
        }
        
        $basic = GeneralSettings::first();

        if ($basic->email_verification == 1) {
            $text = "Your Verification Code Is: <b>".$user->verification_code."</b>";
            send_email($user->email, $user->name, 'Email verification', $text);
        }
        
    }

}
