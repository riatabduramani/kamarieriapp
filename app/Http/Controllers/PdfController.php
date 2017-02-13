<?php

namespace App\Http\Controllers;
use PDF;

use Illuminate\Http\Request;

class PdfController extends Controller
{
   public function github(){

	$pdf = PDF::loadView('client.home')->setPaper('a4')->setOrientation('landscape');

	return $pdf->download('printastudent.pdf');

	}


}
