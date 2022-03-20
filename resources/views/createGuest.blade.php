<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>RBHospital</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">

    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../assets/images/logo-mini.png" />
	
	<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
	
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/datetime/1.1.1/css/dataTables.dateTime.min.css">

  </head>
  <body>
    <div class="container-scroller">
 
        <div class="main-panel">
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
							<label for="name" class="col-sm-3 col-form-label">Enter Name</label>
							<div class="col-sm-9">
							  <input type="text" name="name" id="name" class="form-control" required>
							</div>
						  </div>
						  <div class="form-group row">
							<label for="email" class="col-sm-3 col-form-label">Enter Email</label>
							<div class="col-sm-9">
							  <input type="email" name="email" id="email" class="form-control" required>
							</div>
						  </div>
						  <div class="form-group row">
							<label for="password" class="col-sm-3 col-form-label">Enter Password</label>
							<div class="col-sm-9">
							  <input type="password" name="password" id="password" class="form-control" required>
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
							<label for="Date" class="col-sm-3 col-form-label">Date</label>
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
          </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>


	<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdn.datatables.net/datetime/1.1.1/js/dataTables.dateTime.min.js"></script>

<script>
// $(function() { $('#date').datepicker({ startDate: '-0m', autoclose: true }); });
$(document).ready(function() {
	showDocs($("#department_id").val());
	$('#department_id').on('change', function() {
		var did = $(this).val();
		showDocs(did);
		
	});
	
	function showDocs(did) {
		if(did) {
			$.ajax({
				url: '/guestUser/appointments/getDoctor/'+did,
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
  </body>
</html>