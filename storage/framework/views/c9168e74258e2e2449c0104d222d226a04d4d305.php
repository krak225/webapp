<?php $__env->startSection('content'); ?>
<?php if(!empty($evenement)): ?>
<ul class="breadcrumb no-border no-radius b-b b-light pull-in"> 
	<li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-home"></i> Accueil</a></li> 
	<li><a href="<?php echo e(route('evenements')); ?>"> Événements</a></li>
	<li class="active">Événement N° <?php echo e(Stdfn::truncateN($evenement->evenement_id, 5)); ?></li> 
</ul> 

<div class="m-b-md"> 
	<h3 class="m-b-none"><?php echo e($evenement->evenement_libélle); ?></h3>
</div>

<?php if(Session::has('warning')): ?>
	<div class="alert alert-warning">
	  <?php echo e(Session::get('warning')); ?>

	</div>
<?php endif; ?>

<style type="text/css">

.title{
	padding:0px 15px;
}

.dz-preview, .dz-file-preview {
    display: none;
}
#table_justifs{
    border: 1px solid #eee;
	margin-top:0px;
}
#table_justifs th{
    background:#eee;	
}


.select-checkbox option::before {
  content: "\2610";
  width: 1.3em;
  text-align: center;
  display: inline-block;
}
.select-checkbox option:checked::before {
  content: "\2611";
}


ul.no_liste_item li {
  list-style:none;
}

.bold{font-weight:bold;}

</style>
						
<script src="<?php echo e(asset('js/jquery-1.9.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/dropzone.js')); ?>"></script>

<script type="text/javascript">

var my_login =  '<?php echo e(Auth::user()->email); ?>';


var csrf_token = $('meta[name="csrf-token"]').attr('content');
var base_url = $("#eco_base_url").val();
var base_url = '<?php echo e('http://'.$_SERVER['HTTP_HOST']); ?>/';

function SupprimerPieceJointe(piecejointe_id, ligne_selectionnee){
	
	var url 			= base_url+'supprimerpiecejointe';
	var url_ok 	 		= '';
	
	noty({
		dismissQueue: false,
		force: true,
		layout:'center',
		modal: true,
		theme: 'defaultTheme',
		text:"Voulez-vous supprimer ce fichier ?",
		type: "information",
		buttons: [{addClass: 'btn btn-danger ', text: 'Supprimer', onClick: function($noty) {
		   $noty.close();
				
				$.ajax({
					headers:{'X-CSRF-TOKEN': csrf_token},
					type:'post',
					url: url,
					data: {piecejointe_id:piecejointe_id},
					success: function(e){
						
						if(e == 1){
							
							$('#ligne_pj'+piecejointe_id).hide();
							// ligne_selectionnee.hide();
							// location.href = url_ok;
							// notification("Suppression effectuée avec succès","success");
							
						}else if(e == 2){
							
							// notification("Vous ne pouvez pas supprimer cet fichier","warning");
							
						}else{
							
							// notification("Erreur lors de la suppression du fichier","error");
							
						}
						
					},
					error: function(){
						
						// notification("Erreur lors de la suppression du fichier","error");
						
					}
				});
				
		
			
		   }},
		   {addClass: 'btn btn-info ', text: 'Non', onClick: function($noty) {
				$noty.close();
			
		   
		   }}]
	});
	
	
}


//dropzone 2 , pour fichiers supplémentaires


Dropzone.options.dropzone =
{
	paramName: "fichier_justif",
	disablePreview: true,
	capture: null,
	dictDefaultMessage: "Déverser les fichiers ici !",
	maxFilesize: 5,
	renameFile: function(file) {
		var dt = new Date();
		var time = dt.getTime();
	   // return time+file.name;
	   return file.name;
	},
	acceptedFiles: ".jpeg,.jpg,.png,.gif, .pdf, .docx, .doc, .xlsx, .xls",
	addRemoveLinks: false,
	timeout: 5000,
	success: function(file, response) 
	{
		
		this.removeFile(file);
		
		var img_preview_src = (response.fichier_extension=="jpg" || response.fichier_extension=="jpeg" || response.fichier_extension=="png" || response.fichier_extension=="gif" )? 'data:'+response.fichier_mimetype+';base64,'+response.fichier_contenu : '<?php echo e(asset("images/icon-article.png")); ?>';
		
		$('#table_pieces_jointes').append('<span class="btnPopupFichier" data-fichier_id="'+response.fichier_id+'" style="cursor: pointer;"><a target="_blank" href="<?php echo e(route("ShowPieceJointe","")); ?>/'+response.fichier_id+' " title="'+response.fichier_nom_original+'" class="apercu_fichier"><img src="'+img_preview_src+'" style="border:1px solid #717171;margin:2px;width:100px;height:auto;"/></span>');
		
	},
	error: function(file, response)
	{
	   return false;
	}
};



