<?php  
 //load_data.php  
 $connect = mysqli_connect("localhost", "root", "", "system_pos");  
 $output = '';  

 if(isset($_POST["id_data"]))  
 {  

      if($_POST["id_data"] != '')  
      {  
        //    $sql = "SELECT * FROM product WHERE brand_id = '".$_POST["brand_id"]."'";  
           $sql = "SELECT
           products.product_name as name
       FROM
           orders,products
       WHERE
           orders.product_id = products.product_id AND orders.bill_id = '".$_POST["id_data"]."'";

           
      }  
      else  
      {  
        //    $sql = "SELECT * FROM product"; 
        echo "555555"; 
      }  
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '<div class="col-md-3"><div style="border:1px solid #ccc; padding:20px; margin-bottom:20px;">'.$row["name"].'</div></div>';  
      }  
      echo $output;  
 }  
 ?>  