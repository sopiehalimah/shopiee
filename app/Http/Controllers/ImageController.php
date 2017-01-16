<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;


class ImageController extends Controller
{
  public function uploadDragAndDropCKEDITOR(Request $request) {
    $file = array('image' => $request->file('upload'));
    $rules = array('image' => 'required|image',);
    $validator = \Validator::make($file, $rules);
    if ($validator->fails()) {
      return response()->json(
        [
          'uploaded' => 0,
          'error' => [
              'message' => 'File Tidak Valid',
          ]
        ]
      );
    }
    else {
      if ($request->file('upload')->isValid()) {
        $destinationPath = '/upload';
        $extension = $request->file('upload')->getClientOriginalExtension();
        $fileName = uniqid().'.'.$extension;
        $request->file('upload')->move(base_path() . "/public/".$destinationPath, $fileName);
        return response()->json(
          [
            'uploaded' => 1,
            'fileName' => $fileName,
            'url' => "/upload/".$fileName,
          ]
        );
      }
      else {
        return response()->json(
          [
            'uploaded' => 0,
            'error' => [
                'message' => 'Upload Gagal',
            ]
          ]
        );
      }
    }
  }

  public function uploadFileBrowserCKEDITOR(Request $request) {
    $file = array('image' => $request->file('upload'));
    $rules = array('image' => 'required|image',);
    $validator = \Validator::make($file, $rules);
    $funcNum = $_GET['CKEditorFuncNum'] ;
    $CKEditor = $_GET['CKEditor'] ;
    $langCode = $_GET['langCode'] ;
    $token = $_POST['ckCsrfToken'] ;
    if ($validator->fails()) {
      $url = '/path/to/uploaded/file.ext';
      $message = 'File Tidak Valid';
      return "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '', '$message');</script>";
    }
    else {
      if ($request->file('upload')->isValid()) {
        $destinationPath = '/upload';
        $extension = $request->file('upload')->getClientOriginalExtension();
        $fileName = uniqid().'.'.$extension;
        $request->file('upload')->move(base_path() . "/public/".$destinationPath, $fileName);
        $url = "/upload//".$fileName;
        return "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '');</script>";
      }
      else {
        $message = 'Upload Gagal';
        return "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '', '$message');</script>";
      }
    }
  }
}