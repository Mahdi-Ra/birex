<?php

namespace App\Http\Controllers;

use App\AdvertiseDeal;
use App\Advertisment;
use App\Crypto;
use App\CryptoAddvertise;
use App\Currency;
use App\Etemplate;
use App\Faq;
use App\Price;
use App\Gateway;
use App\GeneralSettings;
use App\Menu;
use App\Slider;
use App\User;
use App\UserCryptoBalance;
use App\UserLogin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PragmaRX\Google2FA\Google2FA;

class FrontendController extends Controller
{
    public function authCheck()
    {
        if (Auth::user()->status == 1 && Auth::user()->email_verify == 1 && Auth::user()->phone_verify == 1 && Auth::user()->tfver == 1) {
            return redirect('user/home');
        } else {
            return view('auth.noauthor');
        }
    }

    
    public function BuyTether(Request $request)
    {
        $title = "Buy Tether Request";
        if($request->method()=="GET")
        {
            return view('user_panel.buytether', compact('title'));
            
        }
        elseif($request->method()=="POST")
        {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'amount' => 'required'
            ]);

             
            $message = "Your are have Request to purchase Tether From : Name : ".
            $request->name
            ." Email : ".
            $request->email
            ." Phone : ".
            $request->phone
            ." Amount : ".
            $request->amount
            ." On the date of : ".
            date("Y/m/d")
            ;
            
            send_email('mahdirahani@gmail.com', 'BirCoin', 'Request to purchase Tether', $message);
            send_email('office.bircoin@gmail.com', 'BirCoin', 'Request to purchase Tether', $message);
            
