<?php $__env->startSection('content'); ?>

<ul class="breadcrumb no-border no-radius b-b b-light pull-in"> 
	<li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-home"></i> Accueil</a></li>  
	<li><a href="<?php echo e(route('evenementielHome')); ?>"> Infos evenementiel</a></li>   
	<li class="active"><?php echo e($page_title); ?></li> 
</ul> 

<style type="text/css">
	

	.autocomplete-suggestions { -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; border: 1px solid #999; background: #FFF; cursor: default; overflow: auto; -webkit-box-shadow: 1px 4px 3px rgba(50, 50, 50, 0.64); -moz-box-shadow: 1px 4px 3px rgba(50, 50, 50, 0.64); box-shadow: 1px 4px 3px rgba(50, 50, 50, 0.64); }
	.autocomplete-suggestion { padding: 2px 5px; white-space: nowrap; overflow: hidden; }
	.autocomplete-no-suggestion { padding: 2px 5px;}
	.autocomplete-selected { background: #F0F0F0; }
	.autocomplete-suggestions strong { font-weight: bold; color: #000; }
	.autocomplete-group { padding: 2px 5px; font-weight: bold; font-size: 16px; color: #000; display: block; border-bottom: 1px solid #000; }



</style>

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
	<h3 class="m-b-none"><?php echo e($page_title); ?></h3> 
</div>


	
<div class="panel panel-default"> 

	<div class="wizard-steps clearfix" id="form-wizard"> 
		<ul class="steps"> 
			<li data-target="#step3" class="active">Importer un fichier de discussion</li>
		</ul> 
	</div> 

	<div class="step-content clearfix"> 
		<form enctype="multipart/form-data" method="post" action="<?php echo e(route('ImporterEvenements')); ?>" class="form-horizontal">
			
			<?php echo csrf_field(); ?>

			
			<div class="step-pane active" id="step1"> 
			
				<div class="form-group">
					
					<div class="col-md-12 row">	

						<div class="col-md-4">
							<span> Fichier discussions <span class="text text-danger">*</span></span>
							<input placeholder="" type="file" class="form-control" name="fichier_whatsapp" required>
							
						</div>
						
					</div>
					
				</div>

			</div> 

			<div class="line line-lg pull-in"></div>

			<div class="actions pull-right"> 
				<button type="reset" class="btn btn-danger btn-sm">ANNULER</button> 
				<button type="submit" id="btnSaveVisite" class="btn btn-primary btn-sm">IMPORTER</button> 
			</div>	

		</form>
		
		 
	
	</div>
	
	
</div>

<section class="panel panel-default"> 
	<header class="panel-heading"><?php echo e($page_title); ?></header> 
	
	<div class="table-responsive"> 
		<table id="table_visiteurs" class="table table-striped m-b-none datatable someClass"> 
			<thead>
				<tr>
					<th></th>
					<th width="">Numéro</th>
					<th width="">Image</th>
					<th width="">Publié par</th>
					<th width="">Publié le</th>
					<th width="">MAP</th>
					<th width="">MP</th>
					<th width="">Facturation</th>
					<th width="">Paiement</th>
				</tr>
			</thead>
			<tbody>
				<?php $__currentLoopData = $evenements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $evenement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><a href="<?php echo e(route('DetailsEvenement',$evenement->evenement_id)); ?>"><i class="fa fa-cogs text-info" title="Détails d'un événement"></i></a></td>
					<td><span class="label label-default"><?php echo e(Stdfn::truncateN($evenement->evenement_id,5)); ?></span></td> 
					<td width=""><img src="<?php echo e(asset('evenements/'.$evenement->evenement_image)); ?>" style="width:50px;"/></td>
					<td width=""><?php echo e($evenement->evenement_publie_par); ?></td>
					<td width=""><?php echo e(Stdfn::dateTimeFromDB($evenement->evenement_date_publication)); ?></td>
					<td width=""><?php echo e(number_format($evenement->evenement_montant_a_paye, 0, '', ' ')); ?></td>
					<td width=""><?php echo e(number_format($evenement->evenement_montant_paye, 0, '', ' ')); ?></td>
					<td width=""><span class="label label-<?php echo e(strtolower(str_replace(' ', '',$evenement->evenement_statut_facturation))); ?>"><?php echo e($evenement->evenement_statut_facturation); ?></span></td>
					<td width=""><span class="label label-<?php echo e(strtolower(str_replace(' ', '',$evenement->evenement_statut_paiement))); ?>"><?php echo e($evenement->evenement_statut_paiement); ?></span></td>
				</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</tbody> 
		</table> 
	</div> 
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>