<?php $__env->startSection('content'); ?>
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
    <h1 style="display: flex; justify-content:center;">Les annonces</h1>
    <a href="<?php echo e(route('CreateAnnonce')); ?>" style="display: flex; justify-content:center;"> ajouter une publication</a>
    <section class="panel panel-default"> 
        <header class="panel-heading"> Liste des annonces
        </header> 
        
        <div class="table-responsive"> 
            <table id="table_courriers" class="table table-striped m-b-none datatable "> 
                <thead> 
                    <tr>
                        <th width=""></th>
                        <th width=""></th>
                        <th width="">Numero</th>
                        <th width="">photo</th>
                         <th width="">Date de creation</th>
                        <th width="">Action</th>
                    </tr> 
                </thead> 
                <tbody>
                <?php $__currentLoopData = $annonces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $annonce): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><a href="<?php echo e(route('DetailsAnnonce',$annonce->annonce_id)); ?>"><i class="fa fa-cogs text-info" title="Afficher les détails"></i></a></td> 
                        <td><span class="btnModifierAnnonce" data-reunion_id="<?php echo e($annonce->annonce_id); ?>" style="cursor: pointer;"><i class="fa fa-edit text-warning" title="Modifier"></i></span></td> 
                        <td><?php echo e($annonce->annonce_id); ?></td>
                        <td><?php echo e($annonce->annonce_photo); ?></td>
                        <td><?php echo e($annonce->annonce_fichier); ?></td>
                        <td><?php echo e(Stdfn::dateFromDB($annonce->annonce_date_creation)); ?></td>
                        <td><span class="btnSupprimerAnnonce" data-annonce_id="<?php echo e($annonce->annonce_id); ?>" style="cursor: pointer;"><i class="fa fa-times text-danger" title="Supprimer cette annonce"></i></a></td> 
                    </tr>	
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody> 
            </table> 
        </div> 
    </section>
   
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>