<?php

namespace App\Http\Controllers;
use PDF;
use Auth;

use Illuminate\Http\Request;

class PdfController extends Controller
{
   public function github(){

	$pdf = PDF::loadView('client.printqr')->setPaper('a4')->setOrientation('portrait');

	return $pdf->download(Auth::user()->business->name."-QRCodes.pdf");

	}
}