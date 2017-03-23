@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.2.4/foundation.min.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.2.4/foundation.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
@endpush
<!DOCTYPE html>
<html>
<head>
	<title>freeload::main</title>
	@stack('scripts')
</head>
	<style type="text/css">
		.row:first-child{
			margin-top: 20px;
		}
		body{
			height: auto;
		}
		.footer * {
			color: #999999;
		}
	</style>
<body>
	<div class="expanded row">
		<div class="small-6 small-offset-3 columns">
			<h1 class="float-center">
				<a href="/">freeload<small> v1</small></a>
			</h1>
			<hr>
			<div id="alerts"></div>
			{{ Form::open(['url' => '/upload', 'method' => 'POST', 'files' => true ]) }}
				{{ csrf_field() }}
				<input name="file" id="selectFile" type="file" style="display: none">
				<a onClick="document.getElementById('selectFile').click();" class="primary expanded button">Select file</a>
			{{ Form::close() }}
			<p class="text-center">Only <kbd>PNG</kbd> &amp; <kbd>JPEG</kbd> are accepted. Max size 10mb</p>
			<!-- Clever hack adopted from http://stackoverflow.com/a/14806776/4187479 , thanks! -->
			<hr>
			<div class="footer">
				<a href="/api/">
					<small>API</small>
				</a>
				<a class="float-right">
					<small>Developed by Alfi Potter using Laravel</small>
				</a>
			</div>
		</div>
	</div>
	<script>
	$(document).ready(function() {	
		$("input:file").on('change', function(){
			$("form").submit();
		});
	});
	</script>
</body>
</html>