<?php $__env->startSection('content'); ?>

<ul class="breadcrumb no-border no-radius b-b b-light pull-in"> 
	<li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-home"></i> Accueil</a></li>
	<li class="active">Reunion</li> 
</ul> 


<?php if(Session::has('warning')): ?>
	<div class="alert alert-warning">
	  <?php echo e(Session::get('warning')); ?>

	</div>
<?php endif; ?>

<?php if(Session::has('message')): ?>
	<div class="alert alert-success">
	  <?php echo e(Session::get('message')); ?>

	</div>
<?php endif; ?>

<?php if(count($errors) > 0): ?>
    <div class="alert alert-danger">
        <ul style="padding-left: 5px;">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>

<div class="m-b-md"> 
	<h3 class="m-b-none">Gestion des reunions</h3> 
</div>


<div class="panel panel-default"> 

	<div class="wizard-steps clearfix" id="form-wizard"> 
		<ul class="steps"> 
			<li data-target="#step3" class="active"><span class="badge"><i class="fa fa-plus" ></i></span>Nouvelle reunion</li>
		</ul> 
	</div> 

	<div class="step-content clearfix"> 
		<form method="post" action="<?php echo e(route('SaveReunion')); ?>" enctype="multipart/form-data" class="form-horizontal">
			
			<?php echo csrf_field(); ?>

			
			<div class="step-pane active" id="step1"> 
			
				<div class="form-group<?php echo e($errors->has('reunion_ordre_jour') ? ' has-error' : ''); ?>">
					
					<div class="col-md-12 row">
						
						<div class="col-md-6 ">
							<span> Libellé<span class="text text-danger"></span>
							<input style="padding-top:0px;" placeholder="" type="text" class="form-control" name="reunion_libelle" value="<?php echo e(old('reunion_libelle')); ?>" required>
						</div>
						<div class="col-md-6">
							<span> Date<span class="text text-danger"></span>
							<input type="date" class="form-control">
						</div>
					</div>
					<div class="col-md-12 row" style="margin-top: 10px;">	
						<div class="col-md-6">		
							<span> Ordre du jour<span class="text text-danger"></span></span><br>
							<textarea name="reunion_ordre_jour" class="text-area" id="reunion_ordre_jour"  required ><?php echo e(old('reunion_ordre_jour')); ?></textarea>		
						</div>
							<div class="col-md-4">
								<span> Societé <span class="text text-danger">*</span></span>
								<select multiple  class="form-control" name="societes[]" required>
									<option value="">Choisir</option>
									<?php $__currentLoopData = $societes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $societe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($societe->societe_id); ?>"><?php echo e($societe->societe_nom); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>
							</div>
						</div>


					
					
					<div class="col-md-12 row" style="margin-top:10px;">	
						<div class="col-md-4 pull-left">
							<span>&nbsp;<span class="text text-danger"></span></span>
							<button type="reset" class="btn btn-danger">ANNULER</button>
						</div>

						<div class="pull-right">
							<span>&nbsp;<span class="text text-danger"></span></span>
							<button type="submit" class="btn btn-success">ENREGISTRER</button> 
						</div>
				</div>
					
				</div>

				
			</div> 
			
		</form>
		
		 
	
	</div>
	
	
</div>


<section class="panel panel-default"> 
	<header class="panel-heading"> Liste des reunions
		<!--div class="actions pull-right" style="padding:0px;"> 
			<a class="btn btn-sm btn-info" href="<?php echo e(route('reunion')); ?>" style="padding:2px 10px;"><i class="fa fa-plus"></i> Nouveau</a>
		</div-->
	</header> 
	
	<div class="table-responsive"> 
		<table id="table_courriers" class="table table-striped m-b-none datatable "> 
			<thead> 
				<tr>
					<th width=""></th>
					<th width=""></th>
					<th width="">Numero</th>
					<th width="">Libellé</th>
					<th width="">Ordre du jour</th>
					<th width="">Date de creation</th>
					<th width="">Action</th>
				</tr> 
			</thead> 
			<tbody>
			<?php $__currentLoopData = $reunion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reunion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><a href="<?php echo e(route('DetailsReunion',$reunion->reunion_id)); ?>"><i class="fa fa-cogs text-info" title="Afficher les détails"></i></a></td> 
					<td><span class="btnModifierReunion" data-reunion_id="<?php echo e($reunion->reunion_id); ?>" style="cursor: pointer;"><i class="fa fa-edit text-warning" title="Modifier"></i></span></td> 
					<td><?php echo e($reunion->reunion_id); ?></td>
					<td><?php echo e($reunion->reunion_ordre_jour); ?></td>
					<td><?php echo e($reunion->reunion_libelle); ?></td>
					<td><?php echo e(Stdfn::dateFromDB($reunion->reunion_date_creation)); ?></td>
					<td><span class="btnSupprimerReunion" data-reunion_id="<?php echo e($reunion->reunion_id); ?>" style="cursor: pointer;"><i class="fa fa-times text-danger" title="Supprimer ce reunion"></i></a></td> 
				</tr>	
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</tbody> 
		</table> 
	</div> 
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>