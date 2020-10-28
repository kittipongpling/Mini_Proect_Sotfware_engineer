<?php
 $conn = mysqli_connect("localhost", "root", "", "system_pos");  

echo $name = $_POST['name'];
echo $detail = $_POST['detail'];
echo $price = $_POST['price'];
// echo $image = $_POST['image'];


echo $_POST["avatar_upload"];
if(isset($_POST["avatar_upload"])){
    $verifyimg = getimagesize($_FILES['image']['tmp_name']);
print_r($verifyimg);
    // if($verifyimg['mime'] == 'image/JPG') {
    //     // print "<pre>";
    //     // print_r($verifyimg);
    //     // print "</pre>";
    //     echo "Only PNG images are allowed!";
    //     exit;
    // }    

    $uploaddir = './photo/data_';
    $uploadfile = $uploaddir . basename($_FILES['image']['name']);
   
    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
        echo "File is valid, and was successfully uploaded.<br>";
       
        // mysqli_query($conn,"INSERT INTO total( fname, price, files) VALUES ('$name', '$num', '$uploadfile')");
        mysqli_query($conn,"INSERT INTO `products`(
            `product_name`,
            `product_detail`,
            `product_price`,
            `product_photo`
        )
        VALUES(
            '$name',
            '$detail',
             '$price',
             '$uploadfile'
                )");
?>

<?php
    } else {
        echo "Possible file upload attack!<br>";
    }
    
    echo '<pre>';
    echo 'info:';
   print_r($_FILES);
    print "</pre>";
}

?>

<script>

  setTimeout(function(){ alert("Hello"); });

window.history.back();
</script>