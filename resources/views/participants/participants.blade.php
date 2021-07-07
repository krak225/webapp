@extends('layouts.app')

@section('content')

<ul class="breadcrumb no-border no-radius b-b b-light pull-in"> 
	<li><a href="{{route('home')}}"><i class="fa fa-home"></i> Accueil</a></li>
	<li class="active">participants</li> 
</ul> 


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

<div class="m-b-md"> 
	<h3 class="m-b-none">Gestion des participants</h3> 
</div>


<div class="panel panel-default"> 

	<div class="wizard-steps clearfix" id="form-wizard"> 
		<ul class="steps"> 
			<li data-target="#step3" class="active"><span class="badge"><i class="fa fa-plus" ></i></span>Nouveau participant</li>
		</ul> 
	</div> 

	<div class="step-content clearfix"> 
		<form method="post" action="{{route('SaveParticipant')}}" class="form-horizontal">
			
			{!! csrf_field() !!}
			
			<div class="step-pane active" id="step1"> 
			
				<div class="form-group{{ $errors->has('participant_nom') ? ' has-error' : '' }}">
					
					<div class="col-md-12 row" style="display:flex; flex-direction:column;">
						<div class="card" style="display: flex; justify-content:center; margin-bottom:10px;">
						<div class="col-md-4">
							<span> Nom et Prénom <span class="text text-danger">*</span></span>
							<input placeholder="" type="text" class="form-control" name="participant_nom"  value="{{ old('participant_nom') }}" required>
						</div>
						
						<div class="col-md-4">
							<span> Contact<span class="text text-danger"></span></span>
							<input style="padding-top:0px;" placeholder="" type="text" class="form-control" name="participant_contact" value="{{ old('participant_contact') }}">
						</div>

						<div class="col-md-">
							<span> Email<span class="text text-danger"></span></span>
							<input style="padding-top:0px;" placeholder="" type="text" class="form-control" name="participant_email" value="{{ old('participant_email') }}">
						</div>
					</div>
					<div class="card" style="margin-bottom: 10px;">
						<div class="col-md-4" style="margin-left: 45px;">
							<span> Fonction<span class="text text-danger"></span></span>
							<input style="padding-top:0px;" placeholder="" type="text" class="form-control" name="participant_fonction" value="{{ old('participant_fonction') }}">
						</div>

						<div class="col-md-4">
							<span> Société<span class="text text-danger"></span></span>
							<input style="padding-top:0px;" placeholder="" type="text" class="form-control" name="participant_society" value="{{ old('participant_society') }}">
						</div>
					</div>	

					</div>
					
					<div class="col-md-12 row" style="display:flex; justify-content:center; margin-top:10px;">	
						<div class="col-md-2" >
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
	<header class="panel-heading>Liste des participants</header> 
	
	<div class="table-responsive"> 
		<table id="table_courriers" class="table table-striped m-b-none datatable "> 
			<thead> 
				<tr>
					<th width=""></th>
					<th width=""></th>
					<th width="">Nom</th>
					<th width="">Contact</th>
					<th width="">Email</th>
					<th width="">Fonction</th>
					<th width="">Société</th>
					<th width="">Date de creation</th>
					<th width="">Action</th>
				</tr> 
			</thead> 
			<tbody>
			@foreach($participant as $participant)
				<tr>
					<td><a href="{{route('DetailsParticipant',$participant->participant_id)}}"><i class="fa fa-cogs text-info" title="Afficher les détails"></i></a></td> 
					<td><span class="btnModifierParticipant" data-participant_id="{{$participant->participant_id}}" style="cursor: pointer;"><i class="fa fa-edit text-warning" title="Modifier"></i></span></td> 
					<td>{{ $participant->participant_nom }}</td>
					<td>{{ $participant->participant_contact }}</td>
					<td>{{ $participant->participant_email }}</td>
					<td>{{ $participant->participant_fonction }}</td>
					<td>{{ $participant->participant_society }}</td>
					<td>{{ Stdfn::dateFromDB($participant->participant_date_creation) }}</td>
					<td><span class="btnSupprimerParticipant" data-participant_id="{{$participant->participant_id}}" style="cursor: pointer;"><i class="fa fa-times text-danger" title="Supprimer ce participant"></i></a></td> 
				</tr>	
			@endforeach
			</tbody> 
		</table> 
	</div> 
</section>

@endsection