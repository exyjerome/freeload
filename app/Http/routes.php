<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return View::make('index');
});
Route::get('/upload', function(){
    return view("index");
});
Route::post('/upload', 'UploadController@Upload');

Route::get('/upload/error/', function() {
	return view('uplerr');
});
Route::get('/api/', function() {
	return view('api');
});
Route::get('/image/{filename}', function($filename){
	$path = "/var/www/html/public/image/" . $filename;
	if(!File::exists($path)) abort(404);
	$file = File::get($path);
    $type = File::mimeType($path);
    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    return $response;
});

Route::get('/list', function(){
	$files = File::files("/var/www/html/public/image/");
	foreach($files as $file){
		$f[] = pathinfo($file);
	}
	return var_dump($f);
});

/*
	{variable}
	{optionalVariable?}
*/
