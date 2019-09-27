<?php

namespace App\Http\Controllers;

use App\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function index()
    {
        $newsletter = Newsletter::all();
        return view('adm.newsletter.index',compact('newsletter'));
    }

    public function store(Request $request)
    {
//        dd($request->all());
        $newsletter = new Newsletter();
        $newsletter->email = $request->email;
//        $newsletter->all_emails =
        $newsletter->save();

        return back()->with('status','Correo Registrado correctamente');
    }
}
