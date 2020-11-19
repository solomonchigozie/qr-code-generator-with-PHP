<?php 

    if(isset($_POST) && !empty($_POST)) {

    include('library/phpqrcode/qrlib.php'); 
     
    $image_location = "qrcodes/";

    $image_name = date('d-m-Y-h-i-s').'.png';

    $dataContent = $_POST['dataContent'];
    $ecc = $_POST['ecc'];
    $size = $_POST['size'];

    // generating the QR code
    QRcode::png($dataContent, $image_location.$image_name, $ecc, $size); 
    
    // displaying the QR code on the web page
    echo '<img class="img-thumbnail" src="'.$image_location.$image_name.'" />';
    
    } else {
        header('location:./');
    }
?>