<!doctype html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>


    <style>
        /* ... */
    </style>
</head>
<body>
    <div class="container">
        <h1 class="d-flex justify-content-center">Mon calendrier</h1>
        <br>
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
        <div class="jumbotron">
            <div class="row pb-3 d-flex justifycontent-center">
                <a href="/ajouterevenement" class="btn btn-success mb-2">Ajouter un évènement</a>
                <a href="/editerevenement" class="btn btn-primary mb-2">Editer un évènement</a>
                <a href="/deleteevenement" class="btn btn-danger mb-2">Supprimer un évènement</a>
            </div>
            <div class="row">
                <div class="col-md-12 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="display:flex; justify-content:center; background: #2e6da4; color: white; padding:10px 10px;" >
                           <a href="#" class="text-uppercase" style="color: white;">Agenda</a>
                        </div>
                        <div class="panel-body"> 
                                <?php echo $calendar->calendar(); ?>

                                <?php echo $calendar->script(); ?> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" ></script>

</body>
</html>
