<?php

namespace App\Http\Controllers;

use App\Evenement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Stdfn\Stdfn;
use Illuminate\Support\Carbon;

class EvenementController extends Controller
{
    
	public function __construct()
    {
        $this->middleware('auth');
		
		Carbon::setLocale('fr');
		
    }
	
	
    public function evenementielHome()
    {
		
		$evenements 			= Evenement::count();
		$evenements_a_facturer 	= Evenement::where(['evenement_statut_facturation'=>'NON FACTURE'])->count();
		$evenements_factures   	= Evenement::where(['evenement_statut_facturation'=>'FACTURE'])->count();
		
		return view('evenementiel.evenementiel_home', ['evenements'=>$evenements, 'evenements_a_facturer'=>$evenements_a_facturer, 'evenements_factures'=>$evenements_factures]);

	}

    public function evenements()
    {
		
		$evenements = Evenement::get()->sortByDesc('evenement_id');
		
		return view('evenementiel.evenements', ['evenements'=>$evenements, 'page_title'=>'Tous les événements']);

	}

    public function evenements_a_facturer()
    {
		
		$evenements = Evenement::where(['evenement_statut_facturation'=>'NON FACTURE'])->get()->sortByDesc('evenement_id');
		
		return view('evenementiel.evenements', ['evenements'=>$evenements, 'page_title'=>'Liste des événements à facturer']);

	}

    public function evenements_factures()
    {
		
		$evenements = Evenement::where(['evenement_statut_facturation'=>'FACTURE'])->get()->sortByDesc('evenement_id');
		
		return view('evenementiel.evenements', ['evenements'=>$evenements, 'page_title'=>'Liste des événements facturés']);

	}


    public function ImporterEvenements(Request $request)
    {
		if($request->hasFile('fichier_whatsapp')) {
			
			if ($request->file('fichier_whatsapp')->isValid()) {
				
				
				$fichier  = $request->file('fichier_whatsapp');
				$fileName = 'fichier_whatsapp'.'_'.time().'_'.$fichier->getClientOriginalName();
				
				$mimetype = $fichier->getMimeType();
				
				$fichier->move(public_path('evenements'),$fileName);
				
				$fp = fopen('evenements/'.$fileName, 'r');
				
				while($ligne = fgets($fp)){
					
					if(trim(substr($ligne, -16)) == '(fichier joint)'){
						
						$date  = Stdfn::dateToDB(substr($ligne, 0, 11));
						$heure = substr($ligne, 13, 6);
						
						$reste_ligne = substr($ligne, 22, 255);
						
						$tab = explode(': ', $reste_ligne);
						
						$user_name 	  = isset($tab[0]) ? trim($tab[0]) : '';
						$picture_name = trim(str_replace('(fichier joint)','',$tab[1]));
						$picture_name = substr($picture_name, 3, 255);
						
						// dd($tab);
						
						$evt = new Evenement();
						$evt->evenement_image 				= $picture_name;
						$evt->evenement_publie_par 			= $user_name;
						$evt->evenement_date_publication 	= $date.' '.$heure;
						$evt->evenement_date_creation 		= gmdate('Y-m-d H:i:s');
						$evt->save();
						
					}
					
				}
				
				
			}
			
		}
		
		
		return back()->with('message','IMPORTATION EFFECTUÉE AVEC SUCCÈS !');
		
	}
	
	
    public function DetailsEvenement($evenement_id)
    {
		
		$evenement = Evenement::find($evenement_id);
		
		return view('evenementiel.details_evenement', ['evenement'=>$evenement]);

		
	}
	
	
    public function popup_redevance_evenement($evenement_id)
    {
		$evenement = Evenement::find($evenement_id);
		
		return view('evenementiel.popup_redevance_evenement', ['evenement'=>$evenement]);
		
	}

    public function set_redevance_evenement(Request $request)
    {
		$evenement_id 					= $request->evenement_id;
		$evenement_statut_facturation	= 'FACTURE';
		$evenement_statut_paiement 	    = $request->evenement_statut_paiement;
		$evenement_montant_a_paye 		= $request->evenement_montant_a_paye;
		$evenement_montant_paye 		= $request->evenement_montant_paye;
		$evenement_commentaire 		    = $request->evenement_commentaire;
		
		Evenement::where(['evenement_id'=>$evenement_id])
			     ->update([
							'evenement_montant_a_paye'=>$evenement_montant_a_paye,
							'evenement_montant_paye'=>$evenement_montant_paye,
							'evenement_statut_facturation'=>$evenement_statut_facturation,
							'evenement_statut_paiement'=>$evenement_statut_paiement,
							'evenement_commentaire'=>$evenement_commentaire,
						]);
		
		echo 1;
		
	}


	public function SupprimerEvenement(Request $request)
	{
		$evenement_id = $request->evenement_id;

		$evenement = Evenement::find($evenement_id);

		if(!empty($evenement)){

            $evenement->evenement_date_suppression 	= gmdate('Y-m-d H:i:s');
            $evenement->evenement_statut 			= "SUPPRIME";
            $evenement->exists 				    	= true;
			$evenement->save();
			
			echo 1;
			
		}else{
			echo 0;
		}
	}

}