</script>

<style type="text/css">

.title{
	padding:0px 15px;
}

.dz-preview, .dz-file-preview {
	display: none;
}
#table_justifs{
	border: 1px solid #eee;
	margin-top:0px;
}
#table_justifs th{
	background:#eee;	
}

</style>


<div class="panel panel-default col-md-12" style="border-bottom: none;border-bottom-radius: 0px;"> 
	
	<div class="step-content clearfix col-md-6 row"> 
		
		<img src="<?php echo e(asset('evenements/'.$evenement->evenement_image)); ?>" style="width:100%;border-radius:5px;border:1px solid #eee;"/>
		
	</div>
	
	<div class="col-md-6 step-content"> 
		<div class=" step-content clearfix" style="padding:0px;"> 
			
			<div class="" style="padding-left: 0px;"> 
				<section class="panel panel-default">
					<div class="list-group no-radius alt"> 

						<span class="list-group-item"> 
							<span class="badge bg-light"><?php echo e($evenement->evenement_publie_par); ?></span> 
							<i class="fa fa- icon-muted"></i> Publié par
						</span>	
						<span class="list-group-item"> 
							<span class="badge bg-light"><?php echo e(Stdfn::dateTimeFromDB($evenement->evenement_date_publication)); ?></span> 
							<i class="fa fa- icon-muted"></i> Publié le
						</span>	
						<span class="list-group-item"> 
							<span class="badge bg-light"><?php echo e(number_format($evenement->evenement_montant_a_paye, 0, '', ' ')); ?></span> 
							<i class="fa fa- icon-muted"></i> Montant à payer
						</span>		
						<span class="list-group-item"> 
							<span class="badge bg-light"><?php echo e(number_format($evenement->evenement_montant_paye, 0, '', ' ')); ?></span> 
							<i class="fa fa- icon-muted"></i> Montant payé 
						</span> 
						<span class="list-group-item"> 
							<span class="badge" style="background:none;"><?php if($evenement->evenement_statut_facturation == "NON FACTURE"): ?><span id="btnChangerStatutFacturationEvenement" data-evenement_id="<?php echo e($evenement->evenement_id); ?>"  class="btn btn-sm btn-default" style="display: inline-block;padding:0px 10px;">Changer le statut</span>
						
							<?php elseif($evenement->evenement_statut_facturation == "FACTURE"): ?><span id="btnChangerStatutFacturationEvenement" data-evenement_id="<?php echo e($evenement->evenement_id); ?>"  class="btn btn-sm btn-default" style="display: inline-block;padding:0px 10px;">Modifier</span>
								
							<?php endif; ?><span class="badge badge-secondary label label-<?php echo e(strtolower(str_replace(' ', '',$evenement->evenement_statut_facturation))); ?>"><?php echo e($evenement->evenement_statut_facturation); ?></span></span> 
							<i class="fa fa- icon-muted"></i> Statut facturation 
						</span>
						<span class="list-group-item"> 
							<span class="badge" style="background:none;"><?php if($evenement->evenement_statut_paiement == "NON PAYE"): ?><span id="btnChangerStatutPaiementEvenement" data-evenement_id="<?php echo e($evenement->evenement_id); ?>" ></span> <?php endif; ?> <span class="badge badge-secondary label label label-<?php echo e(strtolower(str_replace(' ', '',$evenement->evenement_statut_paiement))); ?>"><?php echo e($evenement->evenement_statut_paiement); ?></span></span> 
							<i class="fa fa- icon-muted"></i> Statut paiement 
						</span>
						<span class="list-group-item"> 
							Observations
							<div class="badged bg-light" style="display:block;"><?php echo e($evenement->evenement_commentaire); ?></div>
						</span>
						
					</div>
				</section>
			</div>

		</div>	
	</div> 
	
</div>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>