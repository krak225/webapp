@extends('layouts.app')

@section('content')

<ul class="breadcrumb no-border no-radius b-b b-light pull-in"> 
	<li><a href="{{route('home')}}"><i class="fa fa-home"></i> Accueil</a></li>
	<li class="active">Reunion</li> 
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
	<h3 class="m-b-none">Gestion des reunions</h3> 
</div>


<div class="panel panel-default"> 

	<div class="wizard-steps clearfix" id="form-wizard"> 
		<ul class="steps"> 
			<li data-target="#step3" class="active"><span class="badge"><i class="fa fa-plus" ></i></span>Nouvelle reunion</li>
		</ul> 
	</div> 

	<div class="step-content clearfix"> 
		<form method="post" action="{{route('SaveReunion')}}" enctype="multipart/form-data" class="form-horizontal">
			
			{!! csrf_field() !!}
			
			<div class="step-pane active" id="step1"> 
			
				<div class="form-group{{ $errors->has('reunion_ordre_jour') ? ' has-error' : '' }}">
					
					<div class="col-md-12 row" style="display: flex; justify-content:space-between; margin-bottom:25px;">
						
						<div class="col-md-5">
							<span> Ordre du jour<span class="text text-danger"></span></span>
							<input style="padding-top:0px;" placeholder="" type="text" class="form-control" name="reunion_ordre_jour" value="{{ old('reunion_ordre_jour') }}" required>
						</div>

						<div class="col-md-5">
							<span> Privé<span class="text text-danger"></span></span>
							<input style="padding-top:0px;" placeholder="" type="text" class="form-control" name="reunion_pv" value="{{ old('reunion_pv') }}" required>
						</div>
						
					</div>
					
					<div class="col-md-12 row" style="display:flex; justify-content:center; margin-top:10px;">							
						<div class="col-md-2">
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
	<header class="panel-heading"> Liste des reunions
		<!--div class="actions pull-right" style="padding:0px;"> 
			<a class="btn btn-sm btn-info" href="{{route('reunion')}}" style="padding:2px 10px;"><i class="fa fa-plus"></i> Nouveau</a>
		</div-->
	</header> 
	
	<div class="table-responsive"> 
		<table id="table_courriers" class="table table-striped m-b-none datatable "> 
			<thead> 
				<tr>
					<th width=""></th>
					<th width=""></th>
					<th width="">Numero</th>
					<th width="">Ordre du jour</th>
					<th width="">pv</th>
					<th width="">Date de creation</th>
					<th width="">Action</th>
				</tr> 
			</thead> 
			<tbody>
			@foreach($reunion as $reunion)
				<tr>
					<td><a href="{{route('DetailsReunion',$reunion->reunion_id)}}"><i class="fa fa-cogs text-info" title="Afficher les détails"></i></a></td> 
					<td><span class="btnModifierReunion" data-reunion_id="{{$reunion->reunion_id}}" style="cursor: pointer;"><i class="fa fa-edit text-warning" title="Modifier"></i></span></td> 
					<td>{{ $reunion->reunion_id }}</td>
					<td>{{ $reunion->reunion_ordre_jour }}</td>
					<td>{{ $reunion->reunion_pv }}</td>
					<td>{{ Stdfn::dateFromDB($reunion->reunion_date_creation) }}</td>
					<td><span class="btnSupprimerReunion" data-reunion_id="{{$reunion->reunion_id}}" style="cursor: pointer;"><i class="fa fa-times text-danger" title="Supprimer ce reunion"></i></a></td> 
				</tr>	
			@endforeach
			</tbody> 
		</table> 
	</div> 
</section>

@endsection