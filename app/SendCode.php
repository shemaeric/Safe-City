<?php
namespace App;
class SendCode
{
    public static function sendCode($phone){
        $code = rand(111,9999);
        $nexmo = app('Nexmo\Client');
        $nexmo->message()->send([
           'to' => '+250'.(int) $phone,
            'from' => 'Safe City',
            'text' =>  'Verify Code: '.$code,
        ]);
        return $code;
    }
}
?>