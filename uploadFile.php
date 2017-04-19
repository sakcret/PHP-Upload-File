<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
$file_upload_dir=dirname(__FILE__).'/uploads/';
//$file_upload_dir = './uploads/';
$max_file_size=12582912;//12Mb
$out['msg']='';
$out['subject']='';
$out['status']=FALSE;
if ($_SERVER['REQUEST_METHOD']==='POST') {
    $file=$_FILES['file_upload']['tmp_name'];
    if (file_exists($file)) {
        $up_filename = $file_upload_dir . basename($_FILES['file_upload']['name']);
        $file_size = $_FILES['file_upload']['size'];
        $file_type = $_FILES['file_upload']['type'];
        //validate file size
        if (($file_size <= $max_file_size)){ 
            //initialize directory
            if (!file_exists($file_upload_dir)) {
                mkdir($file_upload_dir, 0777, true);
            }  
            if (move_uploaded_file($_FILES['file_upload']['tmp_name'], $up_filename)) {
                $out['subject'] ='Success: File uploaded';
                $out['msg']='File uploaded successfully.'; 
                $out['status']=TRUE;
            } else {
                $out['subject'] ='Error: File not uploaded';
                $out['msg']='Could not move file, check access permissions.'; 
            }
        } else {
            $out['subject'] ='Error: File not uploaded';
            $out['msg']='File size is higher than allowed.'; 
        }
    }else{
        $out['subject'] ='Error: File not found';
        $out['msg']='File not uploaded or file size is higher than allowed.'; 
    }
}else{
    $out['subject'] ='Error: File not uploaded';
   $out['msg']='File not selected or wrong request method.'; 
}

echo '<pre>';
print_r($out);
print "</pre>";

?>

