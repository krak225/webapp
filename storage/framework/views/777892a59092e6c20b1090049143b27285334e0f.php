<!doctype html>
<html lang="en">
<head>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" >

</head>
<body>
    <div class="container">
        <div class="jumbotron">
            <table class="table table-striped table-bordered table-hover">
                <thead class="thead">
                    <tr class="waning">
                        <th>Identifiant</th>
                        <th>Nom</th>
                        <th>couleur</th>
                        <th>Date début</th>
                        <th>Date fin</th>
                        <th>Mise à jour</th>
                        <th>Supprimer </th>
                    </tr>
                </thead>
                <?php $__currentLoopData = $event; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tbody>
                    <tr>
                        <td><?php echo e($event->id); ?></td>
                        <td><?php echo e($event->title); ?></td>
                        <td><?php echo e($event->color); ?></td>
                        <td><?php echo e($event->start_date); ?></td>
                        <td><?php echo e($event->end_date); ?></td>
                        <th><a href="<?php echo e(route('EditEvent', $event->id )); ?>" class="btn btn-success"><i class="fas fa-edit"></i> Editer</a></th>
                        <td><i class="fas fa-trash"></i></td>
                    </tr>
                </tbody>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
        </div>
</div>






</body>
</html>
