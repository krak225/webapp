@extends('layouts.app')

@section('content')

<ul class="breadcrumb no-border no-radius b-b b-light pull-in"> 
	<li><a href="{{route('home')}}"><i class="fa fa-home"></i> Accueil</a></li>
	<li class="active">Sociétés</li> 
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


<div class="m-b-md"> 
	<h3 class="m-b-none">Gestion des Sociétés</h3> 
</div>


<div class="panel panel-default"> 

	<div class="wizard-steps clearfix" id="form-wizard"> 
		<ul class="steps"> 
			<li data-target="#step3" class="active"><span class="badge"><i class="fa fa-plus" ></i></span>Nouvelle société</li>
		</ul> 
	</div> 

	<div class="step-content clearfix"> 
		<form method="post" action="{{route('SaveSociete')}}" class="form-horizontal">
			
			{!! csrf_field() !!}
			
			<div class="step-pane active" id="step1"> 
			
				<div class="form-group{{ $errors->has('societe_nom') ? ' has-error' : '' }}">
					
					<div class="col-md-12">
						<div class="col-md-6">
							<span> Nom de la société <span class="text text-danger">*</span></span>
							<input placeholder="" type="text" class="form-control" name="societe_nom"  value="{{ old('societe_nom') }}" required>
						</div>

						<div class="col-md-1">
							<span>&nbsp; <span class="text text-danger"></span></span>
							<button type="submit" class="btn btn-success btn-sm">ENREGISTRER</button> 
						</div>
					</div>
					
				</div>

				
			</div> 
			
		</form>
		
		 
	
	</div>
	
	
</div>


<section class="panel panel-default"> 
	<header class="panel-heading"> Liste des sociétés
	</header> 
	
	<div class="table-responsive"> 
		<table id="reunions" class="table table-striped m-b-none datatable"> 
			<thead> 
				<tr>
                    <th></th>
                    <th></th>
					<th width="">Nom de la société</th>
					<th width="">Statut</th>
                    <th width="">Date enregistrement</th>
					<th width="">Action</th>
				</tr> 
			</thead> 
			<tbody>
                @foreach($societe as $societe)
				<tr>
					<td><a href="{{route('DetailsSociete',$societe->societe_id)}}"><i class="fa fa-cogs text-info" title="Afficher les détails"></i></a></td> 
					<td><span class="btnModifierSociete" data-societe_id="{{$societe->societe_id}}" style="cursor: pointer;"><i class="fa fa-edit text-warning" title="Modifier"></i></span></td> 
					<td>{{ $societe->societe_nom }}</td>
                    <td>{{ $societe->societe_statut}}</td>
					<td>{{ Stdfn::dateFromDB($societe->societe_date_creation) }}</td>
					<td><span class="btnSupprimerSociete" data-societe_id="{{$societe->societe_id}}" style="cursor: pointer;"><i class="fa fa-times text-danger" title="Supprimer cette société"></i></a></td> 
				</tr>	
			@endforeach
			</tbody> 
		</table> 
	</div> 
</section>

@endsection