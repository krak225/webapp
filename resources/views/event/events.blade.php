<!doctype html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>


    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-decoration: none;
        }
        .jumbotron .event-button .event{
            display: flex;
            justify-content: center;
            align-items: center;
            width: 250px;
        }
        .jumbotron .event-button{
            left: 50%;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="d-flex justify-content-center">Mon calendrier</h1>
        <br>
        @if(Session::has('warning'))
        <div class="alert alert-warning">
          {{Session::get('warning')}}
        </div>
    @endif
    
    @if(Session::has('message'))
        <div class="alert alert-success">
          {{Session::get('message')}}
        </div>
    @endif
    
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul style="padding-left: 5px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container">
        <div class="jumbotron">
            <div class="row event-button pb-3 ">
                <div class="event"><a href="/ajouterevenement" class="btn btn-success mb-2">Ajouter un évènement</a></div> 
                <div class="event"><a href="/afficherevenement" class="btn btn-info mb-2">Afficher les évènements</a></div> 
                <div class="event"><a href="/editerevenement" class="btn btn-primary mb-2">Editer un evenement</a></div>
                <div class="event"><a href="/deleteevenement" class="btn btn-danger mb-2">Supprimer un évènement</a></div> 
            </div>
            <div class="row">
                <div class="col-md-12 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="display:flex; justify-content:center; background: #2e6da4; color: white; padding:10px 10px;" >
                           <a href="#" class="text-uppercase" style="color: white;">Agenda</a>
                        </div>
                        <div class="panel-body"> 
                            {!! $calendar->calendar() !!}
                            {!! $calendar->script() !!} 
                            
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
