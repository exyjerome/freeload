@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.2.4/foundation.min.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.2.4/foundation.min.js"></script>
@endpush
<!DOCTYPE html>
<html>
<head>
	<title>freeload::api</title>
	@stack('scripts')
</head>
	<style type="text/css">
		.row:first-child{
			margin-top: 20px;
		}
		body{
			height: auto;
		}
		.mtop{
			margin-top: 10px;
		}
	</style>
<body>
	<div class="expanded row">
		<div class="small-8 small-offset-2 columns">
			<h1 class="float-center">
				<a href="/">freeload<small> v1</small></a>
			</h1>
			<hr>

			<code>{{ Request::url() }}/v1/upload</code>
			<p>POST only, returns direct image link.</p>
			<hr>
			<code>{{ Request::url() }}/v1/delete/{image}/{token}</code>
			<p>On upload you will receive a {token}, <strong>don't lose it, its only returned once!</strong> which you can use to delete the image</p>
		</div>
	</div>
</body>
</html>