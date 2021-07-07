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
        <div class="jumbotron">
            <div class="row">
                <div class="col-md-12 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading mt-2" style="display:flex; justify-content:center; background: #2e6da4; color: white; padding:10px 10px;" >
                           <a href="#" class="text-uppercase" style="color: white;">Agenda</a>
                        </div>
                        <div class="panel-body">
                            <h1 class="d-flex justify-content-center text-uppercase fs-4 pt-2 pb-2">Ajouter des Données</h1>
                            <form method="POST" action="<?php echo e(route('SaveEvent')); ?>">
                                <?php echo e(csrf_field()); ?>

                                <label for="event_title">Evènement</label>
                                <input type="text" class="form-control mb-5"    name="event_title"      placeholder="Entrez le nom de l'évènement " required>
                                <label for="event_color">Entrez votre couleur</label>
                                <input type="color" class="form-control mb-5"   name="event_color"      placeholder="Choisissez la couleur de l'évènement" required>
                                <label for="event_date_start">Date de début </label>
                                <input type="date" class="form-control mb-5"    name="event_date_start" placeholder="Choisissez la date de début de l'évènement" required>
                                <label for="">Date de fin</label>
                                <input type="date" class="form-control mb-5"    name="event_date_end"    placeholder="Choisissez la date de fin de l'évènement" required>

                                <input type="submit" name="submit" class="btn btn-primary" value="Ajouter un évènement">
                            </form>
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
