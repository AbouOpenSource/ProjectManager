<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\Publication\Publication;
use App\Models\Publication\TypePublication;
use App\Models\Projet\Projet;
use App\Models\StructAdmin\Equipe; 
use App\Models\StructAdmin\UniteDeRecherche;

class PublicationsController extends Controller
{
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


        Publication::create([
            'typePublication_id'=>$request->typePublication_id,
            'projet_id'=>$request->projet_id,
            'libellePublication'=>$request->libellePublication,
            'personne_id'=>Auth::user()->id,
            'description'=>$request->description,
            'datePublication'=>$request->datePublication,
            'sourcePublication'=>$request->sourcePublication,
            


        ]);

      $this->index();  
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
