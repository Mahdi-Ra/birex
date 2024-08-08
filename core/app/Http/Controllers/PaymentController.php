<?php

namespace App\Http\Controllers;

use App\Deposit;
use App\Gateway;
use App\Trx;
use App\User;
use App\UserCryptoBalance;
use Auth;
use Illuminate\Http\Request;


class PaymentController extends Controller
{

    public function userDataUpdate($data, $txid)
    {
        $data['trx'] = $txid;
        
        if(session()->has('cr'))
        {
            $cr = session()->get('cr');
            $cr->deposite_id = $data->id;
            $cr->save();
            
            $data['ad'] = "Yes"; 
            
            $message = "You Trade Advertise create complete. Please Wait for it to be approved..";
            send_email(User::find($data->user_id)->email, User::find($data->user_id)->name, 'Advertise Create Successful', $message);
            send_sms(User::find($data->user_id)->phone, $message);
        }
         
        $data->update();
        
        $user = User::findOrFail($data->user_id);
        
        $message = "user ('.$user->name.') has deposited '.$data->amount.' bit please first validate this deposite then confirm it";
        send_email('hamed.golbahar1@gmail.com','bircoin', 'Deposite', $message);
        
        
        $txt = $data->amount . ' ' . $data->gateway->currency . ' Deposited Pending Via ' . $data->gateway->name;
        notify($user, ',Your deposit is Pending ', $txt);
    }

//    public function depositConfirm(Request $request)
//    {
//        $this->validate($request, [
//                'amount' => 'required|numeric|min:0',
//                'gateway' => 'required',
//        ]);
//
//        $gate = Gateway::findOrFail($request->gateway);
//
////        $all = file_get_contents("https://api.coinmarketcap.com/v2/ticker/");
////        $ticker = json_decode($all, true);
////
////        $btc_usd = $ticker['data'][1]['quotes']['USD']['price'];
////        $lite_usd = $ticker['data'][2]['quotes']['USD']['price'];
////        $doge_usd = $ticker['data'][74]['quotes']['USD']['price'];
////        $eth_usd = $ticker['data'][1027]['quotes']['USD']['price'];
//
//        $btc_usd = $lite_usd = $doge_usd = $eth_usd = 500;
//
//        $de['user_id'] = Auth::id();
//        $de['gateway_id'] = $gate->id;
//        $de['amount'] = floatval($request->amount);
//        $de['charge'] = 0;
//        $de['usd_amo'] = null;
//        $de['btc_amo'] = 0;
//        $de['status'] = 0;
//        $de['trx'] = 'DP-' . rand();
//        $data = Deposit::create($de);
//
//
//        if (is_null($data)) {
//            return redirect()->route('deposit')->with('alert', 'Invalid Deposit Request');
//        }
//        if ($data->status != 0) {
//            return redirect()->route('deposit')->with('alert', 'Invalid Deposit Request');
//        }
//
//
//        if ($data->gateway_id == 505) {
//
//            $method = Gateway::find(505);
//
//            if ($data->btc_amo == 0 || $data->btc_wallet == "") {
//
//                $cps = new CoinPaymentHosted();
//                $cps->Setup($method->val2, $method->val1);
//                $callbackUrl = route('ipn.coinPay.btc');
//
//                $req = array(
//                        'amount' => $btc_usd,
//                        'currency1' => 'USD',
//                        'currency2' => 'BTC',
//                        'custom' => $data->trx,
//                        'ipn_url' => $callbackUrl,
//                );
//
//
//                $result = $cps->CreateTransaction($req);
//
//                if ($result['error'] == 'ok') {
//
//                    $bcoin = $request->amount;
//                    $sendadd = $result['result']['address'];
//
//                    $data['btc_amo'] = $bcoin;
//                    $data['btc_wallet'] = $sendadd;
//                    $data->update();
//
//                } else {
//                    return back()->with('alert', 'Failed to Process');
//                }
//
//            }
//            $wallet = $data['btc_wallet'];
//            $bcoin = $data['btc_amo'];
//            $page_title = $method->name;
//
//
//            $qrurl = "<img src=\"https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=bitcoin:$wallet&choe=UTF-8\" title='' style='width:300px;' />";
//            return view('user.payment.coinpaybtc', compact('bcoin', 'wallet', 'qrurl', 'page_title'));
//
//        } elseif ($data->gateway_id == 506) {
//
//            $method = Gateway::find(506);
//            if ($data->btc_amo == 0 || $data->btc_wallet == "") {
//
//                $cps = new CoinPaymentHosted();
//                $cps->Setup($method->val2, $method->val1);
//                $callbackUrl = route('ipn.coinPay.eth');
//
//                $req = array(
//                        'amount' => $eth_usd,
//                        'currency1' => 'USD',
//                        'currency2' => 'ETH',
//                        'custom' => $data->trx,
//                        'ipn_url' => $callbackUrl,
//                );
//
//
//                $result = $cps->CreateTransaction($req);
//
//                if ($result['error'] == 'ok') {
//                    $bcoin = $request->amount;
//                    $sendadd = $result['result']['address'];
//
//                    $data['btc_amo'] = $bcoin;
//                    $data['btc_wallet'] = $sendadd;
//                    $data->update();
//
//                } else {
//                    return back()->with('alert', 'Failed to Process');
//                }
//
//            }
//
//            $wallet = $data['btc_wallet'];
//            $bcoin = $data['btc_amo'];
//            $page_title = $method->name;
//
//
//            $qrurl = "<img src=\"https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=$wallet&choe=UTF-8\" title='' style='width:300px;' />";
//            return view('user.payment.coinpayeth', compact('bcoin', 'wallet', 'qrurl', 'page_title'));
//
//        } elseif ($data->gateway_id == 509) {
//
//            $method = Gateway::find(509);
//            if ($data->btc_amo == 0 || $data->btc_wallet == "") {
//
//                $cps = new CoinPaymentHosted();
//                $cps->Setup($method->val2, $method->val1);
//                $callbackUrl = route('ipn.coinPay.doge');
//
//                $req = array(
//                        'amount' => $doge_usd,
//                        'currency1' => 'USD',
//                        'currency2' => 'DOGE',
//                        'custom' => $data->trx,
//                        'ipn_url' => $callbackUrl,
//                );
//
//
//                $result = $cps->CreateTransaction($req);
//
//                if ($result['error'] == 'ok') {
//                    $bcoin = $request->amount;
//                    $sendadd = $result['result']['address'];
//
//                    $data['btc_amo'] = $bcoin;
//                    $data['btc_wallet'] = $sendadd;
//                    $data->update();
//
//                } else {
//                    return back()->with('alert', 'Failed to Process');
//                }
//
//            }
//
//            $wallet = $data['btc_wallet'];
//            $bcoin = $data['btc_amo'];
//            $page_title = $method->name;
//
//
//            $qrurl = "<img src=\"https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=$wallet&choe=UTF-8\" title='' style='width:300px;' />";
//            return view('user.payment.coinpaydoge', compact('bcoin', 'wallet', 'qrurl', 'page_title'));
//
//        } elseif ($data->gateway_id == 510) {
//
//            $method = Gateway::find(510);
//            if ($data->btc_amo == 0 || $data->btc_wallet == "") {
//
//                $cps = new CoinPaymentHosted();
//                $cps->Setup($method->val2, $method->val1);
//                $callbackUrl = route('ipn.coinPay.ltc');
//
//                $req = array(
//                        'amount' => $lite_usd,
//                        'currency1' => 'USD',
//                        'currency2' => 'LTC',
//                        'custom' => $data->trx,
//                        'ipn_url' => $callbackUrl,
//                );
//
//
//                $result = $cps->CreateTransaction($req);
//
//                if ($result['error'] == 'ok') {
//                    $bcoin = $request->amount;
//                    $sendadd = $result['result']['address'];
//
//                    $data['btc_amo'] = $bcoin;
//                    $data['btc_wallet'] = $sendadd;
//                    $data->update();
//
//                } else {
//                    return back()->with('alert', 'Failed to Process');
//                }
//
//            }
//
//            $wallet = $data['btc_wallet'];
//            $bcoin = $data['btc_amo'];
//            $page_title = $method->name;
//
//
//            $qrurl = "<img src=\"https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=$wallet&choe=UTF-8\" title='' style='width:300px;' />";
//            return view('user.payment.coinpayltc', compact('bcoin', 'wallet', 'qrurl', 'page_title'));
//
//        }
//
//
//    }


