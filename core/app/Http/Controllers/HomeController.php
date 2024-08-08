<?php

namespace App\Http\Controllers;

use App\AdvertiseDeal;
use App\Complaints;
use App\Crypto;
use App\CryptoAddvertise;
use App\Currency;
use App\DealConvertion;
use App\Deposit;
use App\Gateway;
use App\GeneralSettings;
use App\Income;
use App\RequestPayment;
use App\Trx;
use App\User;
use App\Price;
use App\UserCryptoBalance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use PragmaRX\Google2FA\Google2FA;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'CheckStatuss']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $balance = UserCryptoBalance::whereUser_id(Auth::id())->get();
        return view('home', compact('balance'));
    }

    public function editProfile()
    {
        $page_title = 'Profile';
        $user = User::findOrFail(Auth::id());
        return view('user_panel.profile.profile', compact('page_title', 'user'));
    }

  
    public function logoutt()
    {
        $user = User::findOrFail(Auth::id());

        if(Auth::user()->tauth == 1)
        {
            $user['tfver'] = 0;
        }else{
            $user['tfver'] = 1;

        }
        $user->save();
        
        Auth::guard()->logout();
    }
    
    public function submitProfile(Request $request)
    {
        $this->validate($request, [
                'name' => ['required', 'regex:/^[A-ZÀÂÇÉÈÊËÎÏÔÛÙÜŸÑÆŒa-zàâçéèêëîïôûùüÿñæœ0-9_.,() ]+$/'],
                'phone' => 'required|max:255',
                'zip_code' => 'required',
                'address' => 'required',
                'city' => 'required',
                'country' => 'required',
        ]);
        $input = Input::except(['_token', '_method']);
        User::whereId(Auth::id())->update($input);
        return back()->with('success', 'Profile Update Successful');
    }

    public function changePassword()
    {
        $page_title = 'Change Password';
        return view('user_panel.profile.change_password', compact('page_title'));
    }

    public function submitPassword(Request $request)
    {
        $this->validate($request, [
                'passwordold' => 'required',
                'password' => 'required|min:5|confirmed'
        ]);

        try {
            $c_password = User::find(Auth::id())->password;
            $c_id = User::find(Auth::id())->id;
            $user = User::findOrFail($c_id);

            if (Hash::check($request->passwordold, $c_password)) {

                $password = Hash::make($request->password);
                $user->password = $password;
                $user->save();

                return redirect()->back()->with('success', 'Password Change Successfully.');
            } else {
                return redirect()->back()->withErrors('Password Not Match');
            }
        } catch (\PDOException $e) {
            return redirect()->back()->withErrors('Some Problem Occurs, Please Try Again!');
        }
    }


    public function deposit()
    {
        $data['gates'] = Gateway::whereStatus(1)->get();
        $data['user_address'] = UserCryptoBalance::where('user_id', Auth::user()->id)->get();
        return view('user_panel.deposit', $data);
    }

    public function sell_coin()
    {
        $coin = Gateway::where('status', 1)->get();
        $methods = Crypto::where('status', 1)->get();
        $currency = Currency::where('status', 1)->get();

        $lite_usd = $doge_usd = $eth_usd = 0;

        $bal = UserCryptoBalance::where('user_id', Auth::id())->where('gateway_id', 505)->first()->balance;

        $usd = Price::find('USD')->am;
        $try = Price::find('TRY')->am;
        $eur = Price::find('EUR')->am;
        
        return view('user_panel.sell_coin', compact('coin', 'methods',
                'currency', 'btc_usd', 'lite_usd', 'doge_usd', 'eth_usd', 'bal','usd','try','eur'));

    }

    public function auth_for_use(Request $request)
    {

        if ($request->method() == "GET") {
            return view('user_panel.profile.authentication', ['user' => Auth::user()]);
        }

        if ($request->method() == "POST") {

            if ($request->hasFile('passport_image') && is_null(Auth::user()->passport_image)) {

                if ($request->file('passport_image')->getSize() > 5000) {
                    return back()->withErrors('Photo size should be less than 5 MB');
                }
                $passport_image = str_random(10) . time() . md5(time()) . md5("behnamsecret") . '.' . $request->passport_image->getClientOriginalExtension();
                $request->passport_image->move('./image_secret_users/', $passport_image);
                Auth::user()->passport_image = "image_secret_users/" . $passport_image;
            }

            if ($request->hasFile('selfi_request') && is_null(Auth::user()->selfi_request)) {

                $selfi_request = str_random(10) . time() . md5(time()) . md5("behnamsecret") . '.' . $request->selfi_request->getClientOriginalExtension();
                $request->selfi_request->move('./image_secret_users/',
                        $selfi_request);
                Auth::user()->front_identification_card_image = "image_secret_users/" . $selfi_request;
            }

            if (isset($request->selfie) && is_null(Auth::user()->selfie_image)) {

                $img = $request->selfie;
                if ($img != "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAKoAAADICAYAAAB4SnrTAAAAmklEQVR4nO3BAQEAAACCIP+vbkhAAQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAALwYUJgABZkzccAAAAABJRU5ErkJggg==") {
                    $img = str_replace('data:image/png;base64,', '', $img);
                    $img = str_replace(' ', '+', $img);
                    $data = base64_decode($img);
                    $selfie = str_random(10) . time() . time() . md5(time()) . md5("behnamsecret");

                    file_put_contents('./image_secret_users/' . $selfie . '.png', $data);
                    Auth::user()->selfie_image = 'image_secret_users/' . $selfie . '.png';
                }
            }

            if (isset($request->custom) && is_null(Auth::user()->custom_image)) {

                $img = $request->custom;
                if ($img != "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAKoAAADICAYAAAB4SnrTAAAAmklEQVR4nO3BAQEAAACCIP+vbkhAAQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAALwYUJgABZkzccAAAAABJRU5ErkJggg==") {
                    $img = str_replace('data:image/png;base64,', '', $img);
                    $img = str_replace(' ', '+', $img);
                    $data = base64_decode($img);
                    $custom = str_random(10) . time() . time() . md5(time()) . md5("behnamsecret");

                    file_put_contents('./image_secret_users/' . $custom . '.png', $data);
                    Auth::user()->custom_image = 'image_secret_users/' . $custom . '.png';
                }
            }
            Auth::user()->expert_message = null;
            Auth::user()->save();

            return back()->with('message',
                    'Your authentication has been successfully uploaded and is being reviewed by our experts');


        }
    }

    public function sell_buy_history()
    {
        $coin = Gateway::all();
        $crypto = Crypto::where('status', 1)->get();
        $addvertise = CryptoAddvertise::whereUser_id(Auth::id())
                ->latest()->paginate(5);
        return view('user_panel.sell_buy_history', compact('coin', 'crypto', 'addvertise'));

    }

    public function currenyGet(Request $request)
    {
        $data = Currency::findOrFail($request->crypto);
        return response()->json($data);
    }

    public function addStore(Request $request)
    {

        $this->validate($request, [
                'gateway_id' => 'required',
                'crypto_id' => 'required',
                'min_amount' => 'required|numeric|min:0.00000001',
                'max_amount' => 'required|numeric|min:0.00000001',
                'term_detail' => 'required',
                'margin' => 'required|numeric',
                'payment_detail' => 'required',
                'currency' => 'required',
                'agree' => 'required',
        ]);

        if ($request->min_amount > $request->max_amount) {
            return redirect()->back()->withErrors('Dear user, The minimum should not be more than the maximum')->withInput();

        }

        $lite_usd = $doge_usd = $eth_usd = 0;
        $btc_usd = json_decode(file_get_contents('https://www.blockonomics.co/api/price?currency=USD'))->price;


        if ($request->gateway_id == 505) {
            $price = $btc_usd;
        } elseif ($request->gateway_id == 506) {
            $price = $eth_usd;
        } elseif ($request->gateway_id == 509) {
            $price = $doge_usd;
        } else {
            $price = $lite_usd;
        }

        if ($request->agree == 1) {

            $cur = Currency::find($request->currency);

            $method = Crypto::find($request->crypto_id);

            if ($request->margin == 0) {
                $after_margin = 0;
            } else {
                $after_margin = ($request->margin / 100) * $request->max_amount;
            }


            $total_price = $request->max_amount + $after_margin;

            $balance_btc = UserCryptoBalance::where('user_id', Auth::id())->where('gateway_id', 505)->first()->balance;



            $buy_btc = CryptoAddvertise::where('add_type', 1)->where('reject',false)->where('gateway_id',
                    505)->where('user_id','=',Auth::id())->get();
    
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
                        $buy_btc[$key]->max_amount = $buy_btc[$key]->max_amount * 1.0075;
                    } else {
    
                        $buy_btc[$key]->max_amount = $buy_btc[$key]->max_amount * 1.005;
                    }
    
                    $bal = UserCryptoBalance::where('user_id', $item1->user_id)->where('gateway_id',
                            505)->first()->balance;
    
                    if ($buy_btc[$key]->max_amount > $bal) {
                       if(array_key_exists($key, (array)$buy_btc))
                        {
                            unset($buy_btc[$key]);
                        }
                    }
                }
            }
            
            $mines = 0;
            
            foreach ($buy_btc as $key => $item1) {
                $mines = $mines + $item1->max_amount;
            }
            
            $balance_btc = $balance_btc - $mines;
                             
            if (isset($request->trusted_sell) && $request->trusted_sell == "trusted_sell") {
                
                
                    return back()->withErrors('Not Available')->withInput();
                    
                    $cr = new CryptoAddvertise();
                    $cr->user_id = Auth::id();
                    $cr->add_type = 1;
                    $cr->gateway_id = $request->gateway_id;
                    $cr->method_id = $request->crypto_id;
                    $cr->currency_id = $request->currency;
                    $cr->margin = $request->margin;
                    $cr->price = round($total_price, 2);
                    $cr->min_amount = $request->min_amount;
                    $cr->max_amount = $request->max_amount;
                    $cr->term_detail = $request->term_detail;
                    $cr->payment_detail = $request->payment_detail;
                    $cr->status = -1;
                    $cr->trusted_sell = true;
                   
                if ($balance_btc > $request->max_amount * 1.0075) {

                        $cr->save();
                        
                        $message = "Your trade advertise created successfully. You can sell the below amount"
                        . 'Min: '.
                        $request->min_amount 
                        . 'BTC _ Max: '.
                        $request->max_amount 
                        . "BTC .You choose " .
                        $method->name 
                        . " for transaction.Please wait for approving it.";
                        
                        send_email(Auth::user()->email, Auth::user()->name, 'Advertise Create Successful', $message);
                        send_sms(Auth::user()->phone, $message);
                                
                } else {
                    
                    session(['cr'=>$cr]);

                    return redirect()->back()->with('btc',
                            number_format((($request->max_amount * 1.0075) - $balance_btc),8))->with('message1',
                            'Dear user, the maximum amount entered must be less than or equal to your wallet .You can sell '. number_format($balance_btc * 0.9925 , 8) .' BTC . Otherwise If you want sell '. $request->max_amount .' BTC , first Please deposit '. number_format((($request->max_amount * 1.0075) - $balance_btc),10) .'BTC for Publish ad')->withInput()->with('maxx', number_format($balance_btc * 0.9925,10));
                }

            } else {

                    $cr = new CryptoAddvertise();
                    $cr->user_id = Auth::id();
                    $cr->add_type = 1;
                    $cr->gateway_id = $request->gateway_id;
                    $cr->method_id = $request->crypto_id;
                    $cr->currency_id = $request->currency;
                    $cr->margin = $request->margin;
                    $cr->price = round($total_price, 2);
                    $cr->min_amount = $request->min_amount;
                    $cr->max_amount = $request->max_amount;
                    $cr->term_detail = $request->term_detail;
                    $cr->payment_detail = $request->payment_detail;
                    $cr->status = -1;
                
                if ($balance_btc > $request->max_amount * 1.005) {
                        
                        $cr->save();
                        $message = "You Trade Advertise create complete. You want to" . $request->add_type . ' ' . $request->min_amount . '-' . $request->max_amount . ' ' . $cur->name . " . You choose " . $method->name . " for transaction. Please Wait for it to be approved..";
                        send_email(Auth::user()->email, Auth::user()->name, 'Advertise Create Successful', $message);
                        send_sms(Auth::user()->phone, $message);

                } else {
                    session(['cr'=>$cr]);
             
                    return redirect()->back()->with('btc',
                            number_format((($request->max_amount * 1.005) - $balance_btc),8))->with('message1',
                            'Dear user, the maximum amount entered must be less than or equal to your wallet .You can sell '. number_format($balance_btc * 0.995 , 8) .' BTC . Otherwise If you want sell '. $request->max_amount .' BTC , first Please deposit '. number_format((($request->max_amount * 1.005) - $balance_btc),10) .'BTC for Publish ad')->withInput()->with('maxx', number_format($balance_btc * 0.995,10));
                }

            }


          

            return redirect()->route('home')->with('message',
                    'Advertise For Selling Create Successful ; Please Wait for it to be approved.');


        } else {
            return redirect()->back()->withErrors('Please Read Our Terms And Condition');
        }


    }

    public function addUpdate(Request $request, $id)
    {
        $this->validate($request, [
                'gateway_id' => 'required',
                'crypto_id' => 'required',
                'min_amount' => 'required|numeric|min:0.00000001',
                'max_amount' => 'required|numeric|min:0.00000001',
                'term_detail' => 'required',
                'margin' => 'required|numeric',
                'payment_detail' => 'required',
                'currency' => 'required',
        ]);

        $cur = Currency::find($request->currency);

        $method = Crypto::find($request->crypto_id);

        if ($request->margin == 0) {
            $after_margin = 0;
        } else {
            $after_margin = ($request->margin / 100) * $request->max_amount;
        }

        $total_price = $request->max_amount + $after_margin;

        $balance_btc = UserCryptoBalance::where('user_id', Auth::id())->where('gateway_id', 505)->first()->balance;
        
        $buy_btc = CryptoAddvertise::where('add_type', 1)->where('reject',false)->where('gateway_id',
                505)->where('user_id','=',Auth::id())->get();

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
                    $buy_btc[$key]->max_amount = $buy_btc[$key]->max_amount * 1.0075;
                } else {

                    $buy_btc[$key]->max_amount = $buy_btc[$key]->max_amount * 1.005;
                }

                $bal = UserCryptoBalance::where('user_id', $item1->user_id)->where('gateway_id',
                        505)->first()->balance;

                if ($buy_btc[$key]->max_amount > $bal) {
                   if(array_key_exists($key, (array)$buy_btc))
                    {
                        unset($buy_btc[$key]);
                    }
                }
            }
        }
        
        $mines = 0;
        
        foreach ($buy_btc as $key => $item1) {
            $mines = $mines + $item1->max_amount;
        }
        
        $balance_btc = $balance_btc - $mines;

        
        $cr = CryptoAddvertise::find($id);
        if ($cr->trusted_sell) {

            if ($balance_btc * 1.0075 > $request->max_amount) {

                CryptoAddvertise::whereId($id)->update([
                        'user_id' => Auth::id(),
                        'add_type' => 1,
                        'gateway_id' => $request->gateway_id,
                        'method_id' => $request->crypto_id,
                        'currency_id' => $request->currency,
                        'margin' => $request->margin,
                        'price' => round($total_price, 2),
                        'min_amount' => $request->min_amount,
                        'max_amount' => $request->max_amount,
                        'term_detail' => $request->term_detail,
                        'payment_detail' => $request->payment_detail,
                        'status' => -1,
                ]);


            } else {

                return redirect()->back()->with('btc',
                        (($request->max_amount * 1.0075) - $balance_btc))->with('message1',
                        'Dear user, the maximum amount entered must be less than or equal to your wallet . first Please deposit ' . (($request->max_amount * 1.005) - $balance_btc) . ' BTC for Publish ad');
            }

        } else {
            if ($balance_btc * 1.005 > $request->max_amount) {

                CryptoAddvertise::whereId($id)->update([
                        'user_id' => Auth::id(),
                        'add_type' => 1,
                        'gateway_id' => $request->gateway_id,
                        'method_id' => $request->crypto_id,
                        'currency_id' => $request->currency,
                        'margin' => $request->margin,
                        'price' => round($total_price, 2),
                        'min_amount' => $request->min_amount,
                        'max_amount' => $request->max_amount,
                        'term_detail' => $request->term_detail,
                        'payment_detail' => $request->payment_detail,
                        'status' => -1,
                ]);

            } else {

                return redirect()->back()->with('btc',
                        (($request->max_amount * 1.005) - $balance_btc))->with('message1',
                        'Dear user, the maximum amount entered must be less than or equal to your wallet . first Please deposit ' . (($request->max_amount * 1.005) - $balance_btc) . ' BTC for Publish ad');
            }

        }


        $message = "You Trade Advertise update complete. You want to" . $request->add_type . ' ' . $request->min_amount . '-' . $request->max_amount . ' ' . $cur->name . " . You choose " . $method->name . " for transaction.Please Wait for it to be approved.";

        send_email(Auth::user()->email, Auth::user()->name, 'Advertise Update Successful', $message);
        send_sms(Auth::user()->phone, $message);

        return redirect('user/advertise/history')->with('message',
                'Advertise For Selling Update Successful ; Please Wait for it to be approved.');


    }

    public function addEdit($id)
    {
        $add = CryptoAddvertise::where('user_id', Auth::id())->whereId($id)->first();

        if (isset($add)) {
            $coin = Gateway::all();
            $methods = Crypto::where('status', 1)->get();
            $currency = Currency::where('status', 1)->get();


            $lite_usd = $doge_usd = $eth_usd = 0;
            $btc_usd = json_decode(file_get_contents('https://www.blockonomics.co/api/price?currency=USD'))->price;

            return view('user_panel.sell_buy_edit', compact('add', 'coin', 'methods',
                    'currency', 'btc_usd', 'lite_usd', 'doge_usd', 'eth_usd'));
        } else {
            return redirect()->back();
        }

    }

    public function storeDealBuy(Request $request, $id)
    {
        $this->validate($request, [
                'amount' => 'required|numeric|min:0.00000001',
        ]);

        $add = CryptoAddvertise::findOrFail($id);

        $bal = UserCryptoBalance::where('user_id', Auth::id())->where('gateway_id', $add->gateway_id)->first();

        $trans_id = rand(100000, 999999);

        $usd_rate = $request->amount / $add->currency->usd_rate;

        $coin_amount = $add->price;

        if ($add->add_type == 2 && $bal->balance <= $coin_amount) {
            return redirect()->back()->withErrors('You Have Not Enough Balance To Sell.');
        }

        if ($add->add_type == 1) {

            ///////inja
            ///
            ///
//            if ($add->trusted_sell == 1) {
//                return redirect()->back()->withErrors('Not access.');
//            }
            $to_user = UserCryptoBalance::where('user_id', $add->user_id)->where('gateway_id',
                    $add->gateway_id)->first();
            $after_bal = $to_user->balance - $coin_amount;

            $to_user->balance = $after_bal;
            $to_user->save();

            $deal = AdvertiseDeal::create([
                    'addvertises_id' => $add->id,
                    'gateway_id' => $add->gateway_id,
                    'method_id' => $add->method_id,
                    'currency_id' => $add->currency_id,
                    'term_detail' => $add->term_detail,
                    'payment_detail' => $add->payment_detail,
                    'price' => $add->price,
                    'add_type' => '1',
                    'to_user_id' => $add->user_id,
                    'from_user_id' => Auth::id(),
                    'trans_id' => $trans_id,
                    'usd_amount' => 1,
                    'coin_amount' => $coin_amount,
                    'amount_to' => $request->amount,
                    'status' => 0,
            ]);

            if ($request->detail != null) {
                DealConvertion::create([
                        'deal_id' => $deal->id,
                        'type' => 1,
                        'deal_detail' => $request->detail,
                        'image' => null,
                ]);
            }

            $to_user = User::findOrFail($add->user_id);

        } else {

            $to_user = UserCryptoBalance::where('user_id', Auth::id())->where('gateway_id', $add->gateway_id)->first();
            $after_bal = $to_user->balance - $coin_amount;
            $to_user->balance = $after_bal;
            $to_user->save();

            $deal = AdvertiseDeal::create([
                    'gateway_id' => $add->gateway_id,
                    'method_id' => $add->method_id,
                    'currency_id' => $add->currency_id,
                    'term_detail' => $add->term_detail,
                    'payment_detail' => $add->payment_detail,
                    'price' => $add->price,
                    'add_type' => '2',
                    'to_user_id' => $add->user_id,
                    'from_user_id' => Auth::id(),
                    'trans_id' => $trans_id,
                    'usd_amount' => 1,
                    'coin_amount' => $coin_amount,
                    'amount_to' => $request->amount,
                    'status' => 0,
            ]);

            if ($request->detail != null) {
                DealConvertion::create([
                        'deal_id' => $deal->id,
                        'type' => 1,
                        'deal_detail' => $request->detail,
                        'image' => null,
                ]);
            }

            $to_user = User::findOrFail(Auth::id());
        }

        $message = "There's a " . $deal->add_type == 1 ? 'buying' : 'selling' . " request ." . Auth::user()->name . " wants 
        to make deal with you. " . Auth::user()->name . ' <br><br><br>  request amount is ' . $request->amount . 'BTC';


        send_email($to_user->email, $to_user->name, 'Advertise Deal', $message);
        send_sms($to_user->phone, $message);

        return redirect("user/deal/$trans_id");
    }

    public function dealView($id)
    {
        $add = AdvertiseDeal::where('trans_id', $id)->first();

        if (isset($add) && Auth::id() == $add->from_user_id) {
            $price = $add->price;

            $pr= Price::find($add->currency->name)->am;
            return view('user_panel.deal_confirm', compact('add', 'price','pr'));
        } else {
            return back();
        }


    }

    public function dealSendMessage(Request $request)
    {
        $this->validate($request, [
                'message' => 'required',
                'image' => 'image|mimes:png,jpg,jpeg',
        ]);

        $add = AdvertiseDeal::findOrFail($request->id);
        if (Auth::id() == $add->from_user_id && $add->status == 0) {
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = time() . '.jpg';
                $location = 'assets/images/attach/' . $filename;
                Image::make($image)->save($location);
                $in['image'] = $filename;
            }
            $in['deal_detail'] = $request->message;
            $in['deal_id'] = $request->id;
            $in['type'] = 1;

            $data = DealConvertion::create($in);
            return response()->json($data);
        }
        return back();
    }

    public function dealSendMessageReply(Request $request)
    {
        $this->validate($request, [
                'message' => 'required',
                'image' => 'image|mimes:png,jpg,jpeg',
        ]);

        $add = AdvertiseDeal::findOrFail($request->id);
        if (Auth::id() == $add->to_user_id && $add->status == 0) {
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = time() . '.jpg';
                $location = 'assets/images/attach/' . $filename;
                Image::make($image)->save($location);
                $in['image'] = $filename;
            }
            $in['deal_detail'] = $request->message;
            $in['deal_id'] = $request->id;
            $in['type'] = 2;

            $data = DealConvertion::create($in);
            return response()->json($data);
        }
        return back();
    }

    public function notiReply($id)
    {
        $add = AdvertiseDeal::where('trans_id', $id)->first();
        $price = $add->price;
        
        $pr= Price::find($add->currency->name)->am;

        if ($add->to_user_id == Auth::id()) {
            return view('user_panel.deal_reply', compact('add', 'price','pr'));
        } else {
            return back();
        }
    }

    public function confirmPaid(Request $request)
    {
        $this->validate($request, [
                'status' => 'required',
        ]);


        $general = GeneralSettings::first();
        $add = AdvertiseDeal::findOrFail($request->status);
        $price = $add->price;

        // $charge = ($add->amount_to * $general->trx_charge) / 100;

        $bal = $add->amount_to;

        if ($add->add_type == 1) {

            if (Auth::id() == $add->to_user_id) {

                $to_user = User::findOrFail($add->to_user_id);
                $to_user_adress = UserCryptoBalance::where('user_id', $to_user->id)
                        ->where('gateway_id', 505)->first();
                        
                $trusted_sell = CryptoAddvertise::find($add->addvertises_id)->trusted_sell;
                
                if ($to_user_adress->balance > $add->amount_to * 1.0075 && $trusted_sell) {
                    
                    $charge = ($add->amount_to * 0.75) / 100;
                    $to_user_adress->balance = $to_user_adress->balance - ($add->amount_to + $charge);
                    $to_user_adress->save();

                    $user = User::findOrFail($add->from_user_id);
                    $user_adress = UserCryptoBalance::where('user_id', $user->id)
                            ->where('gateway_id', $add->gateway_id)->first();

                    $new_balance = $user_adress->balance + $bal;
                    $user_adress->balance = $new_balance;
                    $user_adress->save();

                    Trx::create([
                            'user_id' => $user->id,
                            'amount' => $bal . ' ' . $add->gateway->currency,
                            'main_amo' => $new_balance . ' ' . $add->gateway->currency,
                            'charge' => 0,
                            'type' => '+',
                            'title' => 'BUY-' . $add->gateway->currency . 'from-' . $to_user->name,
                            'trx' => 'BUY' . $add->gateway->currency . time()
                    ]);


                    Trx::create([
                            'user_id' => $to_user->id,
                            'amount' => $bal . ' ' . $add->gateway->currency,
                            'main_amo' => $to_user_adress->balance . ' ' . $add->gateway->currency,
                            'charge' => 0,
                            'type' => '-',
                            'title' => 'SELL-' . $add->gateway->currency . 'to-' . $user->name,
                            'trx' => 'SELL' . $add->gateway->currency . time()
                    ]);

                    $in = new Income();
                    $in->user_id = Auth::id();
                    $in->value = $charge;
                    $in->cr_id = $add->id;
                    $in->save();

                    Trx::create([
                            'user_id' => $to_user->id,
                            'amount' => $charge . ' ' . $add->gateway->currency,
                            'main_amo' => number_format(Income::all()->sum('value'),
                                            10) . ' ' . $add->gateway->currency,
                            'charge' => 0,
                            'type' => '+',
                            'title' => 'Wage-From-Sell ' . $bal . ' ' . $add->gateway->currency,
                            'trx' => 'Site Income' . $add->gateway->currency . time()
                    ]);
                    
                    send_email($user->email, $user->name, 'Advertise',
                            'Your dealing by seller has completed');
                    send_sms($user->phone, 'Your dealing by seller has completed');
                    
                    
                }elseif ($to_user_adress->balance > $add->amount_to * 1.005 && !$trusted_sell) {

                    $charge = ($add->amount_to * 0.5) / 100;
                    
                    $to_user_adress->balance = $to_user_adress->balance - ($add->amount_to + $charge);
                    $to_user_adress->save();


                    $user = User::findOrFail($add->from_user_id);
                    $user_adress = UserCryptoBalance::where('user_id', $user->id)
                            ->where('gateway_id', $add->gateway_id)->first();

                    $new_balance = $user_adress->balance + $bal;
                    $user_adress->balance = $new_balance;
                    $user_adress->save();

                    Trx::create([
                            'user_id' => $user->id,
                            'amount' => $bal . ' ' . $add->gateway->currency,
                            'main_amo' => $new_balance . ' ' . $add->gateway->currency,
                            'charge' => 0,
                            'type' => '+',
                            'title' => 'BUY-' . $add->gateway->currency . 'from-' . $to_user->name,
                            'trx' => 'BUY' . $add->gateway->currency . time()
                    ]);


                    Trx::create([
                            'user_id' => $to_user->id,
                            'amount' => $bal . ' ' . $add->gateway->currency,
                            'main_amo' => $to_user_adress->balance . ' ' . $add->gateway->currency,
                            'charge' => 0,
                            'type' => '-',
                            'title' => 'SELL-' . $add->gateway->currency . 'to-' . $user->name,
                            'trx' => 'SELL' . $add->gateway->currency . time()
                    ]);

                    $in = new Income();
                    $in->user_id = Auth::id();
                    $in->value = $charge;
                    $in->cr_id = $add->id;
                    $in->save();

                    Trx::create([
                            'user_id' => $to_user->id,
                            'amount' => $charge . ' ' . $add->gateway->currency,
                            'main_amo' => number_format(Income::all()->sum('value'),
                                            10) . ' ' . $add->gateway->currency,
                            'charge' => 0,
                            'type' => '+',
                            'title' => 'Wage-From-Sell ' . $bal . ' ' . $add->gateway->currency,
                            'trx' => 'Site Income' . $add->gateway->currency . time()
                    ]);
                    
                    send_email($user->email, $user->name, 'Advertise',
                            'Your dealing by seller has completed');
                    send_sms($user->phone, 'Your dealing by seller has completed');
                    

                } else {
                    return redirect()->back()->with('message', 'Not Permission your balance is low');
                }
            }

        } else {
            return redirect()->back()->with('message', 'Not Permission');
        }

        $add->status = 1;
        $add->save();

        return redirect()->back()->with('message', 'Paid Confirm Complete');
    }

    public function confirmCencel(Request $request)
    {
        $this->validate($request, [
                'status' => 'required',
                'reason_cancel' => 'required',
        ]);

        $add = AdvertiseDeal::findOrFail($request->status);

        if($add->status == 9 && Auth::user()->id == $add->from_user_id)
        {
            return redirect()->back()->with('message', 'Not Permissoin');
        }
        
        $add->status = 2;
        if ($add->add_type == 1) {

            switch ($request->reason_cancel) {
                case 1:
                    $add->cancell_reason = "I did not agree with the buyer";
                    break;
                case 2:
                    $add->cancell_reason = "I stopped selling";
                    break;
                case 3:
                    $add->cancell_reason = "I am not currently trading";
                    break;
                case 4:
                    $add->cancell_reason = "I am not currently trading";
                    break;
                default:
                    $add->cancell_reason = null;
                    break;
                    
            }
            $add->save();

            $to_user = User::findOrFail($add->to_user_id);
            $to_user_adress = UserCryptoBalance::where('user_id', $to_user->id)
                    ->where('gateway_id', $add->gateway_id)->first();
            $main_bal = $to_user_adress->balance + $add->coin_amount;
            $to_user_adress->balance = $main_bal;
            $to_user_adress->save();


            Trx::create([
                    'user_id' => $to_user->id,
                    'amount' => $add->amount_to . ' ' . $add->gateway->currency,
                    'main_amo' => $main_bal . ' ' . $add->gateway->currency,
                    'charge' => 0,
                    'type' => '+',
                    'title' => 'SELL-' . $add->gateway->currency . 'Cancel',
                    'trx' => 'SELL' . $add->gateway->currency . time()
            ]);


        } else {
            $to_user = User::findOrFail($add->from_user_id);
            $to_user_adress = UserCryptoBalance::where('user_id', $to_user->id)
                    ->where('gateway_id', $add->gateway_id)->first();
            $main_bal = $to_user_adress->balance + $add->coin_amount;
            $to_user_adress->balance = $main_bal;
            $to_user_adress->save();


            Trx::create([
                    'user_id' => $to_user->id,
                    'amount' => $add->amount_to . ' ' . $add->gateway->currency,
                    'main_amo' => $main_bal . ' ' . $add->gateway->currency,
                    'charge' => 0,
                    'type' => '+',
                    'title' => 'SELL-' . $add->gateway->currency . 'Cancel',
                    'trx' => 'SELL' . $add->gateway->currency . time()
            ]);
        }
        $add->save();

        send_email(Auth::user()->email, Auth::user()->name, 'Advertise',
                'Your purchase request has been canceled by the seller');
        send_sms(Auth::user()->phone, 'Your purchase request has been canceled by the seller');

        return redirect()->back()->with('message', 'Cancel Complete');
    }


    public function request_a_payment(Request $request)
    {

        if ($request->method() == "GET") {

            $user_balance = UserCryptoBalance::where('user_id', Auth::id())
                    ->where('gateway_id', 505)->first()->balance;

            $rp = RequestPayment::where('state', 0)->where('user_id', Auth::id())->first();
            if (!empty($rp)) {
                return back()->with('error',
                        'You have a half-way request and you cannot make another request until its status is determined');
            }
            $user_balance = UserCryptoBalance::where('user_id', Auth::id())
                    ->where('gateway_id', 505)->first()->balance;
            $title = "Open Request a Payment form local wallet";
            return view('user_panel.request_a_payment', compact('title', 'user_balance'));

        }
        if ($request->method() == "POST") {

            $this->validate($request, [
                    'amount' => 'required|numeric',
                    'wallet' => 'required',
            ]);

            $user_balance = UserCryptoBalance::where('user_id', Auth::id())
                    ->where('gateway_id', 505)->first()->balance;
            if ($user_balance >= $request->amount) {
                $rp = new RequestPayment();
                $rp->user_id = Auth::id();
                $rp->amount = $request->amount;
                $rp->wallet = $request->wallet;
                $rp->save();
                return redirect()->route('user.request_a_payment_list');
            }
        }

        return back();

    }

    public function request_a_payment_list(Request $request)
    {
        if ($request->method() == "GET") {
            $rp = RequestPayment::where('user_id', Auth::id())->get();
            $title = 'Request Payment List';
            return view('user_panel.request_a_payment_ist', compact('rp', 'title'));
        }
    }

    public function complaint(Request $request, $id = null)
    {
        if ($id != null) {
            if ($request->method() == "GET") {
                $title = "Open Complaint for Advertisements";
                $complaints = Complaints::where('addvertise_id', $id)->get();

                if (!empty($complaints)) {
                    return view('user_panel.complaint', compact('complaints', 'title'));
                }
            }
            if ($request->method() == "POST") {

                $addvertise = AdvertiseDeal::find($id);
                if (!empty($addvertise) && $addvertise->from_user_id == Auth::id()) {

                    $this->validate($request, [
                            'message' => 'required',
                            'image' => 'image|mimes:png,jpg,jpeg',
                    ]);
                    $in['img'] = null;
                    if ($request->hasFile('image')) {
                        $image = $request->file('image');
                        $filename = time() . '.jpg';
                        $location = 'assets/images/attach/' . $filename;
                        Image::make($image)->save($location);
                        $in['img'] = $filename;
                    }
                    $com = new Complaints();
                    $com->from_ = Auth::id();
                    $com->complaint_user_id = $addvertise->to_user_id;
                    $com->addvertise_id = $addvertise->id;
                    $com->message = $request->message;
                    $com->img = $in['img'];
                    $com->save();
                    
                    $addvertise->comp_state = true;
                    $addvertise->save();
                    
                    $userr = User::find($addvertise->to_user_id);
                    
                    $message = 'Dear user, you have complained';
                    send_email($userr->email, $userr->name, 'complained', $message);
        
                    $sms = 'Dear user, you have complained';
                    send_sms($userr->phone, $sms);
                }
            }

        }
        return redirect()->to('user/open/trade');
    }

    public function openTrade()
    {
        $title = "Open Trade & Advertisements";
        $addvertise = AdvertiseDeal::where('from_user_id', Auth::id())->where('status', 0)->paginate(10);
        return view('user_panel.trade_history', compact('addvertise', 'title'));
    }

    public function closeTrade()
    {
        $title = "Close Trade ";
        $addvertise = AdvertiseDeal::where('from_user_id', Auth::id())->where('status', 2)->paginate(10);
        return view('user_panel.trade_history', compact('addvertise', 'title'));
    }


    public function trade_rate(Request $request, $id)
    {
        $title = "Set Rate";
        if ($request->method() == "GET") {
            return view('user_panel.rate', compact('title'));
        } elseif ($request->method() == "POST") {
            if ($request->rating <= 5 && $request->rating > 0) {
                $ad = AdvertiseDeal::find($id);
                if (Auth::user()->id == $ad->to_user_id && $ad->to_user_send == false) {

                    $ad->to_user_send = true;
                    $ad->save();

                    $u = User::find($ad->to_user_id);
                    $u->star = ((($u->star * $u->star_unit) + $request->rating) / ($u->star_unit + 1));
                    $u->star_unit = $u->star_unit + 1;
                    $u->save();
                    return redirect()->route('complete.trade')->with('message', 'Your Rate Is Set Successfully');

                } elseif (Auth::user()->id == $ad->from_user_id && $ad->from_user_send == false) {

                    $ad->from_user_send = true;
                    $ad->save();

                    $u = User::find($ad->from_user_id);
                    $u->star = (($u->star * $u->star_unit) + $request->rating / $u->star_unit + 1);
                    $u->star_unit = $u->star_unit + 1;
                    $u->save();
                    $u->save();
                    return redirect()->route('complete.trade')->with('message', 'Your Rate Is Set Successfully');
                }
            }
        }
        return redirect()->route('complete.trade');
    }


    public function completeTrade()
    {
        $title = "Complete Trade ";
        $addvertise = AdvertiseDeal::where('to_user_id', Auth::id())->orWhere('from_user_id',
                Auth::id())->where('status', 1)->paginate(10);
        return view('user_panel.trade_history', compact('addvertise', 'title'));
    }

    public function cancelTrade()
    {
        $title = "Canceled Trade";
        $addvertise = AdvertiseDeal::where('to_user_id', Auth::id())->where('status', 2)->paginate(10);
        return view('user_panel.trade_history', compact('addvertise', 'title'));
    }

    public function cancelTradeReverce(Request $request)
    {
        $this->validate($request, [
                'status' => 'required',
        ]);

        $add = AdvertiseDeal::findOrFail($request->status);

        $add->status = 2;
        if ($add->add_type == 1) {
            $to_user = User::findOrFail($add->to_user_id);
            $to_user_adress = UserCryptoBalance::where('user_id', $to_user->id)
                    ->where('gateway_id', $add->gateway_id)->first();
            $main_bal = $to_user_adress->balance + $add->coin_amount;
            $to_user_adress->balance = $main_bal;
            $to_user_adress->save();


            Trx::create([
                    'user_id' => $to_user->id,
                    'amount' => $add->amount_to . ' ' . $add->gateway->currency,
                    'main_amo' => $main_bal . ' ' . $add->gateway->currency,
                    'charge' => 0,
                    'type' => '+',
                    'title' => 'CANCEL-' . $add->gateway->currency . 'Cancel',
                    'trx' => 'CANCEL' . $add->gateway->currency . time()
            ]);


        } else {
            $to_user = User::findOrFail($add->from_user_id);
            $to_user_adress = UserCryptoBalance::where('user_id', $to_user->id)
                    ->where('gateway_id', $add->gateway_id)->first();
            $main_bal = $to_user_adress->balance + $add->coin_amount;
            $to_user_adress->balance = $main_bal;
            $to_user_adress->save();


            Trx::create([
                    'user_id' => $to_user->id,
                    'amount' => $add->amount_to . ' ' . $add->gateway->currency,
                    'main_amo' => $main_bal . ' ' . $add->gateway->currency,
                    'charge' => 0,
                    'type' => '+',
                    'title' => 'CANCEL' . $add->gateway->currency . 'Cancel',
                    'trx' => 'CANCEL' . $add->gateway->currency . time()
            ]);
        }
        $add->save();

        return redirect()->back()->with('message', 'Cancel Complete');
    }

    public function paidTradeReverce(Request $request)
    {
        $this->validate($request, [
                'status' => 'required',
        ]);

        $add = AdvertiseDeal::findOrFail($request->status);
        
        if(Auth::user()->id == $add->from_user_id)
        { 
            $user = User::find($add->to_user_id);
            $add->status = 9;
            $add->save();
            
            $message = "Dear customer Your dealing approved by buyer, please complete the processes as soon as possible.";

            send_email($user->email, $user->name, 'dealing approved by buyer', $message);
            send_sms($user->phone, $message);
            
        }
        
        return redirect()->back()->with('message', 'Paid Wait For Seller Approval');
    }

    public function depHistory()
    {

        $data['gates'] = Gateway::whereStatus(1)->get();
        $data['page_title'] = "All Deposit List";
        $deposits = Deposit::where('user_id', Auth::id())->get();
        $title = "Deposit History";

        return view('user_panel.deposit_history', $data, ['deposit' => $deposits, 'title' => $title]);

    }

    public function transHistory()
    {
        $title = "Transaction History";
        $trans = Trx::where('user_id', Auth::id())->latest()->paginate(5);
        return view('user_panel.trans_history', compact('title', 'trans'));
    }

    public function twoFactorIndex()
    {
        $gnl = GeneralSettings::first();

        $google2fa = new Google2FA();
        $prevcode = Auth::user()->secretcode;
        $secret = $google2fa->generateSecretKey();

        $google2fa->setAllowInsecureCallToGoogleApis(true);

        $qrCodeUrl = $google2fa->getQRCodeGoogleUrl(
                $gnl->sitename,
                Auth::user()->email,
                $secret
        );

        $prevqr = $google2fa->getQRCodeGoogleUrl($gnl->sitename,
                Auth::user()->email,
                $prevcode);

        return view('user_panel.two_factor', compact('secret', 'qrCodeUrl', 'prevcode', 'prevqr'));
    }

    public function disable2fa(Request $request)
    {
        $this->validate($request, [
                'code' => 'required',
        ]);

        $user = User::find(Auth::id());
        $google2fa = app('pragmarx.google2fa');
        $secret = $request->input('code');
        $valid = $google2fa->verifyKey($user->secretcode, $secret);


        if ($valid) {
            $user = User::find(Auth::id());
            $user['tauth'] = 0;
            $user['tfver'] = 1;
            $user['secretcode'] = '0';
            $user->save();

            $message = 'Google Two Factor Authentication Disabled Successfully';
            send_email($user['email'], $user['name'], 'Google 2FA', $message);


            $sms = 'Google Two Factor Authentication Disabled Successfully';
            send_sms($user->phone, $sms);

            return back()->with('message', 'Two Factor Authenticator Disable Successfully');
        } else {
            return back()->with('alert', 'Wrong Verification Code');
        }

    }

    public function create2fa(Request $request)
    {
        $user = User::find(Auth::id());
        $this->validate($request, [
                'key' => 'required',
                'code' => 'required',
        ]);


        $google2fa = app('pragmarx.google2fa');
        $secret = $request->input('code');
        $valid = $google2fa->verifyKey($request->key, $secret);

        if ($valid) {
            $user['secretcode'] = $request->key;
            $user['tauth'] = 1;
            $user['tfver'] = 1;
            $user->save();

            $message = 'Google Two Factor Authentication Enabled Successfully';
            send_email($user['email'], $user['name'], 'Google 2FA', $message);


            $sms = 'Google Two Factor Authentication Enabled Successfully';
            send_sms($user->phone, $sms);

            return back()->with('message', 'Google Authenticator Enabeled Successfully');
        } else {
            return back()->with('alert', 'Wrong Verification Code');
        }

    }

}
