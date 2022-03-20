@extends('layout')
@section('content')
<div class="page-header">
	<h3 class="page-title"> Doctor </h3>
</div>
<div class="row">
	<div class="col-md-12 grid-margin stretch-card">
		<div class="card">
		  <div class="card-body">
			<table class="table table-bordered" id="docTable">
				<thead>
					<tr>
						<th>Id</th>
						<th>Name</th>
						<th>Email Id</th>
						<th>Department</th>
					</tr>
				</thead>
				<tbody>
					@foreach($doctors as $doc)
					<tr>
						<td>{{ $doc->id }}</td>
						<td>{{ $doc->name }}</td>
						<td>{{ $doc->email }}</td>
						<td>{{ $doc->department->name }}</td>
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
    $('#docTable').DataTable();
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