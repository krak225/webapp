<?php

namespace App\Http\Controllers;

use App\Participant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use PhpOffice\PhpWord\TemplateProcessor;

class ParticipantController extends Controller
{
    public function __construct()
    {
        Carbon::setLocale('fr');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function participants()
    {

        $participant = Participant::where(['participant_statut'=> 'VALIDE'])->get();

        return view('participants.participants', compact('participant'));
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
    public function SaveParticipant(Request $request)
    {

        $participant = new Participant();
        $participant->participant_nom             = $request->participant_nom;
        $participant->participant_contact         = $request->participant_contact;
        $participant->participant_email           = $request->participant_email;
        $participant->participant_fonction        = $request->participant_fonction;
        $participant->participant_society         = $request->participant_society;
        $participant->participant_date_creation   = gmdate('Y-m-d H:i:s');

        $participant->save();


         return back()->with('message','OPÉRATION EFFECTUÉE AVEC SUCCÈS !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function DetailsParticipant($participant_id)
    {

			
		$participant = Participant::where(['participant_id'=> $participant_id])->first();

		if(!empty($participant)){
				
			return view('participants.details_participant', compact('participant'));
		
		}else{
			
			return Redirect('participants')->with('warning',"LE PARTICIPANT QUE VOUS CHERCHEZ N'A PAS ÉTÉ TROUVÉ");
		}

	}
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function ModifierParticipant($participant_id)
    {

        $participant = Participant::find($participant_id);				
    				
        return view('participants.modifier_participant_popup', compact('participant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function SaveModifierParticipant(Request $request)
    {
        $participant_id = $request->participant_id;
        
        $participant = Participant::find($participant_id);
        $participant->participant_nom              = $request->participant_nom;
        $participant->participant_contact          = $request->participant_contact;
        $participant->participant_email            = $request->participant_email;
        $participant->participant_fonction         = $request->participant_fonction;
        $participant->participant_society          = $request->participant_society;
        $participant->participant_date_modification = gmdate('Y-m-d H:i:s');

        $participant->exists = true;

		$participant->save();
		
		echo 1;
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function SupprimerParticipant(Request $request)
    {
        $participant_id = $request->participant_id;

		$participant = Participant::find($participant_id);

		if(!empty($participant)){

            $participant->participant_date_suppression 	= gmdate('Y-m-d H:i:s');
            $participant->participant_statut 			= "SUPPRIME";
            $participant->exists 				    	= true;
			$participant->save();
			
			echo 1;
			
		}else{
			echo 0;
		}
    }

    // public function ExporterFichier($participant_id)
    // {
    //     $participant = Participant::findOrfail($participant_id);
    //     $templateProcessor = new TemplateProcessor( 'documentTemplate:', 'word-template/participant.docx');
    //     $templateProcessor->setValue(search: 'participant_id', $participant->participant_id);
    //     $templateProcessor->setValue(search: 'participant_nom', $participant->participant_nom);
    //     $templateProcessor->setValue(search: 'participant_contact', $participant->participant_contact);
    //     $templateProcessor->setValue(search: 'participant_fonction', $participant->participant_fonction);
    //     $fileName = $participant->participant_nom;
    //     $templateProcessor->saveAs(fileName: $fileName . '.docx');
    //     return response()->download( file: $fileName . '.docx')->deleteFileAfterSend(shouldDelete: true);
        
    // }
}
