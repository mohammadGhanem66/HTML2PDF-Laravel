<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Meneses\LaravelMpdf\Facades\LaravelMpdf as pdf2;
use Mail;
class AjaxController extends Controller
{
    //
    function test(){
        //  $data = ['title' => 'Laravel 7 Generate PDF From View Example Tutorial'];
        // // $data for sending data to the view before genreting the pdf file.
        // $pdf = pdf2::loadView('index', $data);
		// //return $pdf->stream('document.pdf'); // For displaying the pdf
        // return $pdf->download('invoice.pdf'); // For downnloading the pdf.
        // //return view('index' );


        $pdf = pdf2::loadView('index');
		//return $pdf->stream('document.pdf'); // For displaying the pdf
        $data["email"] = "mohammodgh50@gmail.com";
        $data["title"] = "From me";
        $data["body"] = "This is Demo";
        Mail::send('index', $data, function($message)use($data, $pdf) {
            $message->to($data["email"], $data["email"])
                    ->subject($data["title"])
                    ->attachData($pdf->output(), "text.pdf");
                });
    }
    function test2(){
        return view('index' );
    }
}
