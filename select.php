<?php include('../BaseModel/condb.php'); ?>

  <?php 
 $_POST["employee_id"];
 
 
     //  echo $_POST["employee_id"];
      $output = '';  
      $query = "SELECT
      product_name
  FROM
      orders
  LEFT JOIN 
       products 
  
  ON
      orders.product_id = products.product_id
  WHERE 
       bill_id = 72";  

     //  $query = "SELECT * FROM `user` WHERE `Id_card` = '".$_POST["employee_id"]."'";  

      $result = mysqli_query($connect, $query);  
      if(mysqli_num_rows($result)>=1){
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">'; 
    
      while($row = mysqli_fetch_array($result))  
      {  
           
          
           $output .= '  
                    
                <tr>  
                     <td width="30%"><label>วิชา</label></td>  
                     <td width="70%">'.$row["name"].'</td>  
                     
                </tr>  
               
           ';  
      }  
      $output .= '  
           </table>  
      </div>  
      ';  
      echo $output;  
     }else{
          echo "ไม่มีสอน";
     }

 ?>