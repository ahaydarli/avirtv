<?php
/**
 * Created by PhpStorm.
 * User: lenova
 * Date: 10.01.2018
 * Time: 10:40
 */

namespace App\Components;


use Illuminate\Support\Facades\App;

class GoldenpayUtils
{
    const AD_AMOUNT = 200;
    const AD_DESCRIPTION = "New service";
    const OK = 1;
    const CHECK = 0;

    public static function pay($pay_amount, $card_type, $order_id)
    {
        $cardtypes = array("v", "m");
        $amount = $pay_amount;
        $description = self::AD_DESCRIPTION;
        $lang = App::getLocale();
        if(in_array($card_type,$cardtypes)) {
            $stub = new Goldenpay();
            $resp = $stub->getPaymentKeyJSONRequest($amount, $lang, $card_type, $description);
            if ($resp->paymentKey) {
                header('Location: ' . $resp->urlRedirect);
            }
        }
        else{
            return redirect()->route('profile');
        }
    }
}
