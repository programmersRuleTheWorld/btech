<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CovidForm;
use App\Mail\Covid;
use Mail;

class CovidFormsController extends Controller
{
    public function store(Request $request)
    {

    $this->validate($request, [
        'first_name' => 'required',
        'email' => 'required',
    ]);

    $covidform = new CovidForm();
    $covidform->first_name = $request->input('first_name');
    $covidform->email = $request->input('email');
    $covidform->comment = $request->input('comment');
    $covidform->save();
    
    $title = "Success! Form Submitted";

    //Mail::to($covidform->email)->send(new Covid($covidform));


    $thanksmsg = "Thank you for your interest in working with us, we really appreciate it
    and we'll get back to you soon!";
    
    return view('pages.covid_notice')->with(['thanksmsg' => $thanksmsg, 'title' => $title]);
    }
}