            return back()->with('message','Your Request Buy Tether Submit Successfuly');
        }
        return back();
    }
    
  
    
    public function send_sms($to, $message)
    {
        $temp = Etemplate::first();
        $gnl = GeneralSettings::first();
        $sendtext = urlencode($message);
        $appi = $temp->smsapi;
        $appi = str_replace("{{number}}", $to, $appi);
        $appi = str_replace("{{message}}", $sendtext, $appi);
        $result = file_get_contents($appi);
    }

    public function sendemailver()
    {
        $user = User::find(Auth::id());

        $chktm = Carbon::parse($user->email_time)->addMinutes(2);

        if ($chktm > Carbon::now()) {
            $delay = Carbon::now()->diffInSeconds($chktm);
            return back()->with('alert', 'Please Try after ' . $delay . ' Seconds');
        } else {

            $message = 'Your Verification code is: ' . $user->verification_code;
            $user->email_time = Carbon::now();
            $user->save();
            send_email($user->email, $user->name, 'Verification Code', $message);

            return back()->with('success', 'Email verification code sent succesfully');
        }

    }

    public function sendsmsver()
    {
        $user = User::find(Auth::id());
        $chktm = Carbon::parse($user->phone_time)->addMinutes(2);


        if ($chktm > Carbon::now()) {
            $delay = Carbon::now()->diffInSeconds($chktm);
            return back()->with('alert', 'Please Try after ' . $delay . ' Seconds');
        } else {
            $user->phone_time = Carbon::now();
            $user->save();
            $message = 'Your Verification code is: ' . $user->sms_code;
            $this->send_sms($user->phone, $message);

            return back()->with('success', 'SMS verification code sent succesfully');
        }

    }

    public function emailverify(Request $request)
    {

        $this->validate($request, [
                'code' => 'required'
        ]);

        $user = User::find(Auth::id());

        $code = $request->code;

        if ($user->verification_code == $code) {
            $user['email_verify'] = 1;
            $user['email_time'] = Carbon::now();
            $user->save();
            
            $basic = GeneralSettings::first();
            
            if ($basic->sms_verification == 1) {
                $txt = "Your phone verification code is: ".$user->sms_code;
                send_sms($user->phone, $txt);
            }
        
            return redirect('user/home')->with('success', 'Email Verified');
        } else {
            return back()->with('alert', 'Wrong Verification Code');
        }

    }

    public function smsverify(Request $request)
    {

        $this->validate($request, [
                'code' => 'required'
        ]);

        $user = User::find(Auth::id());

        $code = $request->code;
        if ($user->sms_code == $code) {
            $user['phone_verify'] = 1;
            $user['phone_time'] = Carbon::now();
            $user->save();

            return redirect('user/home')->with('success', 'SMS Verified');
        } else {
            return back()->with('alert', 'Wrong Verification Code');
        }

    }

    public function verify2fa(Request $request)
    {
        $user = User::find(Auth::id());

        $this->validate($request, [
                'code' => 'required',
        ]);

        $google2fa = new Google2FA();
        $secret = $request->code;
        $valid = $google2fa->verifyKey($user->secretcode, $secret);


        if ($valid) {
            $user['tfver'] = 1;
            $user->save();
            return redirect('user/home');
        } else {

            return back()->with('alert', 'Wrong Verification Code');
        }

    }

    public function index()
    {
        $data['page_title'] = "home";
        $slider = Slider::find(5);
        $coin = Gateway::all();
        $methods = Crypto::where('status', 1)->get();
        $currency = Currency::where('status', 1)->get();

        $sell_btc = CryptoAddvertise::where('add_type', 2)->where('gateway_id', 505)->where('user_id', '!=',
                Auth::id())->take(5)->inRandomOrder()->get();
        $sell_eth = CryptoAddvertise::where('add_type', 2)->where('gateway_id', 506)->where('user_id', '!=',
                Auth::id())->take(5)->inRandomOrder()->get();
        $sell_doge = CryptoAddvertise::where('add_type', 2)->where('gateway_id', 509)->where('user_id', '!=',
                Auth::id())->take(5)->inRandomOrder()->get();
        $sell_lite = CryptoAddvertise::where('add_type', 2)->where('gateway_id', 510)->where('user_id', '!=',
                Auth::id())->take(5)->inRandomOrder()->get();

//        $buy_btc = CryptoAddvertise::where('add_type', 1)->where('gateway_id', 505)->where('user_id', '!=',
//                Auth::id())->take(5)->inRandomOrder()->get();

        $buy_eth = CryptoAddvertise::where('add_type', 1)->where('gateway_id', 506)->where('user_id', '!=',
                Auth::id())->take(5)->inRandomOrder()->get();
        $buy_doge = CryptoAddvertise::where('add_type', 1)->where('gateway_id', 509)->where('user_id', '!=',
                Auth::id())->take(5)->inRandomOrder()->get();
        $buy_lite = CryptoAddvertise::where('add_type', 1)->where('gateway_id', 510)->where('user_id', '!=',
                Auth::id())->take(5)->inRandomOrder()->get();


        $buy_btc = CryptoAddvertise::where('add_type', 1)->where('status', 0)->where('reject',false)->where('gateway_id',
                505)->where('user_id',
                '!=',
                Auth::id())->get();



        foreach ($buy_btc as $key => $item1) {

            if (!empty(AdvertiseDeal::where([
                    ['addvertises_id', $item1->id],
                    ['status', '!=', 2],
            ])->orWhere([['comp_state', 1],['addvertises_id', $item1->id]])->sum('amount_to'))) {
                
     
                $buy_btc[$key]->max_amount = $buy_btc[$key]->max_amount - (AdvertiseDeal::where([
                                ['addvertises_id', $item1->id],
                                ['status', '!=', 2],
                        ])->orWhere([['comp_state', 1],['addvertises_id', $item1->id]])->sum('amount_to'));


                if ($buy_btc[$key]->max_amount < $buy_btc[$key]->min_amount) {
                    if(array_key_exists($key, (array)$buy_btc))
                    {
                        unset($buy_btc[$key]);
                    }
                }

                if ($buy_btc[$key]->trusted_sell) {
                    $wage = $buy_btc[$key]->max_amount * 1.0075;
                } else {

                    $wage = $buy_btc[$key]->max_amount * 1.005;
                }

                $bal = UserCryptoBalance::where('user_id', $item1->user_id)->where('gateway_id',
                        505)->first()->balance;

                if ($wage > $bal) {
                   if(array_key_exists($key, (array)$buy_btc))
                    {
                        unset($buy_btc[$key]);
                    }
                }
            }
        }
     
        return view('front.index', compact('slider', 'coin',
                'methods', 'currency', 'sell_btc', 'sell_eth', 'sell_doge', 'sell_lite',
                'buy_btc', 'buy_eth', 'buy_doge', 'buy_lite'));
    }

    public function menu($slug)
    {
        $menu = $data['menu'] = Menu::whereSlug($slug)->first();
        $data['page_title'] = $menu->name;
        return view('layouts.menu', $data);
    }

    public function contactUs()
    {
        $data['page_title'] = "Contact Us";
        return view('layouts.contact', compact('data'));
    }

    public function termsView()
    {
        $page_title = "Our Terms";
        return view('layouts.terms', compact('page_title'));
    }

    public function policyView()
    {
        $page_title = "Our Policy";
        return view('layouts.policy', compact('page_title'));
    }

    public function contactSubmit(Request $request)
    {
        $request->validate([
                'name' => 'required',
                'email' => 'required',
                'message' => 'required'
        ]);

        $general = GeneralSettings::first();

        $subject = "Contact Us";
        send_email($general->email, 'I am' . $request->name, $subject, $request->message);
        $notification = array('message' => 'Contact Message Send.', 'alert-type' => 'success');
        return back()->with($notification);
    }

    public function sell_btc()
    {
        $coin = CryptoAddvertise::where('add_type', 2)->where('gateway_id', 505)->where('user_id', '!=',
                Auth::id())->latest()->paginate(20);
        $type = 1;
        return view('front.sell_buy', compact('coin', 'type'));
    }

    public function sell_eth()
    {
        $coin = CryptoAddvertise::where('add_type', 2)->where('gateway_id', 506)->where('user_id', '!=',
                Auth::id())->latest()->paginate(20);
        $type = 1;
        return view('front.sell_buy', compact('coin', 'type'));
    }

    public function sell_doge()
    {
        $coin = CryptoAddvertise::where('add_type', 2)->where('gateway_id', 509)->where('user_id', '!=',
                Auth::id())->latest()->paginate(20);
        $type = 1;
        return view('front.sell_buy', compact('coin', 'type'));
    }

    public function sell_lite()
    {
        $coin = CryptoAddvertise::where('add_type', 2)->where('gateway_id', 510)->where('user_id', '!=',
                Auth::id())->latest()->paginate(20);
        $type = 1;
        return view('front.sell_buy', compact('coin', 'type'));
    }

    public function buy_btc()
    {
        $buy_btc = CryptoAddvertise::where('add_type', 1)->where('status', 0)->where('reject',false)->where('gateway_id',
                505)->where('user_id',
                '!=',
                Auth::id())->latest()->paginate(20);
        $type = 2;

        $ad = AdvertiseDeal::groupBy('addvertises_id')
                ->selectRaw('sum(amount_to) as amount_to, addvertises_id')
                ->get();

       foreach ($buy_btc as $key => $item1) {

            if (!empty(AdvertiseDeal::where([
                    ['addvertises_id', $item1->id],
                    ['status', '!=', 2],
            ])->orWhere([['comp_state', 1],['addvertises_id', $item1->id]])->sum('amount_to'))) {
                $buy_btc[$key]->max_amount = $buy_btc[$key]->max_amount - (AdvertiseDeal::where([
                                ['addvertises_id', $item1->id],
                                ['status', '!=', 2],
                        ])->orWhere([['comp_state', 1],['addvertises_id', $item1->id]])->sum('amount_to'));

                if ($buy_btc[$key]->max_amount < $buy_btc[$key]->min_amount) {
                    if(array_key_exists($key, (array)$buy_btc))
                    {
                        unset($buy_btc[$key]);
                    }
                }

                if ($buy_btc[$key]->trusted_sell) {
                    $wage = $buy_btc[$key]->max_amount * 1.0075;
                } else {

                    $wage = $buy_btc[$key]->max_amount * 1.005;
                }

                $bal = UserCryptoBalance::where('user_id', $item1->user_id)->where('gateway_id',
                        505)->first()->balance;

                if ($wage > $bal) {
                   if(array_key_exists($key, (array)$buy_btc))
                    {
                        unset($buy_btc[$key]);
                    }
                }
            }
        }


        return view('front.sell_buy', compact('buy_btc', 'type'));
    }

    public function buy_eth()
    {
        $coin = CryptoAddvertise::where('add_type', 1)->where('gateway_id', 506)->where('user_id', '!=',
                Auth::id())->latest()->paginate(20);
        $type = 2;
        return view('front.sell_buy', compact('coin', 'type'));
    }

    public function buy_doge()
    {
        $coin = CryptoAddvertise::where('add_type', 1)->where('gateway_id', 509)->where('user_id', '!=',
                Auth::id())->latest()->paginate(20);
        $type = 2;
        return view('front.sell_buy', compact('coin', 'type'));
    }

    public function buy_lite()
    {
        $coin = CryptoAddvertise::where('add_type', 1)->where('gateway_id', 510)->where('user_id', '!=',
                Auth::id())->latest()->paginate(20);
        $type = 2;
        return view('front.sell_buy', compact('coin', 'type'));
    }

    public function viewSlug($id)
    {
        $coin = CryptoAddvertise::findOrFail($id);
        
      
        if (!empty(AdvertiseDeal::where([
                ['addvertises_id', $coin->id],
                ['status', '!=', 2]
        ])->orWhere([['comp_state', 1],['addvertises_id', $coin->id]])->sum('amount_to'))) {
            $coin->max_amount = $coin->max_amount - (AdvertiseDeal::where([
                            ['addvertises_id', $coin->id],
                            ['status', '!=', 2]
                    ])->orWhere([['comp_state', 1],['addvertises_id', $coin->id]])->sum('amount_to'));

            if ($coin->max_amount < $coin->min_amount) {
               $coin=null;
            }

            if ($coin->trusted_sell) {
                $wage = $coin->max_amount * 1.0075;
            } else {

                $wage = $coin->max_amount * 1.005;
            }

            $bal = UserCryptoBalance::where('user_id', $coin->user_id)->where('gateway_id',
                505)->first()->balance;

            if ($wage > $bal) {
               
                $coin=null;
            }
        }
        
        if($coin==null)
        {
            return redirect()->route('homepage');
        }
            
        $price = $coin->price;
        
        $pr= Price::find($coin->currency->name)->am;
        
        return view('front.view', compact('coin', 'price','pr'));
    }

    public function searchRe(Request $request)
    {
        $request->validate([
                'add_type' => 'required',
                'gateway_id' => 'required',
                'method_id' => 'required',
                'currency_id' => 'required',
        ]);

        $buy_btc = CryptoAddvertise::where('add_type', $request->add_type)->where('status', 0)->where('reject',false)->where('gateway_id',
                $request->gateway_id)
                ->where('method_id', $request->method_id)
                ->where('currency_id', $request->currency_id)
                ->where('user_id', '!=', Auth::id())->latest()->paginate(20);


        $ad = AdvertiseDeal::groupBy('addvertises_id')
                ->selectRaw('sum(amount_to) as amount_to, addvertises_id')
                ->get();

        foreach ($buy_btc as $key => $item1) {

            if (!empty(AdvertiseDeal::where([
                    ['addvertises_id', $item1->id],
                    ['status', '!=', 2],
            ])->orWhere([['comp_state', 1],['addvertises_id', $item1->id]])->sum('amount_to'))) {
                $buy_btc[$key]->max_amount = $buy_btc[$key]->max_amount - (AdvertiseDeal::where([
                                ['addvertises_id', $item1->id],
                                ['status', '!=', 2],
                        ])->orWhere([['comp_state', 1],['addvertises_id', $item1->id]])->sum('amount_to'));

                if ($buy_btc[$key]->max_amount < $buy_btc[$key]->min_amount) {
                    if(array_key_exists($key, (array)$buy_btc))
                    {
                        unset($buy_btc[$key]);
                    }
                }

                if ($buy_btc[$key]->trusted_sell) {
                    $wage = $buy_btc[$key]->max_amount * 1.0075;
                } else {

                    $wage = $buy_btc[$key]->max_amount * 1.005;
                }

                $bal = UserCryptoBalance::where('user_id', $item1->user_id)->where('gateway_id',
                        505)->first()->balance;

                if ($wage > $bal) {
                   if(array_key_exists($key, (array)$buy_btc))
                    {
                        unset($buy_btc[$key]);
                    }
                }
            }
        }
        $count = count($buy_btc);

        $type = $request->add_type == 1 ? '2' : '1';

        if ($count != 0) {
            return view('front.sell_buy', compact('buy_btc', 'type'));
        } else {
            return back()->with('alert', 'Not Found');
        }

    }

    public function profileView($username)
    {
        $user = User::where('username', $username)->first();

        if (empty($user)) {
            return redirect('/');
        }

        $id = intval($user->id);

        $trade_btc = AdvertiseDeal::where('gateway_id', 505)->where('status', 1)->where(function ($query) use ($id) {
            $query->where('to_user_id', $id);
            $query->orWhere('from_user_id', $id);
        })->sum('coin_amount');

        $trade_etc = AdvertiseDeal::where('gateway_id', 506)->where('status', 1)->where(function ($query) use ($id) {
            $query->where('to_user_id', $id);
            $query->orWhere('from_user_id', $id);
        })->sum('coin_amount');

        $trade_doge = AdvertiseDeal::where('gateway_id', 509)->where('status', 1)->where(function ($query) use ($id) {
            $query->where('to_user_id', $id);
            $query->orWhere('from_user_id', $id);
        })->sum('coin_amount');

        $trade_lite = AdvertiseDeal::where('gateway_id', 510)->where('status', 1)->where(function ($query) use ($id) {
            $query->where('to_user_id', $id);
            $query->orWhere('from_user_id', $id);
        })->sum('coin_amount');

        $first_buy = AdvertiseDeal::where('from_user_id', $user->id)->where('status', 1)->first();

        $last_login = UserLogin::orderBy('id', 'desc')->where('user_id', $user->id)->first();

        $coin = CryptoAddvertise::where('user_id', $user->id)->paginate(5);

        return view('front.profile', compact('user', 'trade_btc',
                'trade_etc', 'trade_doge', 'trade_lite', 'first_buy', 'last_login', 'coin'));
    }

}
