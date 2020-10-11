<?php  
 //load_data.php  
 $connect = mysqli_connect("localhost", "root", "", "system_pos");  
 $output = '';  

 if(isset($_POST["brand_id"]))  
 {  

      if($_POST["brand_id"] != '')  
      {  
        //    $sql = "SELECT * FROM product WHERE brand_id = '".$_POST["brand_id"]."'";  
        $sql2 = "SELECT * FROM `bill` WHERE bill_date = '".$_POST["brand_id"]."'";
           $sql = "SELECT
           product_name,
           bill.bill_id as id
       FROM
           bill LEFT JOIN orders ON bill.bill_id = orders.bill_id
            LEFT JOIN products ON orders.product_id = products.product_id
       WHERE bill.bill_date = '".$_POST["brand_id"]."' order by bill.bill_id";
          
           
      }  
      else  
      {  
        //    $sql = "SELECT * FROM product"; 
        echo "555555"; 
      }  
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '<div class="col-md-3"><div style="border:1px solid #ccc; padding:20px; margin-bottom:20px;">'.$row["product_name"].'</div></div>';  
      }  
      echo $output;  
     
 }  
 ?>  