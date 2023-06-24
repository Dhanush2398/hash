<?php
    $filenameee =  $_FILES['file']['name'];
    $fileName = $_FILES['file']['tmp_name']; 
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $jobtitle = $_POST['jobtitle'];
    $skill = $_POST['skill'];

    $education = $_POST['education'];
    $experience = $_POST['experience'];




    $request = $_POST['request'];
    
    $message ="Name = ". $name .  "\r\nLastname = " . $lastname . "\r\nNumber = " . $phone ."\r\nEmail = " . $email . "\r\nAddress = " . $address . 
    
    "\r\nJobtitle = " . $jobtitle .    "\r\nSkill = " . $skill .  "\r\nEducation = " . $education . "\r\nExperience = " . $experience .
    
    
    
    $subject ="website Job application Message";
    $fromname ="Job Application";
    $fromemail = 'noreply@fromyourwebsite.com';  
    $mailto = 'yatishg1122@gmail.com';  

    $content = file_get_contents($fileName);
    $content = chunk_split(base64_encode($content));
   
    $separator = md5(time());
    // carriage return type (RFC)
    $eol = "\r\n";
    // main header (multipart mandatory)
    $headers = "From: ".$fromname." <".$fromemail.">" . $eol;
    $headers .= "MIME-Version: 1.0" . $eol;
    $headers .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" . $eol;
    $headers .= "Content-Transfer-Encoding: 7bit" . $eol;
    $headers .= "This is a MIME encoded message." . $eol;
    // message
    $body = "--" . $separator . $eol;
    $body .= "Content-Type: text/plain; charset=\"iso-8859-1\"" . $eol;
    $body .= "Content-Transfer-Encoding: 8bit" . $eol;
    $body .= $message . $eol;
    // attachment
    $body .= "--" . $separator . $eol;
    $body .= "Content-Type: application/octet-stream; name=\"" . $filenameee . "\"" . $eol;
    $body .= "Content-Transfer-Encoding: base64" . $eol;
    $body .= "Content-Disposition: attachment" . $eol;
    $body .= $content . $eol;
    $body .= "--" . $separator . "--";
    //SEND Mail
    if (mail($mailto, $subject, $body, $headers)) {
        header("Location:applicationsubmited.html");
        
        
    } else {
        echo "mail send ... ERROR!";
        print_r( error_get_last() );
    }