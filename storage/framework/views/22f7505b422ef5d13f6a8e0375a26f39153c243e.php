<?php $__env->startSection('content'); ?>

<ul class="breadcrumb no-border no-radius b-b b-light pull-in"> 
	<li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-home"></i> Accueil</a></li>
	<li class="active">Presence du personnel</li> 
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
	<h3 class="m-b-none">Gestion du personnel</h3> 
</div>


<div class="panel panel-default"> 

	<div class="wizard-steps clearfix" id="form-wizard"> 
		<ul class="steps"> 
			<li data-target="#step3" class="active"><span class="badge"><i class="fa fa-plus" ></i></span>Creation d'une nouvel présence</li>
		</ul> 
	</div> 

	<div class="step-content clearfix"> 
		<form method="post" action="<?php echo e(route('SaveProduit')); ?>" enctype="multipart/form-data" class="form-horizontal">
			
			<?php echo csrf_field(); ?>

			
			<div class="step-pane active" id="step1"> 
			
				<div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
					
					<div class="col-md-12 row">
						
						<div class="col-md-4">
							<span> Nom et prénom <span class="text text-danger">*</span></span>
							<input placeholder="" type="text" class="form-control" name="name"  value="<?php echo e(old('name')); ?>" required>
						</div>
						
						<div class="col-md-3">
							<span> contact <span class="text text-danger"></span>*</span>
							<input style="padding-top:0px;" placeholder="" type="text" class="form-control" name="number" value="<?php echo e(old('number')); ?>" required>
						</div>
						
						<div class="col-md-5">
							<span>Email  <span class="text text-danger">*</span></span>
							<input style="padding-top:0px;" placeholder="" type="emali" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required>
						</div>

					</div>
					
					<div class="col-md-12 row" style="margin-top:10px;">	
						
						<div class="col-md-5">
							<span>Fonction <span class="text text-danger">*</span></span>
							<input style="padding-top:0px;" placeholder="" type="text" class="form-control" name="fonction" value="<?php echo e(old('fonction')); ?>" required>
							
						</div>
						
                        <div class="col-md-5">
							<span>Société <span class="text text-danger">*</span></span>
							<input style="padding-top:0px;" placeholder="" type="text" class="form-control" name="society" value="<?php echo e(old('society')); ?>" required>	
						</div>
												
						<div class="col-md-2 mt-5">
							<span>&nbsp; <span class="text text-danger"></span></span>
							<button type="submit" class="btn btn-success btn-sm rounded">ENREGISTRER</button> 
						</div>
						
					</div>
					
				</div>

				
			</div> 
			
		</form>
		
		 
	
	</div>
	
	
</div>


<section class="panel panel-default"> 
	<header class="panel-heading"> Liste de presence
		<!--div class="actions pull-right" style="padding:0px;"> 
			<a class="btn btn-sm btn-info" href="<?php echo e(route('produits')); ?>" style="padding:2px 10px;"><i class="fa fa-plus"></i> Nouveau</a>
		</div-->
	</header> 
	
	<div class="table-responsive"> 
		<table id="table_courriers" class="table table-striped m-b-none datatable "> 
			<thead> 
				<tr>
					<th width=""></th>
					<th width=""></th>
					<th width="">Nom et Prénom</th>
					<th width="">Contact</th>
					<th width="">Email</th>
					<th width="">Fonction</th>
					<th width="">Société</th>
				</tr> 
			</thead> 
			<tbody>
			
			</tbody> 
		</table> 
	</div> 
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>