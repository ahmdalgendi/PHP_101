<?php
class Validator{
    // private functions to filter user inputs
    private function filterName($field){
        // Sanitize user name
        $field = filter_var(trim($field), FILTER_SANITIZE_STRING);
        
        // Validate user name
        if(filter_var($field, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
            return true;
        } else{
            return false;
        }
    }    
    private function filterEmail($field){
        // Sanitize e-mail address
        $field = filter_var(trim($field), FILTER_SANITIZE_EMAIL);
        
        // Validate e-mail address
        if(filter_var($field, FILTER_VALIDATE_EMAIL)){
            return true;
        } else{
            return false;
        }
    }
    private function filterString($field){
        // Sanitize string
        $field = filter_var(trim($field), FILTER_SANITIZE_STRING);
        if(!empty($field)){
            return true;
        } else{
            return false;
        }
    }
    public function user_new($user)
    {
        if(!Validator:: filterName($user->name))
        {
            return "Name not good";
        }
        else if (! Validator:: filterEmail($user->email))
        {
            return "wrong email format" ;
        }
        if(strlen($user->password ) < 6){
            return "Password min size = 6";
        }
        $response= "success";
        if (isset($_FILES["file-input"]["tmp_name"])) {
            // Get Image Dimension
            $fileinfo = @getimagesize($_FILES["file-input"]["tmp_name"]);
            $width = $fileinfo[0];
            $height = $fileinfo[1];
            
            $allowed_image_extension = array(
                "png",
                "jpg",
                "jpeg"
            );
            
            // Get image file extension
            $file_extension = pathinfo($_FILES["file-input"]["name"], PATHINFO_EXTENSION);
            
            // Validate file input to check if is not empty
            if (! file_exists($_FILES["file-input"]["tmp_name"])) {
                $response = 
                     "Choose image file to upload."
                ;
            }    // Validate file input to check if is with valid extension
            else if (! in_array($file_extension, $allowed_image_extension)) {
                $response ="Upload valiid images. Only PNG and JPEG are allowed."
                ;
                
            }    // Validate image file size
            else if (($_FILES["file-input"]["size"] > 2000000)) {
                $response ="Image size exceeds 2MB"
                ;
            }   // Validate image file dimension
            else if ($width > "500" || $height > "500") {
                $response =  "Image dimension should be within 300X200"
                ;
            } 
             else {
                
                    $response =  "success";
                
            }
        }
        else {
            return "NO image inserted";
        }
        return $response;        
    }
    public function user_login($user)
    {
        if (!Validator:: filterEmail($user->email) )
        {
            return "wrong email format" ;
        }
        return 'success';
    }
    public function user_update($user)
    {
        if(!Validator:: filterName($user->name) && sizeof($user->name) > 0)
        {
            return "Name not good";
        }
        else if (!Validator:: filterEmail($user->email) && sizeof($user->email) > 0)
        {
            return "wrong email format" ;
        }
        $response= "success";
        if (isset($_POST["upload"])) {
            // Get Image Dimension
            $fileinfo = @getimagesize($_FILES["file-input"]["tmp_name"]);
            $width = $fileinfo[0];
            $height = $fileinfo[1];
            
            $allowed_image_extension = array(
                "png",
                "jpg",
                "jpeg"
            );
            
            // Get image file extension
            $file_extension = pathinfo($_FILES["file-input"]["name"], PATHINFO_EXTENSION);
            
            // Validate file input to check if is not empty
            if (! file_exists($_FILES["file-input"]["tmp_name"])) {
                $response = 
                     "Choose image file to upload."
                ;
            }    // Validate file input to check if is with valid extension
            else if (! in_array($file_extension, $allowed_image_extension)) {
                $response ="Upload valiid images. Only PNG and JPEG are allowed."
                ;
                
            }    // Validate image file size
            else if (($_FILES["file-input"]["size"] > 2000000)) {
                $response ="Image size exceeds 2MB"
                ;
            }    
             else {
                $target = "image/" . basename($_FILES["file-input"]["name"]);
                if (move_uploaded_file($_FILES["file-input"]["tmp_name"], $target)) {
                    $response =  "success";
                } else {
                    $response =  "Problem in uploading image files."
                    ;
                }
            }
        }
        return $response;        
    }

}

