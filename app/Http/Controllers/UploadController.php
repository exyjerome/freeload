<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Input;
use Validator;
use Redirect;
use Request;
use Session;
use File;

class UploadController extends BaseController{
	
	public function upload(){
		$file = Input::file('file');
		$destination = public_path() . "/image/";
		$maxSize = 10 * 1000000;
		if( $file->isValid() ){
			if( $file->getSize() < $maxSize ){
				$ext = strtolower($file->getClientOriginalExtension());
				if( $ext == "png" || $ext == "jpg" || $ext == "jpeg" ){
					$md5 = md5($file->getClientOriginalName());
					if(File::exists($md5 ."." . $ext)){
						return Redirect::to('image/' . $md5 . "." . $ext);
					}
					$file->move($destination, $md5 ."." . $ext);
					return Redirect::to('image/' . $md5 . "." . $ext);
				}else{
					return Redirect::to('upload/error/')->with('error', "Filetype not supported!");
				}
			}else{
				return Redirect::to('upload/error/')->with('error', "Filesize is too large!");
			}
		}


	}

}

?>