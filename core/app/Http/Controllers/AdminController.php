<?php

namespace App\Http\Controllers;

use App\AdvertiseDeal;
use App\Complaints;
use App\Crypto;
use App\CryptoAddvertise;
use App\Currency;
use App\Deposit;
use App\Gateway;
use App\GeneralSettings;
use App\RequestPayment;
use App\Ticket;
use App\Trx;
use App\User;
use App\Income;
use App\UserCryptoBalance;
use App\UserLogin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{

    public function __construct()
    {
        $Gset = GeneralSettings::first();
        $this->sitename = $Gset->sitename;
    }

    public function dashboard()
    {
        $data['page_title'] = 'DashBoard';
        $data['Gset'] = GeneralSettings::first();
        $data['user'] = User::count();
        $data['method'] = Crypto::where('status', 1)->count();
        $data['currency'] = Currency::where('status', 1)->count();
        $data['user'] = User::count();
        $data['user_active'] = User::where('status', 1)->count();
        $data['email_active'] = User::where('email_verify', 0)->count();
        $data['phone_active'] = User::where('phone_verify', 0)->count();
        $data['ticket'] = Ticket::where('status', 1)->orWhere('status', 3)->count();
        $data['active_today'] = UserLogin::whereDate('created_at', Carbon::today())->count();

        $data['new_users'] = User::whereDate('created_at', Carbon::today())->count();
        $data['new_auth'] = User::where('auth_flag', true)->count();


        $now = Carbon::today()->addDays(7);
        $play = Trx::whereYear('created_at', '<=', $now->format('Y'))->get()->groupBy(function ($d) {
            return $d->created_at->format('d');
        });

        $data['monthly_play'] = [];

        $js = '';

        foreach ($play as $key => $value) {
            $js .= collect([
                            'y' => $key,
                            'a' => $value->count()
                    ])->toJson() . ',';

        }

        $data['monthly_play'] = '[' . $js . ']';

        return view('admin.dashboard', $data);
    }


    public function complaints_free(Request $request)
    {
          $addvertise = AdvertiseDeal::find($id);
                if (!empty($addvertise)) {
                    $addvertise->comp_state = 0;
                }
                return back();
    }
    
  
    public function income(Request $request)
    {
       

        if($request->method() == "GET") {
            
            $from = Carbon::today()->subDays(30);
            $to = Carbon::today()->addDays(1);
            
            $incomes = Income::whereBetween('date', [$from, $to])->get()->groupBy(function($item) {
            return Carbon::parse($item->date)->format('Y-m-d');
            });
    
            $data['monthly_play'] = [];
    
            $js = '';
            
            foreach ($incomes as $key => $value) {
                $js .= collect([
                                'date' => $key,
                                'value' =>  sprintf("%.8f", floor($value->sum('value') * pow(10, 8)) / pow(10, 8))
                        ])->toJson() . ',';
    
            }

            $data['monthly_play'] = '[' . $js . ']';
            $page_title = "BirCoin Income";
            
              $trans = Trx::orderBy('created_at', 'asc')->whereBetween('created_at', [$from, $to])->where('title','like','Wage%')->paginate(10);
            
            return view('admin.income', compact('trans', 'page_title'),$data);
            
        }elseif($request->method() == "POST"){
            
            $this->validate($request,
            [
                'from' => 'required|date',
                'to' => 'required|date',
            ]);
            
           
            $from = Carbon::parse($request->from);
            $to = Carbon::parse($request->to)->addDays(1);;

         
            if($from > $to)
            {
                return back();
            }
            
            $incomes = Income::whereBetween('date', [$from, $to])->get()->groupBy(function($item) {
            return Carbon::parse($item->date)->format('Y-m-d');
            });
     
            $data['monthly_play'] = [];
    
            $js = '';
            
            foreach ($incomes as $key => $value) {
                $js .= collect([
                                'date' => $key,
                                'value' =>  sprintf("%.8f", floor($value->sum('value') * pow(10, 8)) / pow(10, 8))
                        ])->toJson() . ',';
    
            }

            $data['monthly_play'] = '[' . $js . ']';
            $page_title = "BirCoin Income";
            
       

            $trans = Trx::orderBy('id', 'desc')->whereBetween('created_at', [$from, $to])->where('title','like','Wage%')->paginate(10);
            
            return view('admin.income', compact('trans', 'page_title','from','to'),$data);
        }
        
    }
    
    
    
    public function deposits(Request $request, $id = null)
    {
        if ($id != null) {
            if ($request->method() == "GET") {

                $data = Deposit::find($id);

                if (!empty($data) && $data->status != 0) {
                    $user = User::find($data->user_id);
                    $address = UserCryptoBalance::where('user_id', $data->user_id)
                            ->where('gateway_id', 505)->first();

                    $new_balance = $address->balance + $data->amount;
                    
                    $address->balance = $new_balance;
                    $saved=$address->save();

                    if($saved){
                          Trx::create([
                            'user_id' => $data->user_id,
                            'amount' => $data->amount,
                            'main_amo' => $new_balance,
                            'charge' => 0,
                            'type' => '+',
                            'title' => 'Deposit Via' . $data->gateway->name,
                            'trx' => $data->trx
                    ]);

                    $message = $data->amount . ' ' . $data->gateway->currency . ' Deposited Successfully Via ' . $data->gateway->name.'in Bircoin wallet.';

                    send_email($user->email, $user->name, 'Deposited Approved Successful', $message);
                    send_sms($user->phone, $message);
                    
                    $data->status = 0;
                    $data->save();
                    }
                  
                    return redirect()->back();
                }
            }
        } else {

            if ($request->method() == "GET") {
                $deposit = Deposit::orderBy('created_at', 'DESC')->paginate(10);
                Deposit::where('view','=', 0)->update(['view' => 1]);
                $data['page_title'] = "All Deposit Control";
                return view('admin.deposits.des_list', $data, ['deposit' => $deposit]);
            }
        }
        return redirect()->back();
    }

    public function deposits_delete(Request $request, $id = null)
    {
        $data = Deposit::find($id);

        if (!empty($data) && $data->status != 0) {
            $data->delete();
        }
        
        return back();
    }
    public function request_trusted_sell(Request $request, $id = null)
    {
        if ($id == null) {
            if ($request->method() == "GET") {
                $data['page_title'] = "All Advertising Trusted Sell";

            }

        } elseif (!empty(CryptoAddvertise::find($id))) {

            CryptoAddvertise::where('view', 0)->where('trusted_sell', true)->update(['view' => 1]);
            if ($request->method() == "GET") {
                $add = CryptoAddvertise::find($id);

                if (isset($add)) {
                    $coin = Gateway::all();
                    $methods = Crypto::where('status', 1)->get();
                    $currency = Currency::where('status', 1)->get();

                    $lite_usd = $doge_usd = $eth_usd = $btc_usd = 0;
                    $data['page_title'] = "Advertising Detalis";
                    return view('admin.ads.ads_detalis', $data, compact('add', 'coin', 'methods',
                            'currency', 'btc_usd', 'lite_usd', 'doge_usd', 'eth_usd'));
                }
            }
        }
        return redirect()->back();
    }

    public function advertising(Request $request, $id = null)
    {
        if ($id == null) {
            if ($request->method() == "GET") {

                $data['page_title'] = "All Advertising Control";
                $all_ads = CryptoAddvertise::orderBy('created_at', 'DESC')->paginate(10);

                CryptoAddvertise::where('view', 0)->update(['view' => 1]);
                return view('admin.ads.ads', $data, ['ads' => $all_ads]);

            }

        } elseif (!empty(CryptoAddvertise::find($id))) {

            if ($request->method() == "GET") {
                $add = CryptoAddvertise::find($id);

                if (isset($add)) {
                    $coin = Gateway::all();
                    $methods = Crypto::where('status', 1)->get();
                    $currency = Currency::where('status', 1)->get();

                    $lite_usd = $doge_usd = $eth_usd = $btc_usd = 0;
                    $data['page_title'] = "Advertising Detalis";
                    return view('admin.ads.ads_detalis', $data, compact('add', 'coin', 'methods',
                            'currency', 'btc_usd', 'lite_usd', 'doge_usd', 'eth_usd'));
                }
            }
        }
        return redirect()->back();

    }

    public function withdrawal_request(Request $request, $id = null)
    {
        if ($id != null) {

        } else {
            $rp = RequestPayment::all();
            RequestPayment::where('view', 0)->update(['view' => 1]);
            $data['page_title'] = 'All withdrawal Request';
            return view('admin.payment_requst.payment_request', $data, compact('rp','trx'));
        }
        return redirect()->back();
    }
    
    public function withdrawal_request_trx($id)
    {
        $trans = Trx::where('user_id' , $id)->paginate(10);
        $page_title = "Transaction  User";
        return view('admin.trans_log', compact('trans', 'page_title'));
    }
    
    
    public function sendemail(Request $request)
    {

        $this->validate($request,
            [
                'emailto' => 'required|email',
                'reciver' => 'required',
                'subject' => 'required',
                'emailMessage' => 'required'
            ]);
        $to = $request->emailto;
        $name = $request->reciver;
        $subject = $request->subject;
        $message = $request->emailMessage;
        
        $userr = User::where('email',$to)->first();
     
        send_email($to, $name, $subject, $message);
        send_sms($userr->phone, $message);
        
        $notification = array('message' => 'Mail Sent Successfuly!', 'alert-type' => 'success');
        return back()->with($notification);
    }
    
    public function withdrawal_confirm($id = null)
    {
        if ($id != null) {
            if (!empty(RequestPayment::find($id))) {
                $ads = RequestPayment::find($id);

                $btc = UserCryptoBalance::where('user_id', $ads->user_id)
                        ->where('gateway_id', 505)->first();

                if ($ads->amount <= $btc->balance && $ads->state != 2) {

                    $ads->state = 1;
                    $ads->save();

                    $btc->balance = $btc->balance - $ads->amount;
                    $new_balance = $btc->balance - $ads->amount;
                    $btc->save();
                    
                    
                    Trx::create([
                            'user_id' => $ads->user_id,
                            'amount' => $ads->amount,
                            'main_amo' => $new_balance,
                            'charge' => 0,
                            'type' => '-',
                            'title' => 'Withdrawal Requset',
                            'trx' => 'Withdrawal Requset'
                    ]);

                    $user = User::find($ads->user_id);
                    $message = "You Withdrawal Request is Confirmed";
                    send_email($user->email, $user->name, 'Withdrawal Approved Successful', $message);
                    send_sms($user->phone, $message);
                }
            }
        }
        return redirect()->back();
    }


    public function complaints(Request $request, $id = null)
    {
        if ($id != null) {
            if ($request->method() == "GET") {

                $complaints = Complaints::where('addvertise_id', $id)->get();

                Complaints::where([['view', 0], ['addvertise_id', $id]])->update(['view' => 1]);

                $data['page_title'] = 'Complaint';

                if (!is_null($complaints)) {
                    return view('admin.comp.comp', $data, compact('complaints'));
                }
            }
            if ($request->method() == "POST") {

                $addvertise = AdvertiseDeal::find($id);
                if (!empty($addvertise)) {

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
                    $com->from_ = 0;
                    $com->complaint_user_id = $addvertise->to_user_id;
                    $com->addvertise_id = $addvertise->id;
                    $com->message = $request->message;
                    $com->img = $in['img'];
                    $com->save();
                    return back();
                }
            }
        } else {

            if ($request->method() == "GET") {
                $data['page_title'] = 'All Complaints';
                $comps = Complaints::all()->groupBy('addvertise_id');
                return view('admin.comp.comp_list', $data, compact('comps'));
            }
        }
        return redirect()->to('admin/dashboard');
    }
    
    public function advertising_reject(Request $request,$id = null)
    {
        if ($id != null) {
            if (!empty(CryptoAddvertise::find($id))) {
                $ads = CryptoAddvertise::find($id);
                if(!$ads->reject && $ads->status == -1)
                {
                    $ads->reject = 1;
                    $ads->save();
                    
                    $user = User::find($ads->user_id);
                    
                    $message = 'Your Advertise rejected';
                    if(!empty($request->msgg))
                    {
                        $message = $request->msgg;
                    }
                    
                    send_email($user->email, $user->name, 'Advertise Rejected', $message);
                    send_sms($user->phone, $message);
                    return redirect()->back()->with('message','Reject is successfuly');
                }
            }
        }
        return redirect()->back();
    }
    
    public function advertising_confirm($id = null)
    {
        if ($id != null) {
            if (!empty(CryptoAddvertise::find($id))) {
                $ads = CryptoAddvertise::find($id);
                $balance_btc = UserCryptoBalance::where('user_id', $ads->user_id)->where('gateway_id', 505)->first()->balance;
                
                if($ads->reject || $ads->status == 0)
                {
                    return redirect()->back()->withErrors('Dont Permisoin');
                }
                if($ads->trusted_sell==1)
                {
                    if($balance_btc > $ads->max_amount * 1.0075)
                    {
                        $ads->status = 0;
                        $ads->save();
                        $cur = Currency::find($ads->currency_id);
                        $method = Crypto::find($ads->method_id);
                        $user = User::find($ads->user_id);
                        
                        $message = "Your trade advertise approved. You can sell the below amount"
                        . 'Min: '.
                        $request->min_amount 
                        . 'BTC _ Max: '.
                        $request->max_amount 
                        . "BTC .You choose " .
                        $method->name
                        .' BTC .You choose for transaction.';
                        
                        send_email($user->email, $user->name, 'Advertise Approved Successful', $message);
                        send_sms($user->phone, $message);
                    }
                    else
                    {return redirect()->back()->withErrors('User Balance is low');}
                    
                }
                else{
                  
                        if($balance_btc > $ads->max_amount * 1.005)
                        {
                            $ads->status = 0;
                            $ads->save();
                            $cur = Currency::find($ads->currency_id);
                            $method = Crypto::find($ads->method_id);
                            $user = User::find($ads->user_id);
                            
                            $message = "You Trade Advertise Accept complete. You want to" . $ads->add_type . ' ' . $ads->min_amount . '-' . $ads->max_amount . ' ' . $cur->name . " . You choose " . $method->name . " for transaction. Your ad is online now";
                            send_email($user->email, $user->name, 'Advertise Approved Successful', $message);
                            send_sms($user->phone, $message);
                        }
                        else
                        {return redirect()->back()->withErrors('User Balance is low');}
                }
               
            }
        }
        return redirect()->back();
    }


    public function userAuth(Request $request, $id = null)
    {
        if ($request->method() == "POST" && !is_null($id) && !empty(User::find($id))) {

            $user = User::find($id);

            if ($request->passport_image_state == 1) {
                $user->passport_image_state = $request->passport_image_state;
            } else {
                $user->passport_image_state = 0;
                $user->passport_image = null;
                file_exists($user->passport_image) ? unlink($user->passport_image) : null;
            }

            if ($request->selfi_request_state == 1) {
                $user->selfi_request_state = $request->selfi_request_state;
            } else {
                $user->selfi_request_state = 0;
                $user->selfi_request = null;
                file_exists($user->selfi_request) ? unlink($user->selfi_request) : null;
            }

            if ($request->selfie_image_state == 1) {
                $user->selfie_image_state = $request->selfie_image_state;
            } else {
                $user->selfie_image_state = 0;
                $user->selfie_image = null;
                file_exists($user->selfie_image) ? unlink($user->selfie_image) : null;
            }

            if ($request->custom_image_state == 1) {
                $user->custom_image_state = $request->custom_image_state;
            } else {
                $user->custom_image_state = 0;
                $user->custom_image = null;
                file_exists($user->custom_image) ? unlink($user->custom_image) : null;
            }

            $user->expert_message = $request->expert_message;

            $message = $request->expert_message;
            if ($message == "") {
                $message = "Expert Message Is Empty";
            }
            send_email($user->email, $user->name, 'Expert Message', $message);
            send_sms($user->phone, $message);

            $user->save();
        }
        return redirect()->back();
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        session()->flash('message', 'Just Logged Out!');
        return redirect('/');
    }


}
