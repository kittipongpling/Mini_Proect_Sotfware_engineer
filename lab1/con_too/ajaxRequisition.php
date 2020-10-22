<?php 
 
 $con = new mysqli("localhost", "root", "" , "system_pos");

if(!empty($_POST["fac"])){ 
echo $_POST["fac"];
    $query = "SELECT
    bill.bill_id AS id
FROM
    orders,
    products,
    bill
WHERE
    orders.product_id = products.product_id 
    AND bill.bill_id = orders.bill_id 
    AND bill.bill_date = ".$_POST['fac']."
GROUP BY
    bill.bill_id"; 
    $result = mysqli_query($con, $query); 
 
    if($result->num_rows > 0){ 
    echo '<option value="">เลือกสาขา </option>'; 
    while($row = $result->fetch_assoc()){  
    echo '<option value="'.$row['id'].'">'.$row['id'].'</option>'; 
    }
    
    }
}
// if(!empty($_POST["major"])){ 

//     $query = "SELECT * FROM user as u , title as t WHERE  u.title_id = t.title_id and code = ".$_POST['major']." "; 
//     $result = mysqli_query($con, $query); 
    
//     if($result->num_rows > 0){ 
//         echo'<table = "table table-bordered " style="width: fix-content;">';
//         echo "<tr>
//         <th>ชื่อ</th>
//         <th>นามสกุล</th>
//         <th>จัดการใบเบิก</th>
//         </tr>";
//     while($row = $result->fetch_assoc()){  
//         echo '<tr>' ;
//         echo '<td >'.$row['name'].'</td>'; 
//         echo '<td >'.$row['lastname'].'</td>'; 
//         echo '<td ><a href="#">ใบเบิก</a></td >';
//         echo '</tr>' ;
//     }
//     echo '</table>' ; 
//     } 
//     }
// else {
    
// }

?>