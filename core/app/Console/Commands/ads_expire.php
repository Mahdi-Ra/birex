<?php

namespace App\Console\Commands;

use App\AdvertiseDeal;
use App\User;
use App\Price;
use App\UserCryptoBalance;
use Illuminate\Console\Command;

class ads_expire extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ads:expire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $ads = AdvertiseDeal::where([['status', '!=', 1],['status', '!=', 2]])->get();
        foreach ($ads as $item) {
            $now = new \Carbon\Carbon();
            if ($item->created_at > $now->addDay(1)) {
                $item->status = 2;
                $item->save();
                $from = User::find($item->from_user_id);
                $to = User::find($item->to_user_id);
                $from->ads_expr_count = $from->ads_expr_count + 1;
                $to->ads_expr_count = $to->ads_expr_count + 1;

                $from->save();
                $to->save();

                if ($to->ads_expr_count % 4 == 0) {
                    $to->exp_4++;
                    $to->save();
                }
                if ($to->ads_expr_count % 3 == 0) {
                    $bal = UserCryptoBalance::where([
                            ['user_id', $item->to_user_id],
                            ['gateway_id', 505]
                    ])->first();
                    $bal->balance = $bal->balance * 0.98;
                    $bal->save();
                    $to->star = (($to->star * $to->star_unit) + 0) / $to->star_unit;
                    $to->star_unit++;
                    $to->save();

                }

                if ($from->ads_expr_count % 3 == 0) {
                    $from->star = (($from->star * $from->star_unit) + 0) / $from->star_unit;
                    $from->star_unit++;
                    $from->save();
                }
            }
        }
        $p = Price::find('USD');
        $p->am=json_decode(file_get_contents('https://www.blockonomics.co/api/price?currency=USD'))->price;
        $p->save();
        
        $p = Price::find('TRY');
        $p->am=json_decode(file_get_contents('https://www.blockonomics.co/api/price?currency=TRY'))->price;
        $p->save();
        
        $p = Price::find('EUR');
        $p->am=json_decode(file_get_contents('https://www.blockonomics.co/api/price?currency=EUR'))->price;
        $p->save();
        
   
        
         $bal = UserCryptoBalance::where('balance' , '<' , 0.0000001)->update(['balance' => 0]);
       
    }
}
