<div class="panel panel-default"> 

	<div class="step-content clearfix"> 
	
		<form id="formModifierParticipant" method="post" action="<?php echo e(route('SaveModifierParticipant')); ?>" class="form-horizontal">
		
			<input type="hidden" name="participant_id" value="<?php echo e($participant->participant_id); ?>"/>
			
			<?php echo csrf_field(); ?>

			
			<div class="step-pane active" id="step1"> 
			
				<div class="form-group">
					
					<div class="col-md-12 row">
						<div class="col-md-4">
							<span> Nom et prénom <span class="text text-danger">*</span></span>
							<input placeholder="" type="text" class="form-control" name="participant_nom" id="participant_nom"  value="<?php echo e($participant->participant_nom); ?>" required>
						</div>
						
						<div class="col-md-4">
							<span> contact <span class="text text-danger"></span>*</span>
							<input style="padding-top:0px;" placeholder="" type="text" class="form-control" name="participant_contact" id="participant_contact" value="<?php echo e($participant->participant_contact); ?>" required>
						</div>
						
						<div class="col-md-4">
							<span>Email  <span class="text text-danger">*</span></span>
							<input style="padding-top:0px;" placeholder="" type="emali" class="form-control" name="participant_email" id="participant_email" value="<?php echo e($participant->participant_email); ?>" required>
						</div>

					</div>	
				<div class="col-md-12 row">
					<div class="col-md-4">
						<span>Fonction <span class="text text-danger">*</span></span>
						<input style="padding-top:0px;" placeholder="" type="text" class="form-control" name="participant_fonction" id="participant_fonction" value="<?php echo e($participant->participant_fonction); ?>" required>
						
					</div>
					
					<div class="col-md-4">
						<span>Société <span class="text text-danger">*</span></span>
						<input style="padding-top:0px;" placeholder="" type="text" class="form-control" name="participant_society" id="participant_society" value="<?php echo e($participant->participant_society); ?>" required>	
					</div>
				</div>		
					<div class="col-md-12 row" style="margin-top:10px;">	
						<div class="pull-left">
							<span>&nbsp; <span class="text text-danger"></span></span>
							<button type="reset" class="btn btn-danger">ANNULER</button>
						</div>
						<div class="pull-right">
							<span>&nbsp; <span class="text text-danger"></span></span>
							<button type="button" id="btnSaveModifierParticipant" class="btn btn-success btn-sm rounded">ENREGISTRER</button> 
						</div>
							
				</div>
			</div>		
			
		</form>
		
	</div>

</div>
