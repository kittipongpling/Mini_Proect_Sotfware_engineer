<?php

    if (isset($_GET["p_id"])) { ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>แก้ไขเมนู</title>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="icon" type="image/png"
        href="https://scontent.fkkc3-1.fna.fbcdn.net/v/t1.0-9/119980752_337785307574954_1757152202764221432_o.jpg?_nc_cat=105&ccb=2&_nc_sid=09cbfe&_nc_eui2=AeEdQ3uuMUpSNsKpHfjvpUDro1XX0a4IIyujVdfRrggjKx0oaTlnEEJRQqIYyg0KJMUxDMwjlPd-dN2hT7EGYqeo&_nc_ohc=0bT4uczorNcAX96yl_4&_nc_ht=scontent.fkkc3-1.fna&oh=6b8d05997d7e1dd2078a3062bc4a3886&oe=5FBB4911" /> -->
    <!-- การลิ้ง css bootstrap เเบบ cdn -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- การลิ้ง javascript ของ bootstrap เเบบ cdn -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- การลิ้ง sweetalert2 เเบบ cdn  -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

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

    <div class="container my-5 px-0 1">

        <!--Section: Content-->
        <section class="p-5 my-md-5 text-center">

            <?php

                    //นำเข้าไฟล์ การเชื่อมต่อฐานข้อมูล
                    $con = new mysqli("localhost", "root", "" , "system_pos");
                    $sql = "SELECT * FROM `products` WHERE `product_id` ='{$_GET["p_id"]}'";
                    $result = mysqli_query($con, $sql);

                    // เเสดงข้อมูลจากฐานข้อมูล
                    while ($item = mysqli_fetch_assoc($result)) { ?>
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <!-- Material form login -->
                    <div class="card">

                        <!--Card content-->
                        <div class="card-body">

                            <!-- Form -->
                            <form class="text-center" style="color: #757575;" action="" method="POST">
                                <h3 class="font-weight-bold my-4 pb-2 text-center text-danger">เเก้ไขสินค้า </h3>
                                <div class="form-group">
                                    <input type="text" value="<?php echo $item["product_name"]; ?>" class="form-control"
                                        required autofocus placeholder="ชื่อสินค้า" name="p_name" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" value="<?php echo $item["product_detail"]; ?>"
                                        required placeholder="รายละเอียด" name="p_detail" required>
                                </div>
                                <div class="form-group">
                                    <input type="number" class="form-control" value="<?php echo $item["product_price"]; ?>"
                                        required placeholder="ราคา" name="p_price" required>
                                </div>
                                

                                <div class="text-center">
                                    <input type="submit" name="SubmitUpdate" value="เเก้ไข" class="btn btn-warning">
                                </div>

                            </form>
                            <!-- Form -->

                        </div>

                    </div>
                    <!-- Material form login -->
                </div>
            </div>


            <?php
                    } ?>

        </section>
        <!--Section: Content-->
    </div>
    <!-- จบ คลาส container -->

    <?php

            if (isset($_POST["SubmitUpdate"])) {
                //นำเข้าไฟล์ การเชื่อมต่อฐานข้อมูล
                $con = new mysqli("localhost", "root", "" , "system_pos");
                //คำสั่ง SQL บันทึกข้อมูลลงฐานข้อมูล
                // $sqlUp = "UPDATE tbl_products SET p_name = '{$_POST["p_name"]}', p_price = '{$_POST["p_price"]}', p_count = '{$_POST["p_count"]}' 
                //       WHERE p_id = '{$_GET["p_id"]}';";
                $sqlUp = "UPDATE
                                `products`
                            SET
                                `product_name` = '{$_POST["p_name"]}',
                                `product_detail` = '{$_POST["p_detail"]}',
                                `product_price` = '{$_POST["p_price"]}'
                            WHERE
                                `product_id` = '{$_GET["p_id"]}'";

                if (mysqli_query($con, $sqlUp)) {
                    echo
                        "<script> 
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'เเก้ไขข้อมูลสำเร็จ',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(()=> location = 'index.php')
                </script>";
                } else {
                    echo
                        "<script> 
                    Swal.fire({
                        icon: 'error',
                        title: 'เเก้ไขข้อมูลไม่สำเร็จ', 
                        text: 'โปรดตรวจสอบความถูกต้องของข้อมูล!',
                    }) 
                </script>";
                }
                mysqli_close($con);
            }

            ?>

    </bodyclass=>

</html>

<?php
    }
?>