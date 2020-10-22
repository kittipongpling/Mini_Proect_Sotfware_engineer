<?php   
 //load_data_select.php  
 $connect = mysqli_connect("localhost", "root", "", "system_pos");  
 function fill_brand($connect)  
 {  
      $output = '';  
      $sql = "SELECT * FROM bill group by `bill_date`";  
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '<option value="'.$row["bill_date"].'">'.$row["bill_date"].'</option>';  
      }  
      return $output;  
 }  
 function fill_product($connect)  
 {  
      $output = '';  
      $sql = "SELECT * FROM product";  
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '<div class="col-md-3">';  
           $output .= '<div style="border:1px solid #ccc; padding:20px; margin-bottom:20px;">'.$row["product_name"].'';  
           $output .=     '</div>';  
           $output .=     '</div>';  
      }  
      return $output;  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Webslesson Tutorial | Multiple Image Upload</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
      </head>  
      <body>  
           <br /><br />  
           <div class="container">  
                <h3>  
                <!-- <input type="date" name="brand" id="brand"> -->
                     <select name="brand" id="brand">  
                          <option value="">Show All Product</option>  
                          <?php echo fill_brand($connect); ?>  
                     </select>  
                     <select name="" id="">  
                          <option value="">Show Orders</option>  
                           
                     </select>  
                     <br /><br />  
                     <div class="row" id="show_product">  
                          
                     </div>  
                </h3>  
           </div>  
          <?php
          $sql = "SELECT
          product_name,
          bill.bill_id as id
      FROM
          bill LEFT JOIN orders ON bill.bill_id = orders.bill_id
           LEFT JOIN products ON orders.product_id = products.product_id
      WHERE bill.bill_date = '2020-09-26' order by bill.bill_id";

$result = mysqli_query($connect, $sql);  


?>

                              <?php
                                   foreach($result as $key =>$data){
                              ?>
          <div class="col-md-3">
               <div style="border:1px solid #ccc; padding:20px; margin-bottom:20px;">
                    <?php
                         for($result )
                              echo $data['id'][''];
                          
                         
                    ?>
               </div>
          </div>
                                   <?php } ?>






      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#brand').change(function(){  
           var brand_id = $(this).val();  
           $.ajax({  
                url:"load_data.php",  
                method:"POST",  
                data:{brand_id:brand_id},  
                success:function(data){  
                     $('#show_product').html(data);  
                }  
           });  
      });  
 });  
 </script>