    public function depositConfirm1(Request $request)
    {
        $blockchain_root = "https://blockchain.info/";
        $blockchain_receive_root = "https://api.blockchain.info/";
        $mysite_root = "https://bircoin.co/";
        $secret = 'cRdlVW7IvYwPTPNpMUYqNu118Ru7qddym';
        // $my_xpub = "xpub6CnCqz9mCSyyqzBrhwS21Gmof5fYNodineCdJagKwAMB1Bd8WbLGeFtdWyTuna17R4KW86GpenTnS5t16RsjsLj7xBSLR5RRAksyLcYc9wi";
        $my_xpub = "xpub6CnCqz9mCSyyruGkj38A3RcCkqBKdmWHsnxaAjsj8hXKFeG2ejL5KVb9YMzcpesUYJnVuAxyZSbBxWQpoGK8ccKBiivSxEr5KG9wYgtxRD8";
        
        $my_api_key = "e6eeffd5-d5a1-4359-be69-83ef8cce37e0";
        
        
        $this->validate($request, [
                'amount' => 'required|numeric|min:0',
                'gateway' => 'required',
        ]);

        
        $invoice_id = rand(0,5555555);
        $callback_url = $mysite_root . "callback_btc?invoice_id=" . $invoice_id . "&secret=" . $secret;
        
        $resp = file_get_contents($blockchain_receive_root . "v2/receive?key=" . $my_api_key . "&callback=" . urlencode($callback_url) . "&xpub=" . $my_xpub);
        $object = json_decode($resp);

        $wallet = "";

        if (isset($object->address)) {
            $wallet = $object->address;
        } else {
            return back()->with('alert', 'Failed to Process');
        }
        
        $de['user_id'] = Auth::id();
        $de['gateway_id'] = 505;
        $de['amount'] = floatval($request->amount);
        $de['charge'] = 0;
        $de['usd_amo'] = null;
        $de['btc_amo'] = 0;
        $de['address'] = $wallet;
        $de['status'] = -1;
        $de['trx'] = '';
        $data = Deposit::create($de);

        if (is_null($data)) {
            return redirect()->route('deposit')->with('alert', 'Invalid Deposit Request');
        }
        if ($data->status != -1) {
            return redirect()->route('deposit')->with('alert', 'Invalid Deposit Request');
        }

        $method = Gateway::find(505);

        $bcoin = $request->amount;
        $page_title = $method->name;


        $qrurl = "<img src=\"https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=bitcoin:$wallet&choe=UTF-8\" title='' style='width:300px;' />";
        return view('user.payment.coinpaybtc', compact('bcoin', 'wallet', 'qrurl', 'page_title'));

    }


