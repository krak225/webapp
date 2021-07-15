<?php

namespace App\Http\Controllers;

use App\Societe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SocieteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function societe()
    {
        $societe = Societe::where(['societe_statut' => 'VALIDE'])->get();

        return view('societes.societes', compact('societe'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SaveSociete(Request $request)
    {
        $societe = new Societe();

        $societe->societe_nom                         = $request->societe_nom;
        $societe->societe_date_creation               = gmdate('Y-m-d H:i:s');
        $societe->save();

        return back()->with('message','OPÉRATION EFFECTUÉE AVEC SUCCÈS !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Societe  $societe
     * @return \Illuminate\Http\Response
     */
    public function DetailsSociete($societe_id)
    {
        $societe = societe::find($societe_id);

      if(!empty($societe)){

            $societe = Societe::find($societe_id);

            return view('societes.details_societes', compact('societe'));
       }
        else{
            return Redirect('Societes')->with('warning',"LA SOCIETE QUE VOUS CHERCHEZ N'A PAS ÉTÉ TROUVÉ");
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Societe  $societe
     * @return \Illuminate\Http\Response
     */
    public function ModifierSociete($societe_id)
    {
        $societe = Societe::find($societe_id);				
    				
        return view('societes.modifier_societes_popup', compact('societe'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Societe  $societe
     * @return \Illuminate\Http\Response
     */
    public function SaveModifierSociete(Request $request)
    {
        $societe_id = $request->societe_id;
        
        $societe = Societe::find($societe_id);
        $societe->societe_nom              = $request->societe_nom;
        $societe->societe_date_modification = gmdate('Y-m-d H:i:s');

        $societe->exists = true;

		$societe->save();
		
		echo 1;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Societe  $societe
     * @return \Illuminate\Http\Response
     */
    public function SupprimerSociete(Request $request)
    {
        $societe_id = $request->societe_id;

		$societe = societe::find($societe_id);

		if(!empty($societe)){

            $societe->societe_date_suppression 	= gmdate('Y-m-d H:i:s');
            $societe->societe_statut 			= "SUPPRIME";
            $societe->exists 				    = true;
			$societe->save();
			
			echo 1;
			
		}else{
			echo 0;
		}
    }
}
