			

			<?php $__env->startSection('content'); ?>
			<?php if(!empty($participant)): ?>
			<ul class="breadcrumb no-border no-radius b-b b-light pull-in"> 
			<li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-home"></i> Accueil</a></li> 
			<li><a href="<?php echo e(route('list-participant')); ?>">Participant</a></li> 
			<li class="active"><?php echo e(ucfirst(strtolower($participant->participant_nom))); ?></li> 
			</ul> 

			<div class="m-b-md"> 
			<h3 class="m-b-none"><?php echo e($participant->participant_nom); ?></h3>
			</div>

			<?php if(Session::has('warning')): ?>
			<div class="alert alert-warning">
				<?php echo e(Session::get('warning')); ?>

			</div>
			<?php endif; ?>

			<style type="text/css">
			<!--
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

			<div class="panel panel-default"> 

				<div class="col-lg-12" style="padding-top:15px;padding-left: 0px;padding-right: 0px;"> 
				<div class="row0"> 
					
					<div class="col-sm-7"> 
						<section class="panel panel-default"> 
							<header class="panel-heading bg-info lt no-border title"> 
								<div class="clearfix"> 
									<div class="clear"> 
									<div class="h3 m-t-xs m-b-xs text-white">
									<small style="color:white;">Informations sur le participant</small>
									<span class="btnModifierparticipant pull-right " data-participant_id="<?php echo e($participant->participant_id); ?>" style="cursor: pointer;"><i class="fa fa-edit text-white" title="Modifier"></i></span>
								
									</div>  
									</div> 
								</div> 
							</header> 
							<div class="list-group no-radius alt"> 
								<div class="list-group-item"> 
									<span class="badge bg-light" style="background: none;"><span class="label label-default" style="font-size: 100%;"><?php echo e(Stdfn::truncateN($participant->participant_id,5)); ?></span></span> 
									<i class="fa fa- icon-muted"></i> Numéro du participant
								</div> 
								<span class="list-group-item"> 
									<span class="badge bg-light"><?php echo e($participant->participant_nom); ?></span> 
									<i class="fa fa- icon-muted"></i> Nom du participant 
								</span>		
								<span class="list-group-item"> 
									<span class="badge bg-light"><?php echo e($participant->categorie_nom); ?></span> 
									<i class="fa fa- icon-muted"></i> Catégorie
								</span>		
								<span class="list-group-item"> 
									<span class="badge bg-light"><?php echo e(Stdfn::dateTimeFromDB($participant->participant_date_creation)); ?></span> 
									<i class="fa fa- icon-muted"></i> Date enregistrement
								</span> 
								

							</div> 
							
						</section>
					</div>
					
										
				</div> 
				</div> 
				
				<br style="clear:both;"/>	
			</div>

							<div class="line line-lg pull-in"></div>
							
							<div class="panel panel-default" style="padding-bottom:10px;"> 
														
								<script src="<?php echo e(asset('js/jquery-1.9.1.min.js')); ?>"></script>
								<script src="<?php echo e(asset('js/dropzone.js')); ?>"></script>

					<script type="text/javascript">

					var my_login =  '<?php echo e(Auth::user()->email); ?>';


					Dropzone.options.dropzone =
					{
						paramName: "participants_fichiers",
						disablePreview: true,
						capture: null,
						dictDefaultMessage: "Déverser les images ici !",
						maxFilesize: 5,
						renameFile: function(file) {
							var dt = new Date();
							var time = dt.getTime();
							// return time+file.name;
							return file.name;
						},
						acceptedFiles: ".jpeg,.jpg,.png",
						addRemoveLinks: false,
						timeout: 5000,
						success: function(file, response) 
						{
							
							this.removeFile(file);
							
							var img_preview_src = '<?php echo e(asset("images/participants")); ?>/'+response.autreimage_photo;
							
							$('#table_fichiers_traitement').append('<a target="_blank" href="<?php echo e(route("ShowPieceJointe","")); ?>/'+response.autreimage_id+' " title="'+response.autreimage_photo+'" class="apercu_fichier"><img src="'+img_preview_src+'" style="border:1px solid #717171;margin:2px;width:100px;height:auto;"/></a>');
							
							
						},
						error: function(file, response)
						{
							return false;
						}
					};


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

												
								<div class="col-sm-12" style="padding:0px;"> 
									<section class="panel panel-default"> 
										<header class="panel-heading bg-info lt no-border title"> 
											<div class="clearfix"> 
												<div class="clear"> 
												<div class="h3 m-t-xs m-b-xs text-white">
												<small style="color:white;">Plus de photos</small>
												<i class="fa fa-circle text-white pull-right text-xs m-t-sm"></i> 
												</div>  
												</div> 
											</div> 
										</header> 
									</section>
								</div>

								<div class="row col-lg-12"> 
									
									<div class="col-sm-12"> 

										<div class="col-md-5" style="border-right:1px dotted #eee;">
											<form method="post" action="<?php echo e(route('UpdateFichiers',[$participant->participant_id])); ?>" enctype="multipart/form-data" class="dropzone" id="dropzone">
												<?php echo csrf_field(); ?>

												<div style="height:120px;" class="dz-message rounded0 btn btn-sm btn-default" data-dz-message>
													<span>
														<span class="fa-stack fa-2x pull-left m-r-sm"> 
															<i class="fa fa-circle fa-stack-2x text-info"></i> 
															<i class="fa fa-camera fa-stack-1x text-white"></i> 
														</span> 
														Déverser les images ici !
													</span>
												</div>
											</form>
										</div>
										<div class="col-md-7" id="table_fichiers_traitement">
											
											<?php $__currentLoopData = $piecesjointes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fichier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<a target="_blank" href="<?php echo e(route('ShowPieceJointe',$fichier->autreimage_id)); ?>" class="apercu_fichier">
												<img src="<?php echo e(asset('images/participants/'.$fichier->autreimage_photo)); ?>" style="border:1px solid #717171;margin:2px;width:100px;height:auto;"/>
											</a>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</div>
										
									</div>
									
								</div>

								<br style="clear:both;"/>
							
							</div>
							
							
							
						</div> 
						
						
				
				</div>
				
			</div>

				</div>

			</div>


			<?php else: ?>

			<ul class="breadcrumb no-border no-radius b-b b-light pull-in"> 
			<li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-home"></i> Accueil</a></li> 
			<li><a href="<?php echo e(route('list-participant')); ?>">participants</a></li> 
			</ul> 

			<div class="m-b-md"> 
			<h3 class="m-b-none">participant introuvable</h3> 
			</div>

			<div class="panel"> 

			<div class="col-lg-12" style="padding:15px;"> 
				Le participant que vous recherchez n'a pas été trouvé!
			</div> 

			<br style="clear:both;"/>

			</div>	

			<?php endif; ?>

			<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>