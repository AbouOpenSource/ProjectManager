<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publication\Publication;
use Carbon\Carbon;
class PrivateController extends Controller
{
		 

		public function __construct()
    {
        Carbon::setLocale(config('app.locale'));
        Carbon::setToStringFormat('d/m/Y à H:i:s');
    }






		 public function indexPubliPerso($id)
		 {
		 	setlocale(LC_TIME, 'fr');
		 	$publications=Publication::where('personne_id',$id)->get();

		 	return view('publication.indexperso')->with(['publications'=>$publications]);
		 }
}
