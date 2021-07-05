@extends('layouts.app')

@section('content')
@if(!empty($reunion))
<ul class="breadcrumb no-border no-radius b-b b-light pull-in"> 
	<li><a href="{{ route('home') }}"><i class="fa fa-home"></i> Accueil</a></li> 
	<li><a href="{{ route('reunion') }}">Reunion</a></li> 
	<li class="active">{{ ucfirst(strtolower($reunion->reunion_id)) }}</li> 
</ul> 

<div class="m-b-md"> 
	<h3 class="m-b-none">{{ $reunion->reunion_odre_jour }}</h3>
</div>

@if(Session::has('warning'))
	<div class="alert alert-warning">
	  {{Session::get('warning')}}
	</div>
@endif

<style type="text/css">

.title{
	padding:0px 15px;
}

.dz-preview, .dz-file-preview {
    display: none;
}
#table_justifs{
    border: 1px solid #eee;
	margin-top:0px;
}
#table_justifs th{
    background:#eee;	
}


.select-checkbox option::before {
  content: "\2610";
  width: 1.3em;
  text-align: center;
  display: inline-block;
}
.select-checkbox option:checked::before {
  content: "\2611";
}


ul.no_liste_item li {
  list-style:none;
}

.bold{font-weight:bold;}

</style>

<div class="panel panel-default"> 

		<div class="col-lg-12" style="position: relative; transform:translate(-20%,0%); left:40%; top:60%; ; padding-top:15px;padding-left: 0px;padding-right: 0px;"> 
		<div class="row0"> 
			
			<div class="col-sm-7"> 
				<section class="panel panel-default"> 
					<header class="panel-heading bg-info lt no-border title"> 
						<div class="clearfix"> 
							<div class="clear"> 
							<div class="h3 m-t-xs m-b-xs text-white">
							<small style="color:white;">Informations sur la reunion</small>
							<span class="btnModifierReunion pull-right " data-reunion_id="{{$reunion->reunion_id}}" style="cursor: pointer;"><i class="fa fa-edit text-white" title="Modifier"></i></span>
						
							</div>  
							</div> 
						</div> 
					</header> 
					<div class="list-group no-radius alt"> 
						<div class="list-group-item"> 
							<span class="badge bg-light" style="background: none;"><span class="label label-default" style="font-size: 100%;">{{ Stdfn::truncateN($reunion->reunion_id,5) }}</span></span> 
							<i class="fa fa- icon-muted"></i> Numéro de la Reunion
						</div> 
						<span class="list-group-item"> 
							<span class="badge bg-light">{{ $reunion->reunion_ordre_jour }}</span> 
							<i class="fa fa- icon-muted"></i> Odre du jour
						</span>		
						<span class="list-group-item"> 
							<span class="badge bg-light">{{ $reunion->reunion_pv }}</span> 
							<i class="fa fa- icon-muted"></i> pv
						</span>		
						<span class="list-group-item"> 
							<span class="badge bg-light">{{ Stdfn::dateTimeFromDB($reunion->reunion_date_creation) }}</span> 
							<i class="fa fa- icon-muted"></i> Date enregistrement
						</span> 
						

					</div> 
					
				</section>
			</div>
					
		
			
		</div> 
		</div> 
		
		<br style="clear:both;"/>	
</div>

			{{-- liste participants --}}
			<section class="panel panel-default"> 
				<header class="panel-heading"> Liste des participants
				</header> 
				
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
						@foreach($participants as $participant)
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
				
			


	


@else

<ul class="breadcrumb no-border no-radius b-b b-light pull-in"> 
	<li><a href="{{ route('home') }}"><i class="fa fa-home"></i> Accueil</a></li> 
	<li><a href="{{ route('produits') }}">Produits</a></li> 
</ul> 

<div class="m-b-md"> 
	<h3 class="m-b-none">Produit introuvable</h3> 
</div>

<div class="panel"> 

	<div class="col-lg-12" style="padding:15px;"> 
		Le produit que vous recherchez n'a pas été trouvé!
	</div> 
	
	<br style="clear:both;"/>
	
</div>	

@endif

@endsection