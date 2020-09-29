<?php
date_default_timezone_set('Asia/Bangkok');
session_start();
$con = new mysqli("localhost", "root", "" , "system_pos");
$con->set_charset("utf-8");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>คิดยอดเงิน</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link href='https://fonts.googleapis.com/css?family=Raleway:600,400' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="./chekbill.css">

</head>
<body>
<!-- Built from referencing Vladyslav Tyzun's Dribbble shot: https://dribbble.com/shots/2738907-PayPal-Email-Receipt -->

<pre>
<?php
 $array_product_id = $_SESSION["product_id"];
 $array_product_num = $_SESSION["qty"];

 $sql = "INSERT INTO `bill`(
    `bill_id`,
    `bill_total`,
    `bill_num`,
    `bill_date`
	)
		VALUES(
				NULL,
				0,
				0,
					CURRENT_TIMESTAMP()

)
 ";
 $result = $con->query($sql);
 $lastID = $con->insert_id;
 echo $lastID;

foreach($array_product_id as $key => $data){
	$sql =  "INSERT INTO `orders`(
		`order_id`,
		`product_id`,
		`num`,
		`bill_id`
	)
	VALUES(
		NULL,
		$data,
		$array_product_num[$key],
		$lastID
	)";
	$result = $con->query($sql);
	print_r($sql);
}
$sql = "UPDATE
`bill`
SET
`bill_total` = (SELECT SUM(product_price) as price FROM products,orders WHERE products.product_id = orders.product_id),
`bill_num` = (SELECT SUM(num) AS num FROM `orders`)

WHERE
`bill_id`= $lastID";
$result = $con->query($sql);

$sql ="SELECT
products.product_name AS name,
products.product_price AS price,
bill.bill_total AS total,
bill.bill_num AS N_total,
orders.num AS num,
max(bill.bill_id)
bill.bill_date AS time 
FROM
`bill`,
orders,
products
WHERE
bill.bill_id = orders.bill_id AND orders.product_id = products.product_id
AND orders.bill_id = MAX(bill.bill_id)
";
$result_data = $con->query($sql);




// $arr_product = array();

?>
</pre>



