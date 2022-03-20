@extends('layout')
@section('content')
<div class="page-header">
	<h3 class="page-title"> Create Appointment </h3>
</div>
<div class="row">
	<div class="col-md-12 grid-margin stretch-card">
		<div class="card">
		  <div class="card-body">
			<form method="POST" action="{{ url(Request::segment(1).'/appointments/store') }}">
				@csrf
			  <div class="form-group row">
				<label for="patient_id" class="col-sm-3 col-form-label">Patient</label>
				<div class="col-sm-9">
				  {{ Form::select('patient_id', $data['patient'], '', ['required' => 'true', 'class' => 'form-control']) }}
				</div>
			  </div>
			  <div class="form-group row">
				<label for="department_id" class="col-sm-3 col-form-label">Department</label>
				<div class="col-sm-9">
					{{ Form::select('department_id', $data['department'], '', ['required' => 'true', 'id' => 'department_id', 'class' => 'form-control']) }}
				</div>
			  </div>
			  <div class="form-group row">
				<label for="doctor_id" class="col-sm-3 col-form-label">Doctor</label>
				<div class="col-sm-9">
					{{ Form::select('doctor_id', [], '', ['required' => 'true', 'id' => 'doctor_id', 'class' => 'form-control']) }}
				</div>
			  </div>
			  <div class="form-group row">
				<label for="exampleInputPassword2" class="col-sm-3 col-form-label">Time</label>
				<div class="col-sm-9">
					<input type="date" name="date" id="date" class="form-control" required>
				</div>
			  </div>
			  <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
			  <button class="btn btn-light">Cancel</button>
			</form>
		  </div>
		</div>
	</div>
</div>
@endsection
@push('scripts')
<script>
$(document).ready(function() {
	showDocs($("#department_id").val());
	$('#department_id').on('change', function() {
		var did = $(this).val();
		showDocs(did);
		
	});
	
	function showDocs(did) {
		if(did) {
			$.ajax({
				url: '/{{ Request::segment(1) }}/appointments/getDoctor/'+did,
				type: "GET",
				data : {"_token":"{{ csrf_token() }}"},
				dataType: "json",
				success:function(data) {
					if(data){
						$('#doctor_id').empty().append('<option value="">-- Select Doctor --</option>');
						$.each(data, function(key, value){
							$('select[name="doctor_id"]').append('<option value="'+ key +'">' + value+ '</option>');
						});
					}else{
						$('#doctor_id').empty();
					}
			  }
			});
		}else{
		  $('#doctor_id').empty();
		}
	}
});
</script>
@endpush