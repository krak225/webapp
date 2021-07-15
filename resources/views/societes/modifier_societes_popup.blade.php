<div class="panel panel-default"> 

	<div class="step-content clearfix"> 
	
		<form id="formModifierSociete" method="post" action="{{route('SaveModifierSociete')}}"  class="form-horizontal">
		
			<input type="hidden" name="societe_id" value="{{$societe->societe_id}}"/>
			
			{!! csrf_field() !!}
			
			<div class="step-pane active" id="step1"> 
			
				<div class="form-group">
					
					<div class="col-md-12 row" style="display: flex; justify-content:center;">
						
						<div class="col-md-5">
							<span> Nom de la société <span class="text text-danger">*</span></span>
						
							<input type="text" class="form-control" name="societe_nom" id="societe_nom" value="{{old($societe->societe_nom)}}">
						</div>
					</div>
					    <div class="col-md-12 row" style="display:flex; justify-content:center; margin-top:10px;">	

						<div class="col-md-2 pull-right">
							<span>&nbsp; <span class="text text-danger"></span></span>
							<button type="button" id="btnSaveModifierSociete" class="btn btn-success btn-sm rounded">ENREGISTRER</button> 
						</div>
						
					</div>
					
				

				
			</div> 

		  </div>

   </form>
		
		 
	
	</div>
	
	
</div>
