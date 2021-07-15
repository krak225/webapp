<?php $__env->startSection('content'); ?>

<ul class="breadcrumb no-border no-radius b-b b-light pull-in"> 
	<li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-home"></i> Accueil</a></li>
	<li class="active">Sociétés</li> 
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


<div class="m-b-md"> 
	<h3 class="m-b-none">Gestion des Sociétés</h3> 
</div>


<div class="panel panel-default"> 

	<div class="wizard-steps clearfix" id="form-wizard"> 
		<ul class="steps"> 
			<li data-target="#step3" class="active"><span class="badge"><i class="fa fa-plus" ></i></span>Nouvelle société</li>
		</ul> 
	</div> 

	<div class="step-content clearfix"> 
		<form method="post" action="<?php echo e(route('SaveSociety')); ?>" class="form-horizontal">
			
			<?php echo csrf_field(); ?>

			
			<div class="step-pane active" id="step1"> 
			
				<div class="form-group<?php echo e($errors->has('society_nom') ? ' has-error' : ''); ?>">
					
					<div class="col-md-12">
						<div class="col-md-6">
							<span> Nom de la société <span class="text text-danger">*</span></span>
							<input placeholder="" type="text" class="form-control" name="society_nom"  value="<?php echo e(old('society_nom')); ?>" required>
						</div>

						<div class="col-md-1">
							<span>&nbsp; <span class="text text-danger"></span></span>
							<button type="submit" class="btn btn-success btn-sm">ENREGISTRER</button> 
						</div>
					</div>
					
				</div>

				
			</div> 
			
		</form>
		
		 
	
	</div>
	
	
</div>


<section class="panel panel-default"> 
	<header class="panel-heading"> Liste des sociétés
	</header> 
	
	<div class="table-responsive"> 
		<table id="reunions" class="table table-striped m-b-none datatable"> 
			<thead> 
				<tr>
                    <th></th>
                    <th></th>
					<th width="">Nom de la société</th>
					<th width="">Statut</th>
                    <th width="">Date enregistrement</th>
					<th width="">Action</th>
				</tr> 
			</thead> 
			<tbody>
                <?php $__currentLoopData = $society; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $society): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><a href="<?php echo e(route('DetailsSociety',$society->society_id)); ?>"><i class="fa fa-cogs text-info" title="Afficher les détails"></i></a></td> 
					<td><span class="btnModifierSociety" data-society_id="<?php echo e($society->society_id); ?>" style="cursor: pointer;"><i class="fa fa-edit text-warning" title="Modifier"></i></span></td> 
					<td><?php echo e($society->society_nom); ?></td>
                    <td><?php echo e($society->society_statut); ?></td>
					<td><?php echo e(Stdfn::dateFromDB($society->society_date_creation)); ?></td>
					<td><span class="btnSupprimerSociety" data-society_id="<?php echo e($society->society_id); ?>" style="cursor: pointer;"><i class="fa fa-times text-danger" title="Supprimer cette société"></i></a></td> 
				</tr>	
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</tbody> 
		</table> 
	</div> 
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>