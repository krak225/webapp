<!doctype html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                @foreach ($event as $event)
                <tbody>
                    <tr>
                        <td>{{$event->id}}</td>
                        <td>{{$event->title}}</td>
                        <td>{{$event->color}}</td>
                        <td>{{$event->start_date}}</td>
                        <td>{{$event->end_date}}</td>
                        <th><a href="{{ route('EditEvent', $event->id )}}" class="btn btn-success"><i class="fas fa-edit"></i> Editer</a></th>
                        <td><i class="fas fa-trash"></i></td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
</div>


{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script> --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" ></script> --}}

</body>
</html>
