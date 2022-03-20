@extends('layout')
@section('content')
<div class="page-header">
	<h3 class="page-title"> Patients </h3>
</div>
<div class="row">
	<div class="col-md-12 grid-margin stretch-card">
		<div class="card">
		  <div class="card-body">
			<table class="table table-bordered" id="patTable">
				<thead>
					<tr>
						<th>Id</th>
						<th>Name</th>
						<th>Email Id</th>
					</tr>
				</thead>
				<tbody>
					@foreach($patients as $patient)
					<tr>
						<td>{{ $patient->id }}</td>
						<td>{{ $patient->name }}</td>
						<td>{{ $patient->email }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		  </div>
		</div>
	</div>
</div>
@endsection
@push('scripts')
<script>
$(document).ready(function() {
    $('#patTable').DataTable();
});
// $("#datetime").datetimepicker({
    // format: 'yyyy-mm-dd hh:ii',
    // autoclose: true
// });

$(function () {
	$('#datetime').datetimepicker({
		format:'M-d-Y',
		// useCurrent: false,
	});
});
</script>
@endpush