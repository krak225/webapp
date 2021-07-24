<?php $__env->startSection('content'); ?>
    
        <div class="container">
            <h4>Publier une annonce</h4>
            <hr>
            <form method="POST" action="<?php echo e(route('SaveAnnonce')); ?>" enctype="multipart/form-data" class="form-horizontal">
                <?php echo csrf_field(); ?>

            <div class="col-md-8 row">
                <span>Fichier</span>
               <input type="file" class="form-control" name="annonce_fichier" id="annonce_fichier" required>
            </div>
            <div class="col-md-12 row" style="padding: 10px 0px">
                <div class="col-md-4 pull-left">
                    <button type="reset" class="btn btn-danger">Annuler</button>
                </div>
                <div class="col-md-5 pull-right">
                    <button type="submit" class="btn btn-success">Enregister</button>
                </div>
               
            </div>
        </form>
        </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>