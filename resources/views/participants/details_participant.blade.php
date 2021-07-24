@extends('layouts.app')

@section('content')
@if (!empty($participant))
<ul class="breadcrumb no-border no-radius b-b b-light pull-in"> 
	<li><a href="{{ route('home') }}"><i class="fa fa-home"></i> Accueil</a></li> 
	<li><a href="{{ route('participants') }}">Participants</a></li> 
	<li class="active">{{ ucfirst(strtolower($participant->participant_nom)) }}</li> 
</ul> 

<div class="m-b-md"> 
	<h3 class="m-b-none">{{ $participant->participant_nom }}</h3>
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

		<div class="col-lg-12" style="position: relative; transform:translate(-20%,0%); left:40%; top:60%; padding-top:15px;padding-left: 0px;padding-right: 0px;"> 
		<div class="row0"> 
			
			<div class="col-sm-7"> 
				<section class="panel panel-default"> 
					<header class="panel-heading bg-info lt no-border title"> 
						<div class="clearfix"> 
							<div class="clear"> 
							<div class="h3 m-t-xs m-b-xs text-white">
							<small style="color:white;">Informations sur le participant</small>
							<span class="btnModifierParticipant pull-right " data-participant_id="{{$participant->participant_id}}" style="cursor: pointer;"><i class="fa fa-edit text-white" title="Modifier"></i></span>
						
							</div>  
							</div> 
						</div> 
					</header> 
					<div class="list-group no-radius alt"> 
						<div class="list-group-item"> 
							<span class="badge bg-light" style="background: none;"><span class="label label-default" style="font-size: 100%;">{{ Stdfn::truncateN($participant->participant_id,5) }}</span></span> 
							<i class="fa fa- icon-muted"></i> Numéro du participant
						</div> 
						<span class="list-group-item"> 
							<span class="badge bg-light">{{ $participant->participant_nom }}</span> 
							<i class="fa fa- icon-muted"></i> Nom 
						</span>
						<span class="list-group-item"> 
							<span class="badge bg-light">{{ $participant->participant_contact }}</span> 
							<i class="fa fa- icon-muted"></i> Contact 
						</span>
						<span class="list-group-item"> 
							<span class="badge bg-light">{{ $participant->participant_email }}</span> 
							<i class="fa fa- icon-muted"></i> Email 
						</span>	
						<span class="list-group-item"> 
							<span class="badge bg-light">{{ $participant->participant_fonction }}</span> 
							<i class="fa fa- icon-muted"></i> Fonction 
						</span>
						<span class="list-group-item"> 
							<span class="badge bg-light">{{ $participant->participant_society }}</span> 
							<i class="fa fa- icon-muted"></i> Société 
						</span>				
					
						<span class="list-group-item"> 
							<span class="badge bg-light">{{ Stdfn::dateTimeFromDB($participant->participant_date_creation) }}</span> 
							<i class="fa fa- icon-muted"></i> Date enregistrement
						</span> 
						

					</div> 
					
				</section>
			</div>
		
		
			
		</div> 
		</div> 
		
		<br style="clear:both;"/>	
</div>

	
		
	@else
	<ul class="breadcrumb no-border no-radius b-b b-light pull-in"> 
		<li><a href="{{ route('home') }}"><i class="fa fa-home"></i> Accueil</a></li> 
		<li><a href="{{ route('participants') }}">Participants</a></li> 
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