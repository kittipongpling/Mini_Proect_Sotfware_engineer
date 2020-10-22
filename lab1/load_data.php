<?php  
 //load_data.php  
 $connect = mysqli_connect("localhost", "root", "", "system_pos");  
 $output = '';  

 if(isset($_POST["brand_id"]))  
 {  

      if($_POST["brand_id"] != '')  
      {  
        //    $sql = "SELECT * FROM product WHERE brand_id = '".$_POST["brand_id"]."'";  
           $sql = "SELECT * FROM `bill` WHERE `bill_date` = '".$_POST["brand_id"]."'";

           
      }  
      else  
      {  
        //    $sql = "SELECT * FROM product"; 
        echo "555555"; 
      }  
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '<div class="col-md-3"><div id="tae"  style="border:1px solid #ccc; padding:20px; margin-bottom:20px;">'.$row["bill_id"].'</div></div>';  
      }  
      echo $output;  
 }  
 
 ?>  
 <script>
 
 </script>