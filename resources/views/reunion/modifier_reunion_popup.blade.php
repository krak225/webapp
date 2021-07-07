<div class="panel panel-default"> 

	<div class="step-content clearfix"> 
	
		<form id="formModifierReunion" method="post" action="{{route('SaveModifierReunion')}}"  class="form-horizontal">
		
			<input type="hidden" name="reunion_id" value="{{$reunion->reunion_id}}"/>
			
			{!! csrf_field() !!}
			
			<div class="step-pane active" id="step1"> 
			
				<div class="form-group">
					
					<div class="col-md-12 row" style="display: flex; justify-content:center;">
						
						<div class="col-md-5">
							<span> Ordre du jour <span class="text text-danger">*</span></span>
						
							<textarea name="reunion_ordre_jour" id="reunion_ordre_jour" class="text-area-1" required>{{ $reunion->reunion_ordre_jour }}</textarea>
						</div>
						
						<div class="col-md-5">
							<span>Libelle<span class="text text-danger"></span></span>
							<textarea name="reunion_libelle" id="reunion_libelle" class="text-area-1" >{{ $reunion->reunion_libelle }}</textarea>
						</div>
					</div>
					    <div class="col-md-12 row" style="display:flex; justify-content:center; margin-top:10px;">	

						<div class="col-md-2 pull-right">
							<span>&nbsp; <span class="text text-danger"></span></span>
							<button type="button" id="btnSaveModifierReunion" class="btn btn-success btn-sm rounded">ENREGISTRER</button> 
						</div>
						
					</div>
					
				

				
			</div> 

		  </div>

   </form>
		
		 
	
	</div>
	
	
</div>