    public function ipnCoinPayBtc1(Request $request)
    {
        $secret = 'cRdlVW7IvYwPTPNpMUYqNu118Ru7qddym';
        
        if ($_GET['secret'] != $secret) {
            echo 'Invalid Secret';
            return;
        }
        
        $data = Deposit::where('address', $_GET['address'])->orderBy('id', 'DESC')->first();
        
        if(empty($data))
        {
            echo 'Incorrect Receiving Address';
            return;
        }
        
        if ($_GET['confirmations'] >= 4) {
            echo "*ok*";
        }
      
        if ($data->status == '-1') {
            $this->userDataUpdate($data, $_GET['transaction_hash']);
        }
    }

//////////////////////////////////////////////////

///  //IPN Functions //////

    public function ipnCoinPayBtc(Request $request)
    {
        $track = $request->custom;
        $status = $request->status;
        $amount2 = floatval($request->amount2);
        $currency2 = $request->currency2;

        $data = Deposit::where('trx', $track)->orderBy('id', 'DESC')->first();

        if ($status >= 100 || $status == 2) {
            if ($currency2 == "BTC" && $data->status == '0' && $data->btc_amo <= $amount2) {
                $this->userDataUpdate($data);
            }
        }
    }

    public function ipnCoinPayEth(Request $request)
    {
        $track = $request->custom;
        $status = $request->status;
        $amount2 = floatval($request->amount2);
        $currency2 = $request->currency2;

        $data = Deposit::where('trx', $track)->orderBy('id', 'DESC')->first();
        $bcoin = $data->btc_amo;
        if ($status >= 100 || $status == 2) {
            if ($currency2 == "ETH" && $data->status == '0' && $data->btc_amo <= $amount2) {
                $this->userDataUpdate($data);
            }
        }
    }

    public function ipnCoinPayDoge(Request $request)
    {
        $track = $request->custom;
        $status = $request->status;
        $amount2 = floatval($request->amount2);
        $currency2 = $request->currency2;

        $data = Deposit::where('trx', $track)->orderBy('id', 'DESC')->first();
        $bcoin = $data->btc_amo;
        if ($status >= 100 || $status == 2) {
            if ($currency2 == "DOGE" && $data->status == '0' && $data->btc_amo <= $amount2) {
                $this->userDataUpdate($data);
            }
        }
    }

    public function ipnCoinPayLtc(Request $request)
    {
        $track = $request->custom;
        $status = $request->status;
        $amount2 = floatval($request->amount2);
        $currency2 = $request->currency2;

        $data = Deposit::where('trx', $track)->orderBy('id', 'DESC')->first();
        $bcoin = $data->btc_amo;
        if ($status >= 100 || $status == 2) {
            if ($currency2 == "LTC" && $data->status == '0') {
                $this->userDataUpdate($data);
            }
        }
    }


}
