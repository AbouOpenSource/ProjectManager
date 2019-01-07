<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Publication\Publication;
use App\Models\Publication\TypePublication;
use App\Models\Projet\Projet;
use App\Models\StructAdmin\Equipe; 
use App\Models\StructAdmin\UniteDeRecherche;
use Carbon\Carbon;

class PublicationsController extends Controller
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















    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publications=Publication::all();
        
        return view('publication.index')->with('publications',$publications);         
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     

                            // $user=Auth::user();
                 
                            // if($user->unite_id)
                            //     {
                            //          $struct=UniteDeRecherche::find($user->unite_id);
                            //     }
                            //  else
                            //     {
                            //          $struct=Equipe::find($user->equipe_id);
                            //     }

                            //  $projets=$struct->projet; 
                           
                             $typePublications=TypePublication::all();


                            return view('publication.create')
                                ->with('typePublications',$typePublications);
                               // ->with('projets',$projets);
                    


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



return $request->media;

return Storage::putFile('public',$request->file('media'));





 //        if($request->hasFile('media'))
 //        { 
 //        Publication::create([
 //            'typePublication_id'=>$request->typePublication_id,
 //            'projet_id'=>$request->projet_id,
 //            'libellePublication'=>$request->libellePublication,
 //            'personne_id'=>Auth::user()->id,
 //            'description'=>$request->description,
 //            'datePublication'=>$request->datePublication,
 //            'sourcePublication'=>$request->sourcePublication,
 //            'media'=> Storage::putFile('public/publications',$request->file('media'))


 //         ]);
 //    }
                    

 // return redirect('/chercheur/{id}/publications',Auth::user()->id);
 //     }

}
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
