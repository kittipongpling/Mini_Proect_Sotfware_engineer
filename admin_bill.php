<?php
$con = new mysqli("localhost", "root", "" , "system_pos");
$con->set_charset("utf-8");


$sql = "SELECT `bill_id` as id,`bill_date` as time FROM `bill` WHERE 1";
 $result = $con->query($sql);

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
                    <a class="nav-link" href="admin_bill.php" data-toggle="" data-target="#">รายการย้อนหลัง</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        ตั้งค่า
                    </a>
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
                        <div class="card-header">
                            รายการอาหาร
                        </div>
                        <table class="table">
  <thead>
            <tr>
            <th scope="col">หมายเลขบิล</th>
            <th scope="col">วันที่สั่งอาหาร</th>
            <th scope="col">จัดการ</th>
            </tr>
  </thead>
  <tbody>
                <?php 
                    foreach($result as $data){
                    
                ?>
        <tr>
            <th scope="row"><?php echo $data['id']; ?></th>
            <td><?php echo $data['time']; ?></td>
            <td>
            <button class="view_data editbtn">SHOW</button>
            <button>e</button>
            <button>d</button>
            </td>
        </tr>
    <?php } ?>
  </tbody>
</table>
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
                        <div class="card-body">
                            <table id="order" class="table">
                                <thead>
                                    <tr>
                                        <th>รายการ</th>
                                        <th class="text-right">จำนวน</th>
                                        <th class="text-right">ราคา</th>
                                    </tr>
                                </thead>
                                <tbody >
                                    <form action="?act=add_orders" methos="GET">
                                    <?php
                                $total = 0;
                                if(isset($_SESSION["intLine"])){
                                for($i=0; $i<=(int)$_SESSION["intLine"]; $i++){
                                    if(!empty($_SESSION["product_id"][$i])){
                                        $total +=  $arr_product[$_SESSION["product_id"][$i]]["product_price"] * $_SESSION["qty"][$i];
                                            if($total >0){
                                               $_SESSION["total"] = $total;
                                            } 
                                               
                                        
                                ?>
                                    <tr>
                                        <td name="n1"><a class="text-danger"
                                                href="?act=delete&product_id=<?php echo $_SESSION["product_id"][$i];?>&line=<?php echo $i;?>">ลบ</a>
                                            <?php echo $arr_product[$_SESSION["product_id"][$i]]["product_name"];
                                            $_SESSION['tae'] = $arr_product[$_SESSION["product_id"][$i]]["product_name"];
                                            ?></td>
                                        <td class="text-right add_orders"><input type="number" name="n2" id=""
                                                value="<?php echo $_SESSION["qty"][$i];?>"
                                                style=" text-align: right;  width: 80px;"></td>
                                        <td class="text-right" name="n3">
                                            ฿<?php echo $arr_product[$_SESSION["product_id"][$i]]["product_price"];?>
                                        </td>
                                    </tr>
                                    <?php 
                                 
                                }
                                 
                                }} 
                                    // $my_array=array($_SESSION)
                                
                                ?>
                                    <tr>
                                        <td class="text-right" colspan="2">รวม</td>
                                        <td class="text-right">฿<?php echo $total;
                                        // $_SESSION['total'] = $total;
                                        ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <button class="btn btn-success btn-lg btn-block" type="submit" onclick="#">  เพิ่มเมนู</button>
                            <button class="btn btn-danger btn-lg btn-block"
                                onClick="window.location='?act=cancel'">ยกเลิก</button>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> รายการอาหาร </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <form action="#" method="POST">

            <div class="modal-body">

                <input type="hidden" name="update_id" id="update_id">

                <div class="form-group">
                    <label> First Name </label>
                    <input type="text" name="fname" id="fname" class="form-control" placeholder="Enter First Name">
                </div>

                <div class="form-group">
                    <label> Last Name </label>
                    <input type="text" name="lname" id="lname" class="form-control" placeholder="Enter Last Name">
                </div>

                <div class="form-group">
                    <label> Course </label>
                    <input type="text" name="" id="course" class="form-control" placeholder="Enter Course">
                </div>

                <div class="form-group">
                    <label> Phone Number </label>
                    <input type="text" name="contact" id="contact" class="form-control" placeholder="Enter Phone Number">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="updatedata" class="btn btn-primary">Update Data</button>
            </div>
        </form>

    </div>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script>
        function add_orders(){
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

        $(".btn-table-no").on("click", function(){
            $(".table-no span").text($(this).attr("data-table-no"));
            $("#exampleModal").modal('hide')
        })
    </script>
    <script>

$(document).ready(function () {
    $('.editbtn').on('click', function() {
        
        $('#editmodal').modal('show');

        
            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);

            $('#update_id').val(data[0]);
            $('#fname').val(data[1]);
            $('#lname').val(data[2]);
            $('#course').val(data[3]);
            $('#contact').val(data[4]);
    });
});

</script>

</body>

</html>