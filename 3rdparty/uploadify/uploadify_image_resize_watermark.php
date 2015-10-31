<?php
include ('../../system/main.php');
include ('../../system/conf.php');
?>
<?php
/*
Uploadify v2.1.4
Release Date: November 8, 2010

Copyright (c) 2010 Ronnie Garcia, Travis Nickels

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
*/
@session_start();
if (!empty($_FILES)) {
	$tempFile = $_FILES['Filedata']['tmp_name'];
	$fileinfo = explode(".",$_FILES['Filedata']['name']);
	$fileinfo[1] = strtolower($fileinfo[1]);
	$filename = time().".".$fileinfo[1];
	$targetPath = UPLOAD_FILE_FULL_PATH;
	$targetFile =  str_replace('//','/',$targetPath) . $filename;
	
	$source_image_path_only = UPLOAD_FILE_FULL_PATH;
	$source_image_path = UPLOAD_FILE_FULL_PATH . $filename;
	
	$thumbnail_image_path = UPLOAD_FILE_THUMB_FULL_PATH;
	
	move_uploaded_file($tempFile,$targetFile);
	
	if ($fileinfo[1] == "jpg" || $fileinfo[1] == "jpeg" || $fileinfo[1] == "png" || $fileinfo[1] == "gif"){
		
        generate_image_thumbnail($source_image_path,$thumbnail_image_path,'250-250-' . $filename ,250,250);
        generate_image_thumbnail($source_image_path,$source_image_path_only,'500-500-' . $filename ,500,500);
        unlink($targetFile);
     }
     echo $filename;
} 


function generate_image_thumbnail($source_image_path, $thumbnail_image_path,$thumbname,$width,$height)
{
    list($source_image_width, $source_image_height, $source_image_type) = getimagesize($source_image_path);
    switch ($source_image_type) {
        case IMAGETYPE_GIF:
            $source_gd_image = imagecreatefromgif($source_image_path);
            break;
        case IMAGETYPE_JPEG:
            $source_gd_image = imagecreatefromjpeg($source_image_path);
            break;
        case IMAGETYPE_PNG:
            $source_gd_image = imagecreatefrompng($source_image_path);
            break;
    }
    if ($source_gd_image === false) {
        return false;
    }
    $source_aspect_ratio = $source_image_width / $source_image_height;
    $thumbnail_aspect_ratio = $width / $height;
    if ($source_image_width <= $width && $source_image_height <= $height) {
        $thumbnail_image_width = $source_image_width;
        $thumbnail_image_height = $source_image_height;
    } elseif ($thumbnail_aspect_ratio > $source_aspect_ratio) {
        $thumbnail_image_width = (int) ($height * $source_aspect_ratio);
        $thumbnail_image_height = $height;
    } else {
        $thumbnail_image_width = $width;
        $thumbnail_image_height = (int) ($width / $source_aspect_ratio);
    }
    $thumbnail_gd_image = imagecreatetruecolor($thumbnail_image_width, $thumbnail_image_height);
    imagecopyresampled($thumbnail_gd_image, $source_gd_image, 0, 0, 0, 0, $thumbnail_image_width, $thumbnail_image_height, $source_image_width, $source_image_height);
    imagejpeg($thumbnail_gd_image, $thumbnail_image_path . $thumbname, 90);
    imagedestroy($source_gd_image);
    imagedestroy($thumbnail_gd_image);
    
    
	if($width > 200){    
	    $mark = imagecreatefrompng(UPLOAD_FILE_FULL_PATH . "watermark.png");
		list($mwidth, $mheight) = getimagesize(UPLOAD_FILE_FULL_PATH . "watermark.png");
		$img = imagecreatefromjpeg($thumbnail_image_path . $thumbname);
		
		$white = imagecolorallocate($img, 255, 255, 255);
		$grey = imagecolorallocate($img, 128, 128, 128);
		$black = imagecolorallocate($img, 0, 0, 0);
		
		list($bwidth, $bheight) = getimagesize($thumbnail_image_path . $thumbname);
		imagecopy($img, $mark, $bwidth - ($mwidth + 10) , $bheight - ($mheight + 10), 0, 0, $mwidth, $mheight);
		
		//imagettftext($img, $bwidth - ($mwidth + 10) , $bheight - ($mheight + 10), 0, 0, $black, 'verdana', 'vahicle.lk');
		
		imagejpeg($img, $thumbnail_image_path . $thumbname, 100);
		imagedestroy($img);
	}            
    return true;
}
?>