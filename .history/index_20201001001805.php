<?php
session_start();
if(!isset($_SESSION["account_info"])){
    header("location:login.php");
}
// session_destroy();

$con = new mysqli("localhost", "root", "" , "system_pos");
$con->set_charset("utf-8");


if(isset($_GET["act"]) && $_GET["act"] == "add" && isset($_GET["product_id"])){

    if(!isset( $_SESSION["intLine"])){
        $_SESSION["intLine"] = 0;
        $_SESSION["product_id"][0] = $_GET["product_id"];
        $_SESSION["qty"][0] = 0;
    }

        $key = array_search($_GET["product_id"],  $_SESSION["product_id"]);
        if((string)$key != ""){
           echo $_SESSION["qty"][$key] = $_SESSION["qty"][$key] +1;
        }else{
            $_SESSION["intLine"] = $_SESSION["intLine"] + 1;
            $newLine = $_SESSION["intLine"];
            $_SESSION["product_id"][$newLine] = $_GET["product_id"];
            $_SESSION["qty"][$newLine] = 1;
        }

    header('location:./');
        
    // echo "<pre>";
    // print_r($_SESSION);
    // echo "</pre>";
   
}elseif(isset($_GET["act"]) && $_GET["act"] == "delete"){ // ส่วนของการลบสินค้าในตะกร้า
	if(isset($_GET["line"]) && isset($_GET["product_id"])){
		unset($_SESSION["product_id"][$_GET["line"]]);
		unset($_SESSION["qty"][$_GET["line"]]);
    }
		
		header("location:./");
}elseif(isset($_GET["act"]) && $_GET["act"] == "cancel"){
    unset($_SESSION["intline"]);
    unset($_SESSION["product_id"]);
    unset($_SESSION["qty"]);
    header('location:./');
}
elseif(isset($_GET["act"]) && $_GET["act"] == "add_orders"){
   echo $_POST['n1'];
    echo $_POST['n2'];
    echo $_POST['n3'];
    header('location:./');
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
    <style>
        input[type='number'] {
            border: 0px;
        }
    </style>
</head>

<body onload="startTime()">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">FOOD PANCAKE</a>
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
                    <a class="nav-link" href="#" data-toggle="" data-target="#">รายการย้อนหลัง</a>
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
                        <div class="card-body">
                            <div class="row">
                                <?php
                                $sql =  "SELECT * FROM products WHERE 1";
                                $result = $con->query($sql);
                                $arr_product = array();
                                while($rows = $result->fetch_assoc()){
                                    $arr_product[$rows["product_id"]] = $rows;
                            ?>
                                <div class="col-lg-3">
                                    <div class="card">
                                        <img src="data:image/jpeg;base64,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"
                                            class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title" style="text-align: center;"><?php echo $rows["product_name"];?> <h6 style="text-align: center;"><?php echo $rows["product_price"];?></h6></h5>
                                            <a href="?act=add&product_id=<?php echo $rows["product_id"];?>"
                                                class="btn btn-primary btn-block">เพิ่ม</a>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 order-1">
                    <div class="card">
                        <div class="card-header">
                            <div class="table-no d-inline-block">
                                โต๊ะที่ <span>(ยังไม่เลือกโต๊ะ)</span>
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
                                               
                                         ?><br><?php
                                         
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
                            <button class="btn btn-success btn-lg btn-block" type="submit"> <a href="./chekbill.php?id="> สั่งออเดอร์</a></button>
                            <button class="btn btn-danger btn-lg btn-block"
                                onClick="window.location='?act=cancel'">ยกเลิก</button>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">เลือกโต๊ะ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                        <?php
                            $sql =  "SELECT * FROM tables WHERE 1";
                            $result = $con->query($sql);
                            while($rows = $result->fetch_assoc()){
                        ?>
                            <div class="col-2 pb-2"><button class="btn btn-info btn-block btn-table-no" data-table-no="<?php echo $rows["table_no"];?>"><?php echo $rows["table_no"];?></button></div>
                        <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
</body>

</html>