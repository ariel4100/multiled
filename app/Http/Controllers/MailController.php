<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function ficha_producto(Request $request)
    {
//        dd($request->all());
        $data = $request->all();

        $for = ['arielcallisaya00@gmail.com'];
        $subject = 'MULTILED - Mensaje de Ficha de producto de la Pagina Web';
        Mail::send('mail.ficha', $request->all(), function($msj) use($subject,$for){
            $msj->from("ventas@multiled.com.ar","MULTILED");
            $msj->subject($subject);
            $msj->to($for);
        });


        if (count(Mail::failures()) > 0)
            return back()->withErrors(['status' => "Ha ocurrido un error al enviar el correo"]);
        else
            return back()->with('status',"Correo enviado correctamente");
    }
    public function contacto(Request $request)
    {
//        dd($request->all());
        $data = $request->all();

        if(!isset($data["terminos"]))
            return back()->withInput($data)->withErrors(['status' => __('Acepte los términos y condiciones de privacidad')]);


        $for = ['arielcallisaya00@gmail.com'];
        $subject = 'MULTILED - Mensaje de Contacto de la Pagina Web';
        Mail::send('mail.contacto', $request->all(), function($msj) use($subject,$for){
            $msj->from("ventas@multiled.com.ar","MULTILED");
            $msj->subject($subject);
            $msj->to($for);
        });


        if (count(Mail::failures()) > 0)
            return back()->withErrors(['status' => "Ha ocurrido un error al enviar el correo"]);
        else
            return back()->with('status',"Correo enviado correctamente");
    }

    public function presupuesto(Request $request){
//        return back()->with('status',"Correo enviado correctamente");
//        dd($request->all());
        $data = $request->all();
//        if(!isset($data["terminos"]))
        $for = ['arielcallisaya00@gmail.com'];
        $subject = 'MULTILED - Mensaje de Presupuesto de la Pagina Web';
        Mail::send('mail.presupuesto', $request->all(), function($msj) use($subject,$for,$request){
            $msj->from("ventas@multiled.com.ar","MULTILED");
            $msj->subject($subject);
            $msj->to($for);
            if (isset($request->file))
            {
                $msj->attach($request->file->getRealPath(), array(
                        'as' => $request->file->getClientOriginalName(), // If you want you can change original name to custom name
                        'mime' => $request->file->getMimeType())
                );
            }

        });



        if (count(Mail::failures()) > 0)
            return back()->withErrors(['status' => "Ha ocurrido un error al enviar el correo"]);
        else
            return back()->with('status',"Correo enviado correctamente");
    }
}
