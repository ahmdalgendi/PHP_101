<?php
$targetDir = "D:\Work\PHP\Native\php_file_upload";
if(is_array($_FILES)) {
if(is_uploaded_file($_FILES['myfile']['tmp_name'])) {
if(move_uploaded_file($_FILES['myfile']['tmp_name'],"$targetDir/".$_FILES['myfile']['name'])) {
echo "File uploaded successfully";
}
}
}

var_dump($_FILES);
?>
<form action="" enctype="multipart/form-data" method="POST" name="frm_user_file">
<input type="file" name="myfile" /> 
<input type="submit" name="submit" value="Upload" />
</form>