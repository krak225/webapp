
<div id="popup_noter_visite" style="margin-top:-28px;background:white;padding:5px;" class="">
    <div class="form">
    
        <input type="hidden" id="visite_service_id" value="{{$evenement->evenement_id}}"/>
        
        <div class="col-md-12"> 
            
            <div class="col-md-12">
                <span> Staut paiement</span>
                <select class="form-control" name="evenement_statut_paiement" id="evenement_statut_paiement" value="{{old('evenement_statut_paiement') ?? $evenement->evenement_statut_paiement}}" >
                    <option value="NON PAYE">NON PAYE</option>
                    <option value="PAYE TOTALEMENT">PAYE</option>
                    <option value="PAYE PARTIELEMENT">PAYE PARTIELEMENT</option> 
                </select>
            </div>
            <div class="col-md-6">
                <span> Montant à payer</span>
                <input type="text" class="form-control" name="evenement_montant_a_paye" id="evenement_montant_a_paye" value="{{ old('evenement_montant_a_paye') ?? $evenement->evenement_montant_a_paye}}" />
            </div>
    
            <div class="col-md-6">
                <span> Montant payé</span>
                <input type="text" class="form-control" name="evenement_monatnt_paye" id="evenement_montant_paye" value="{{ old('evenement_montant_paye') ?? $evenement->evenement_montant_paye}}"/>
            </div>
    
            <div class="col-md-12">
                <span> Commentaire</span>
                <input type="text" class="form-control" name="evenement_commentaire" id="evenement_commentaire" value="{{ old('evenement_commentaire') ?? $evenement->evenement_commentaire}}"/>
            </div>

        </div>
    
        
    </div>
    
    <br style="clear:both;"/>
    
    </div>