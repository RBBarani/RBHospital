@extends('layout')
@section('content')
<div class="page-header">
	<h3 class="page-title"> PDF </h3>
</div>
<div class="row">
	<div class="col-lg-12 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Upload Pdf files</h4>
				<form action="{{url(Request::segment(1).'/uploadpdf')}}" method="post" enctype="multipart/form-data">
				@csrf
				<input type="text" name="name" placeholder="Pdf Name" required>
				<input type="file" name="file" accept="application/pdf" required>
				<input type="submit" value="Upload">
				</form>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-6 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
			<h4 class="card-title">PDF List</h4>
			<table class="table table-bordered" id="pdfTable">
				<thead>
				<tr>
					<td>Id</td>
					<td>Name</td>
				</tr>
				</thead>
				<tbody>
				@php
				$i = 1;
				@endphp
				@foreach($pdf as $file)
				<tr>
					<td>{{$i}}</td>
					<td><a style="cursor:pointer;" onclick="viewPdf('{{$file->id}}', '{{$file->name}}', '{{$file->file}}');">{{$file->name}}</a></td>
				</tr>
				@php
				$i++;
				@endphp
				@endforeach
				</tbody>
			</table>
			</div>
		</div>
	</div>
	<div class="col-lg-6 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
			<h4 class="card-title">Preview</h4>
			@if(count($pdf) > 0)
			<h4 class="card-title" id="pdfName">{{ $pdf[0]->name }}</h4>
			<iframe height="400" width="400" id="pdfSrc" src="/uploads/{{ $pdf[0]->file }}"></iframe>
			@endif
			</div>
		</div>
	</div>
</div>
@endsection
@push('scripts')
<script>
$(document).ready(function() {
    $('#pdfTable').DataTable();
});
function viewPdf(id, name, file) {
	$("#pdfName").text(name);
	var srcFile = "/uploads/"+file;
	$("#pdfSrc").attr("src", srcFile);
}
</script>
@endpush