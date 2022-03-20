@extends('layout')
@section('content')
<div class="page-header">
	<h3 class="page-title"> Appointments </h3>
	@if(Auth::guard('admin')->check() || Auth::guard('patient')->check())
	<a href="{{ url(Request::segment(1).'/appointments/create') }}" class="btn btn-block btn-lg btn-gradient-primary mt-4">+ Add Appointment</a>
	@endif
</div>
<div class="row">
	<div class="col-md-12 grid-margin stretch-card">
		<div class="card">
		  <div class="card-body">
			<table class="table table-bordered" id="appTable">
				<thead>
					<tr>
						<th>Id</th>
						<th>Patient</th>
						<th>Department</th>
						<th>Doctor</th>
						<th>Created By</th>
						<th>Date Time</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					@foreach($appointments as $apps)
					<tr>
						<td>{{ $apps->id }}</td>
						<td>{{ $apps->patient->name }}</td>
						<td>{{ $apps->doctor->department->name }}</td>
						<td>{{ $apps->doctor->name }}</td>
						<td>{{ $apps->created_by }}</td>
						<td>{{ date("d-m-Y", strtotime($apps->apdate)) }}</td>
						<td>
						@php
						if($apps->status == "Fixed")
							$cls ="badge badge-info";
						if($apps->status == "Completed")
							$cls ="badge badge-success";
						if($apps->status == "Cancelled")
							$cls ="badge badge-danger";
						@endphp
						@if(((Auth::guard('admin')->check()) || ($apps->status == "Completed")|| ($apps->status == "Cancelled")) || (Request::segment(1) == "patient"))
							<a class="{{$cls}}" style="cursor:pointer;text-decoration:none;">
						@else
							<a class="{{$cls}}" style="cursor:pointer;text-decoration:none;" onclick="statusChange('{{$apps->id}}', '{{$apps->status}}');">
						@endif
						{{ $apps->status }}</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		  </div>
		</div>
	</div>
</div>
<div class="modal fade" id="updateStauts" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
	<div class="modal-dialog">
		<div class="modal-content">
    		<div class="modal-body">
				<div class="row">
					<div class="col-lg-24">
						<div class="p-5">
							<form action="{{route('appointments.update')}}" method="post">
								{{ csrf_field() }}
								<div class="text-center">
									<h1 class="h4 text-gray-900 mb-4">Appointments Details</h1>
								</div>
								<div class="form-group row">
									<label for="status" class="col-sm-3 col-form-label">Status</label>
									<div class="col-sm-9">
									{{ Form::select('status', ['Fixed' => 'Fixed', 'Completed' => 'Completed', 'Cancelled' => 'Cancelled'], '', ['id' => 'status', 'class' => 'form-control']) }}
									</div>
									<input type="hidden" id="hiddId" name="hiddId">
									<label for="update" class="col-sm-3 col-form-label"></label>
									<div class="col-sm-3">
									<button type="submit" class="btn btn-gradient-secondary btn-fw" id="statusSubmit">Update</button>
									</div>
								</div>								
							</form>
						</div>
					</div>
                </div>
			</div>
		</div>
	</div>
</div>
@endsection
@push('scripts')
<script>
$(document).ready(function() {
    $('#appTable').DataTable();
});

function statusChange(id, status) {
	$('#updateStauts').modal('show');
	$('#hiddId').val(id);
	$('#status').val(status);
}
</script>
@endpush