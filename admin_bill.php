<?php
$con = new mysqli("localhost", "root", "" , "system_pos");
$con->set_charset("utf-8");


$sql = "SELECT `bill_id` as id,`bill_date` as time FROM `bill` WHERE 1";
 $result = $con->query($sql);

?>
<?php   
 //load_data_select.php  
 function fill_brand($con)  
 {  
      $output = '';  
      $sql = "SELECT * FROM bill group by `bill_date`";  
      $result = mysqli_query($con, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '<option value="'.$row["bill_date"].'">'.$row["bill_date"].'</option>';  
      }  
      return $output;  
 }  
 function fill_product($con)  
 {  
      $output = '';  
      $sql = "SELECT * FROM product";  
      $result = mysqli_query($con, $sql);  
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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FOOD PANCAKE</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <style>
        input[type='number'] {
            border: 0px;
        }
    </style>
</head>

<body onload="startTime()">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php?act=1">FOOD PANCAKE</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">ขาย <span class="sr-only">(current)</span></a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);" data-toggle="modal" data-target="#exampleModal">โต๊ะ</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="admin_bill.php" data-toggle="" data-target="#">ดูรายการ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="menu.php" data-toggle="" data-target="#">จัดการเมนู</a>
                </li>
                <li class="nav-item dropdown">
                    <!-- <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        ตั้งค่า
                    </a> -->
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">ไม่มีฟังก์ชั่นนี้</a>
                    </div>
                </li>
            </ul>


            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link">
                        <div id="txt"></div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">ออกจากระบบ</a>
                </li>
            </ul>
        </div>
    </nav>

    <section class="pt-2">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 order-lg-1 order-2">
                    <div class="card">
                   <br><br>
                           
                                    <h3>  
                                    <!-- <input type="date" name="brand" id="brand"> -->
                                        <select name="brand" id="brand">  
                                            <option value="">กรุณาเลือกวัน</option>  
                                            <?php echo fill_brand($con); ?>  
                                        </select>  
                                        <br /><br />  

                                        <div  class="row" id="show_product" >  
                                            
                                        </div>  
                                    </h3>  
                                    <h3>  
                                    <!-- <input type="date" name="brand" id="brand"> -->
                                    <?php
                                        $sql = "SELECT `bill_id` as id,`bill_date` as time FROM `bill` WHERE 1";
                                        $result = $con->query($sql);
                                    ?>
                                        <select name="tae" id="tae">  
                                            <option value="">กรุณาเลือกวัน</option> 
                                            <?php
                                            foreach($result as $data){ 
                                            ?>
                                            <option value="<?php echo $data['id'] ?>"><?php echo $data['id'] ?></option>  
                                            <?php } ?>
                                             
                                        </select>  
                                        <br /><br />  
                                        
                                        <div  class="row" id="show_product" >  
                                            
                                        </div>  
                                        <a name="id_data" id="id_data" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  ดูข้อมูล
</a>
                                    </h3>  
                            
                    </div>
                </div>
                <div class="col-lg-4 order-1">
                    <div class="card">
                        <div class="card-header">
                            <div class="table-no d-inline-block">
                                เพิ่มเมนูอาหาร <span>(#####)</span>
                            </div>
                            <div class="order-date d-inline-block float-right">
                                <?php echo date("Y-m-d");?>
                            </div>
                        </div>
                        <div  class="card-body">
                                <form  enctype="multipart/form-data" class="form-horizontal" action="./upload_photo.php" method="post">
                                <label for=""></label>ชื่อเมนู &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input  style="border:1px solid #ccc; padding:20px; margin-bottom:20px;" type="text" name="name"><br>
                                <label for=""></label>รายละเอียด <input style="border:1px solid #ccc; padding:20px; margin-bottom:20px;" type="text" name="detail"><br>
                                   
                                <label for=""></label>ราคา &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input style="border:1px solid #ccc; padding:20px; margin-bottom:20px;" type="number" name="price" onchange="setTwoNumberDecimal(event)"  step="0.25" value="0.00" /><br>
                                    <label for=""></label>รูปภาพประกาพ
                                    <input style="border:1px solid #ccc; padding:20px; margin-bottom:20px;" type="file" name="image" ><br>
                                
                            <button name="avatar_upload" class="btn btn-success btn-lg btn-block" type="submit" >
                                เพิ่มเมนู</button>
                            <button class="btn btn-danger btn-lg btn-block"
                                onClick="window.location='?act=cancel'">ยกเลิก</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- ********************************************************************** -->

   <!-- Button trigger modal -->
   

                                          


<!-- Modal -->
<form action="./tae.php" method="POST">
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">รายการอาหาร</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                            <div  class="row" id="show_data" name="show_data" >  
                                                                    
                                </div> 
      </div>
      <div class="modal-footer">
      <!-- <a  class="btn btn-secondary" >delete</a> -->
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
    </script>


   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script>
function setTwoNumberDecimal(event) {
    this.value = parseFloat(this.value).toFixed(2);
}

        function add_orders() {
            var x = document.getElementById("add_orders").value;

            console.log(x);
        }

        function startTime() {
            var today = new Date();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            document.getElementById('txt').innerHTML =
                h + ":" + m + ":" + s;
            var t = setTimeout(startTime, 500);
        }

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i
            }; // add zero in front of numbers < 10
            return i;
        }

        $(".btn-table-no").on("click", function () {
            $(".table-no span").text($(this).attr("data-table-no"));
            $("#exampleModal").modal('hide')
        })
    </script>
    
    <script>  
                        $(document).ready(function(){  
                            $('#tae').click(function(){  
                                var id_data = $(this).val();  
                                $.ajax({  
                                        url:"select.php",  
                                        method:"POST",  
                                        data:{id_data:id_data},  
                                        success:function(data){  
                                            $('#show_data').html(data); 

                                        }  
                                });  
                            });  
                        });  
                        </script>  


                            <script>  
                        $(document).ready(function(){  
                            $('#brand').change(function(){  
                                var brand_id = $(this).val();  
                                $.ajax({  
                                        url:"lab1/load_data.php",  
                                        method:"POST",  
                                        data:{brand_id:brand_id},  
                                        success:function(data){  
                                            $('#show_product').html(data);

                                            console.log(data)
                                        }  
                                });  
                            });  
                        });  
                        </script>

 
</body>

</html>