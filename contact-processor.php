
<?php
if(isset($_POST['submit'])) {
   // Retrieve form data
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $checkbox = $_POST['checkbox'];
    $checkbox_str = implode(',', $checkbox);
    $email = $_POST['email'];
    $pricerange = $_POST['price-range'];
    $pricerange2 = $_POST['price-range2'];
    $projectdescription = $_POST['project-description'];
    
    $headers = "From: $firstname" ." " . $lastname . "\r\n" .
    "Services: $checkbox_str" . "\r\n" . "Price range: $pricerange2 " . "\r\n" . "Email: $email" . "\r\n" . "Project Description: $projectdescription";
    
    
    // send email
if(mail("info@designingwithtega.com","Film Festival", $headers)){
    echo "Successfully Registered";
}
else{
    echo "Failed to send";
}


}

?>