<div class="receipt">
	
	<header class="header">
		<div class="header__top">
			<div class="header__logo">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25.58 30.18"><defs><style>.a{fill:#253b80;}.b{fill:#179bd7;}.c{fill:#222d65;}</style></defs><title>PayPal</title><path class="a" d="M7.27,29.15l0.52-3.32-1.16,0H1.06L4.93,1.29A0.32,0.32,0,0,1,5,1.1,0.32,0.32,0,0,1,5.24,1h9.38C17.73,1,19.88,1.67,21,3a4.39,4.39,0,0,1,1,1.92,6.92,6.92,0,0,1,0,2.64V8.27l0.53,0.3a3.69,3.69,0,0,1,1.07.81,3.78,3.78,0,0,1,.86,1.94,8.2,8.2,0,0,1-.12,2.81,9.9,9.9,0,0,1-1.15,3.18,6.55,6.55,0,0,1-1.83,2,7.4,7.4,0,0,1-2.46,1.11,12.26,12.26,0,0,1-3.07.35H15.12a2.2,2.2,0,0,0-2.17,1.85l-0.06.3L12,28.78l0,0.22a0.18,0.18,0,0,1-.06.13,0.15,0.15,0,0,1-.1,0H7.27Z"/><path class="b" d="M23,7.67h0q0,0.27-.1.55c-1.24,6.35-5.47,8.55-10.87,8.55H9.33A1.34,1.34,0,0,0,8,17.89H8L6.6,26.83,6.2,29.36a0.7,0.7,0,0,0,.7.81h4.88a1.17,1.17,0,0,0,1.16-1l0-.25,0.92-5.83L14,22.79a1.17,1.17,0,0,1,1.16-1h0.73c4.73,0,8.43-1.92,9.51-7.48,0.45-2.32.22-4.26-1-5.62A4.67,4.67,0,0,0,23,7.67Z"/><path class="c" d="M21.75,7.15L21.17,7l-0.62-.12a15.28,15.28,0,0,0-2.43-.18H10.77a1.17,1.17,0,0,0-1.16,1L8,17.6l0,0.29a1.34,1.34,0,0,1,1.32-1.13h2.75c5.4,0,9.64-2.19,10.87-8.55C23,8,23,7.85,23,7.67a6.59,6.59,0,0,0-1-.43Z"/><path class="a" d="M9.61,7.7a1.17,1.17,0,0,1,1.16-1h7.35a15.28,15.28,0,0,1,2.43.18L21.17,7l0.58,0.15L22,7.24a6.69,6.69,0,0,1,1,.43c0.37-2.35,0-3.94-1.27-5.39S17.85,0,14.62,0H5.24A1.34,1.34,0,0,0,3.92,1.13L0,25.9a0.81,0.81,0,0,0,.8.93H6.6L8,17.6Z"/></svg>
            </div>
            <div class="printer" >
   </div>
			<div class="header__meta receipts-wrapper">
				<span class="header__date"><?phpecho $result_data['time']; }?></span>
				<span class="header__serial">0f-113</span>
				<span class="header__number">25042016</span>
			</div>
		</div>
		<div class="header__greeting">
			<span class="header__name">โอ ตามสั่ง</span>
			<span class="header__count">ขอบคุณที่ใช้บริการนะคะ.</span>
			<span class="header__border"></span>
		</div>
		<div class="header__spacing"></div>
	</header>
	
	<section class="cart">
			<h2 class="cart__header">Cart:</h2>
			<ol class="list">
            <?php foreach($result_data as $rows){ ?>
				<li class="list__item">
					<span class="list__name"><?php echo $rows["name"];?></span>
					<span class="list__num"><?php echo $rows["num"];?> </span>
					<span class="list__price">$<?php echo $rows["price"];?></span>
                </li>
            <?php } ?>
				<!-- <li class="list__item">
                    <span class="list__name">กระเพรารวม</span>
					<span class="list__num">2</span>
					<span class="list__price">$125.00</span>
				</li>
				<li class="list__item">
					<span class="list__name"> กระเพราหมูสับ</span>
					<span class="list__num">2</span>
					<span class="list__price">$95.00</span>
				</li> -->
			</ol>	
			<hr class="cart__hr" />
			<footer class="cart__total">
				<h3 class="cart__total-label">Total</h3>
					<span class="list__num"><?php echo $rows['N_total']; ?></span>
				<span class="cart__total-price"><?php echo $rows['total']; ?></span>				
			</footer>
	</section>
	
	<footer class="bar-code">
		<div class="bar-code__code">
			<svg id="d17ac603-1444-403c-9daf-1afe6b3ad839" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 575.2 93.16"><defs><style>.\33 6de76d2-eb0f-431d-be12-6535d9fc4369,.\38 78966b7-abd4-4ef3-86d3-2321f80177f3,.b8e87e45-e06c-4d7b-92d7-30eed261c8dd,.e435b0ed-5ad4-4699-bad7-b1c15cfe3f86{fill:none;stroke:#000;stroke-miterlimit:10;}.\38 78966b7-abd4-4ef3-86d3-2321f80177f3{stroke-width:1.7px;}.e435b0ed-5ad4-4699-bad7-b1c15cfe3f86{stroke-width:3.7px;}.\33 6de76d2-eb0f-431d-be12-6535d9fc4369{stroke-width:7.7px;}.b8e87e45-e06c-4d7b-92d7-30eed261c8dd{stroke-width:5.7px;}</style></defs><title>Example_barcode</title><path class="878966b7-abd4-4ef3-86d3-2321f80177f3" d="M0.85,93.16V0m4,93.16V0m6,93.16V0"/><line class="e435b0ed-5ad4-4699-bad7-b1c15cfe3f86" x1="17.85" y1="93.16" x2="17.85"/><line class="36de76d2-eb0f-431d-be12-6535d9fc4369" x1="25.85" y1="93.16" x2="25.85"/><line class="878966b7-abd4-4ef3-86d3-2321f80177f3" x1="32.85" y1="93.16" x2="32.85"/><line class="b8e87e45-e06c-4d7b-92d7-30eed261c8dd" x1="40.85" y1="93.16" x2="40.85"/><line class="878966b7-abd4-4ef3-86d3-2321f80177f3" x1="46.85" y1="93.16" x2="46.85"/><line class="e435b0ed-5ad4-4699-bad7-b1c15cfe3f86" x1="51.85" y1="93.16" x2="51.85"/><path class="878966b7-abd4-4ef3-86d3-2321f80177f3" d="M60.85,93.16V0m10,93.16V0m4,93.16V0m6,93.16V0m8,93.16V0m4,93.16V0m4,93.16V0m4,93.16V0m6,93.16V0"/><line class="b8e87e45-e06c-4d7b-92d7-30eed261c8dd" x1="116.85" y1="93.16" x2="116.85"/><line class="878966b7-abd4-4ef3-86d3-2321f80177f3" x1="122.85" y1="93.16" x2="122.85"/><line class="b8e87e45-e06c-4d7b-92d7-30eed261c8dd" x1="130.85" y1="93.16" x2="130.85"/><line class="878966b7-abd4-4ef3-86d3-2321f80177f3" x1="138.85" y1="93.16" x2="138.85"/><path class="e435b0ed-5ad4-4699-bad7-b1c15cfe3f86" d="M143.85,93.16V0m8,93.16V0m6,93.16V0m6,93.16V0"/><path class="878966b7-abd4-4ef3-86d3-2321f80177f3" d="M170.85,93.16V0m6,93.16V0m8,93.16V0m4,93.16V0"/><path class="878966b7-abd4-4ef3-86d3-2321f80177f3" d="M193.85,93.16V0m4,93.16V0m6,93.16V0"/><line class="e435b0ed-5ad4-4699-bad7-b1c15cfe3f86" x1="210.85" y1="93.16" x2="210.85"/><line class="36de76d2-eb0f-431d-be12-6535d9fc4369" x1="218.85" y1="93.16" x2="218.85"/><line class="878966b7-abd4-4ef3-86d3-2321f80177f3" x1="225.85" y1="93.16" x2="225.85"/><line class="b8e87e45-e06c-4d7b-92d7-30eed261c8dd" x1="233.85" y1="93.16" x2="233.85"/><line class="878966b7-abd4-4ef3-86d3-2321f80177f3" x1="239.85" y1="93.16" x2="239.85"/><line class="e435b0ed-5ad4-4699-bad7-b1c15cfe3f86" x1="244.85" y1="93.16" x2="244.85"/><path class="878966b7-abd4-4ef3-86d3-2321f80177f3" d="M253.85,93.16V0m10,93.16V0m4,93.16V0m6,93.16V0m8,93.16V0m4,93.16V0m4,93.16V0m4,93.16V0m6,93.16V0"/><line class="b8e87e45-e06c-4d7b-92d7-30eed261c8dd" x1="309.85" y1="93.16" x2="309.85"/><line class="878966b7-abd4-4ef3-86d3-2321f80177f3" x1="315.85" y1="93.16" x2="315.85"/><line class="b8e87e45-e06c-4d7b-92d7-30eed261c8dd" x1="323.85" y1="93.16" x2="323.85"/><line class="878966b7-abd4-4ef3-86d3-2321f80177f3" x1="331.85" y1="93.16" x2="331.85"/><path class="e435b0ed-5ad4-4699-bad7-b1c15cfe3f86" d="M336.85,93.16V0m8,93.16V0m6,93.16V0m6,93.16V0"/><path class="878966b7-abd4-4ef3-86d3-2321f80177f3" d="M363.85,93.16V0m6,93.16V0m8,93.16V0m4,93.16V0"/><path class="878966b7-abd4-4ef3-86d3-2321f80177f3" d="M386.35,93.16V0m4,93.16V0m6,93.16V0"/><line class="e435b0ed-5ad4-4699-bad7-b1c15cfe3f86" x1="403.35" y1="93.16" x2="403.35"/><line class="36de76d2-eb0f-431d-be12-6535d9fc4369" x1="411.35" y1="93.16" x2="411.35"/><line class="878966b7-abd4-4ef3-86d3-2321f80177f3" x1="418.35" y1="93.16" x2="418.35"/><line class="b8e87e45-e06c-4d7b-92d7-30eed261c8dd" x1="426.35" y1="93.16" x2="426.35"/><line class="878966b7-abd4-4ef3-86d3-2321f80177f3" x1="432.35" y1="93.16" x2="432.35"/><line class="e435b0ed-5ad4-4699-bad7-b1c15cfe3f86" x1="437.35" y1="93.16" x2="437.35"/><path class="878966b7-abd4-4ef3-86d3-2321f80177f3" d="M446.35,93.16V0m10,93.16V0m4,93.16V0m6,93.16V0m8,93.16V0m4,93.16V0m4,93.16V0m4,93.16V0m6,93.16V0"/><line class="b8e87e45-e06c-4d7b-92d7-30eed261c8dd" x1="502.35" y1="93.16" x2="502.35"/><line class="878966b7-abd4-4ef3-86d3-2321f80177f3" x1="508.35" y1="93.16" x2="508.35"/><line class="b8e87e45-e06c-4d7b-92d7-30eed261c8dd" x1="516.35" y1="93.16" x2="516.35"/><line class="878966b7-abd4-4ef3-86d3-2321f80177f3" x1="524.35" y1="93.16" x2="524.35"/><path class="e435b0ed-5ad4-4699-bad7-b1c15cfe3f86" d="M529.35,93.16V0m8,93.16V0m6,93.16V0m6,93.16V0"/><path class="878966b7-abd4-4ef3-86d3-2321f80177f3" d="M556.35,93.16V0m6,93.16V0m8,93.16V0m4,93.16V0"/></svg>
		</div>
	</footer>
	
</div>

<a href="#" target="_blank" class="link">ติดต่อพนักงาน</a>

<button class="button" type="button" onclick="restart()">Replay</button>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.5/TweenMax.min.js"></script>
<script src="./chekbill.js"></script>
</body>
</html>