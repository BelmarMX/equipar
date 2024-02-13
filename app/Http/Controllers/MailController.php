<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    private $send;

    public function __construct()
    {
        $this -> send       = array();
        $this -> recipent   = env('MAIL_RECEPTION');
    }
    /* --- --- --- --- --- --- --- --- --- ---
    | Send email or store in DB
    --- --- --- --- --- --- --- --- --- --- */
    public function store( Request $request ){

        // validate
        $this -> validate( $request, [
                'g-recaptcha-response' => 'required'
            ,   'nombre'    => 'required|string'
            ,   'correo'    => 'required|email'
            ,   'empresa'   => 'required|string'
            ,   'telefono'  => 'nullable|min:6'
            ,   'asunto'    => 'nullable|string'
            ,   'cuerpo'    => 'required|string'
        ]);

        //re-captcha-vertify
        $re_url     = 'https://www.google.com/recaptcha/api/siteverify';
        $re_data       = array(
                'secret'    => env('CAPTCHA_SECRET')
            ,   'response'  => $request['g-recaptcha-response']
        );
        $re_query      = http_build_query($re_data);
        $re_options    = array(
            'http'  => array(
                    'header'    =>      "Content-Type: application/x-www-form-urlencoded\r\n"
                                    .   "Content-Length: ".strlen($re_query)."\r\n"
                                    .   "User-Agent:MyAgent/1.0\r\n"
                ,   'method'    => 'POST'
                ,   'content'   => $re_query
            )
        );
        $re_context         = stream_context_create($re_options);
        $re_verify          = file_get_contents($re_url, false, $re_context);
        $captcha_success    = json_decode($re_verify);
        if( $captcha_success -> success )
        {
            Mail::send( '00_layouts.03_email.contacto', $request -> all(), function($message){
                $message -> subject('Formulario de contacto');
                $message -> to( $this -> recipent );
            });

            return redirect() -> route('gracias', ['referer' => 'contacto']);
        } else {
            $this -> send['type']       = 'danger';
            $this -> send['message']    = 'Todo indica que eres un robot';
        }

        return  redirect()
                -> route('contacto', ['#anc'])
                -> withInput()
                -> with('alert', $this -> send);
    }
}
