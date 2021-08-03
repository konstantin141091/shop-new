<?php


namespace App\Services;


use Illuminate\Support\Facades\Mail;

class MailService
{
    public function sendMail($order) {
        $to_name = 'TO_NAME';
        $to_email = env('ADMIN_EMAIL');
        $data = array('name'=> 'Башкирские колбасы', "order" => $order);
        Mail::send('emails.order', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)->subject('Новый заказ на сайте');
            $message->from(env('MAIL_USERNAME'),'Башкирские колбасы');
        });
    }
}
