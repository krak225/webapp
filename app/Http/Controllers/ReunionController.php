<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Participant;
use App\Reunion;
use App\ReunionSociete;
use App\Societe;

class ReunionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function reunion()
    {
        $reunion = Reunion::where(['reunion_statut'=>'VALIDE'])->get();

        $societes	= Societe::get();  
        
            return view('reunion.reunion', compact('reunion', 'societes'));
        
       
        
    }

    public function SaveReunion(Request $request )
    { 
        $societes                  = $request->societes;
        $reunion = new Reunion();
       
        $reunion->reunion_ordre_jour                  = $request->reunion_ordre_jour;
        $reunion->reunion_libelle                     = $request->reunion_libelle;
        $reunion->reunion_date_creation               = gmdate('Y-m-d H:i:s');
        $reunion->save();

        $reunion_id = $reunion->reunion_id;

        foreach($societes as $societe_id)
        {
            $reunion_societe = new ReunionSociete();

            $reunion_societe->reunion_id = $reunion_id;
            $reunion_societe->societe_id = $societe_id;
            $reunion_societe->save();


        }

        return back()->with('message','OPÉRATION EFFECTUÉE AVEC SUCCÈS !');
    }



    public function DetailsReunion($reunion_id)
    {
        $reunion = Reunion::find($reunion_id);
        

        if(!empty($reunion)){

            $participants	= Participant::join('tb_reunion_participants','tb_reunion_participants.participant_id','tb_participants.participant_id')
            ->where(['tb_reunion_participants.reunion_id'=>$reunion_id])
            ->get(); 
            $societes	= Societe::join('tb_reunion_societe','tb_reunion_societe.societe_id','tb_societe.societe_id')
            ->where(['tb_reunion_societe.reunion_id'=>$reunion_id])
            ->get();                
                               
            return view('reunion.details_reunion', compact('reunion','participants', 'societes'));
        }
        else{
            return Redirect('participants.reunion')->with('warning',"LA REUNION QUE VOUS CHERCHEZ N'A PAS ÉTÉ TROUVÉ");
        }


       
    }

    public function ModifierReunion($reunion_id)
    {

        $reunion = Reunion::find($reunion_id);
    						    				
        return view('reunion.modifier_reunion_popup', compact('reunion'));

    }



    public function SaveModifierReunion(Request $request)
    {

        $reunion_id = $request->reunion_id;
		
		$reunion = Reunion::find($reunion_id);
		$reunion->reunion_ordre_jour   		    = $request->reunion_ordre_jour;
		$reunion->reunion_pv               		= $request->reunion_pv;
		$reunion->reunion_date_modification		= gmdate('Y-m-d H:i:s');
		$reunion->exists = true;
		$reunion->save();
		
		echo 1;
    }

    public function SupprimerReunion(Request $request)
    {

		$reunion_id = $request->reunion_id;

		$reunion = Reunion::find($reunion_id);

		if(!empty($reunion)){

			$reunion->reunion_date_suppression 	= gmdate('Y-m-d H:i:s');
			$reunion->reunion_statut 			= "SUPPRIME";
			$reunion->exists 					= true;
			$reunion->save();
			
			echo 1;
			
		}else{
			echo 0;
		}

    }


}