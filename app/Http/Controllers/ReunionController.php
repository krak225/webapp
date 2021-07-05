<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Participant;
use App\Reunion;

class ReunionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function reunion()
    {

        $reunion = Reunion::where(['reunion_statut'=>'VALIDE'])->get();

        return view('reunion.reunion', compact('reunion'));
    }

    public function SaveReunion(Request $request )
    { 

        $reunion = new Reunion();

        $reunion->reunion_ordre_jour             = $request->reunion_ordre_jour;
        $reunion->reunion_pv                     = $request->reunion_pv;
        $reunion->reunion_date_creation          = gmdate('Y-m-d H:i:s');
        $reunion->save();

        return back()->with('message','OPÉRATION EFFECTUÉE AVEC SUCCÈS !');
    }



    public function DetailsReunion($reunion_id)
    {
        $reunion = Reunion::find($reunion_id);
        

        if(!empty($reunion)){

            $participants	= Participant::join('tb_reunion_participant','tb_reunion_participant.participant_id','tb_participants.participant_id')
            ->where(['tb_reunion_participant.reunion_id'=>$reunion_id])
            ->get();                
                 
              
            return view('reunion.details_reunion', compact('reunion','participants'));
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

    public function SaveReunionParticipant()
    {

    }

    public function ListReunionParticipant()
    {
       
}
}