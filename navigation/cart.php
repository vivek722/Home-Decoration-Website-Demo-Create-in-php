<?php
session_start();
include("../connection.php");
error_reporting(E_ALL ^ E_WARNING);
$user = $_SESSION['customer_id'];
if($_SESSION["cart_item"][$user]==null){
	unset($_SESSION["cart_item"][$user]);
}

//code for Cart
if (!empty($_GET["action"])) {
	switch ($_GET["action"]) {
			//code for adding product in cart
		case "add":
			if (!empty($_POST["quantity"])) {
				$pid = $_GET["pid"];
				$result = mysqli_query($con, "SELECT * FROM add_product WHERE id='$pid'");
				while ($productByCode = mysqli_fetch_array($result)) {
					$itemArray = array($productByCode["pid"] => array('name' => $productByCode["product_name"], 'code' => $productByCode["id"], 'quantity' => $_POST["quantity"], 'price' => $productByCode["product_price"], 'image' => $productByCode["pro_img"]));
					if (!empty($_SESSION["cart_item"][$user])) {
						if (in_array($productByCode["pid"], array_keys($_SESSION["cart_item"][$user]))) {
							foreach ($_SESSION["cart_item"][$user] as $k => $v) {
								if ($productByCode["pid"] == $k) {
									if (empty($_SESSION["cart_item"][$user][$k]["quantity"])) {
										$_SESSION["cart_item"][$user][$k]["quantity"] = 0;
									}
									$_SESSION["cart_item"][$user][$k]["quantity"] += $_POST["quantity"];
								header("Location:./cart.php");
								}
							}
						} else {
							$_SESSION["cart_item"][$user] = ($_SESSION["cart_item"][$user] + $itemArray);
							header("Location:cart.php");
						}
					} else {
						$_SESSION["cart_item"][$user] = $itemArray;
						header("Location:cart.php");
					}
				}
			}
			break;

			// code for removing product from cart
		case "remove":
			if (!empty($_SESSION["cart_item"][$user])) {
				foreach ($_SESSION["cart_item"][$user] as $k => $v) {

					if ($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$user][$k]);
					if (empty($_SESSION["cart_item"][$user]))
						unset($_SESSION["cart_item"][$user]);
					header("Location:cart.php");
				}
			}
			break;
			// code for if cart is empty
		case "empty":
			unset($_SESSION["cart_item"][$user]);
			header("Location:cart.php");
			break;

		case "buy":
			$pid = $_GET["pid"];
			// $result = mysqli_query($conn, "SELECT * FROM products WHERE pid='$pid'");
			// while ($productByCode = mysqli_fetch_array($result)) {
			// 	if (!empty($_SESSION["cart_item"][$user])) {
			// 		if (in_array($productByCode["pid"], array_keys($_SESSION["cart_item"][$user]))) {
			// 			foreach ($_SESSION["cart_item"][$user] as $k => $v) {
			// 				if ($productByCode["pid"] == $k) {
								// $qt=($_SESSION["cart_item"][$user][$k]["quantity"] );
								$qt= $_SESSION["cart_item"][$user][$pid]["quantity"];
								if(mysqli_query($conn,"insert into orders values(null,$user,$pid,$qt)")){
									unset($_SESSION["cart_item"][$user][$pid]);
									header("Location:cart.php");
								}

			// 				}
			// 			}
			// 		}
			// 	}
			// }
			break;
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Shopping Cart</title>
	<link rel="stylesheet" href="./style.css">
	<style>
		th,
		tr,
		td,
		th,
		tbody,
		table {
			background-color: black;
			color: aliceblue;
		}
	</style>
</head>

<body style="background-color: black;">


	<!-- Cart ---->
	<div id="shopping-cart">
		<div class="txt-heading">
			<h1 style="color: aliceblue;">Shopping Cart</h1>
		</div>

		<a id="btnEmpty" href="cart.php?action=empty">Empty Cart</a>
		<?php
		if (isset($_SESSION["cart_item"][$user])) {
			$total_quantity = 0;
			$total_price = 0;
		?>
			<table class="tbl-cart" cellpadding="10" cellspacing="1">
				<tbody>
					<tr>
						<th style="text-align:left;color: aliceblue;">
							<h2>Name</h2>
						</th>
						<th style="text-align:left;">
							<h2>Code</h2>
						</th>
						<th style="text-align:right;" width="5%">
							<h2>Quantity</h2>
						</th>
						<th style="text-align:right;" width="10%">
							<h2>Unit Price</h2>
						</th>
						<th style="text-align:right;" width="15%">
							<h2>Price</h2>
						</th>
						<th style="text-align:center;" width="5%">
							<h2>Remove</h2>
						</th>
						<th style="background-color: black;color: aliceblue;">Buy</th>
					</tr>
					<?php

					foreach ($_SESSION["cart_item"][$user] as $item) {
                        $item_price = $item["quantity"] * $item["price"];

					?>
						<tr style="background-color: black;color: aliceblue;">
							<td style="background-color:black;color: aliceblue;"><img src="../img/<?php echo $item["image"]; ?>" height="110" width="110" class="" />
								<h2><?php echo $item["name"]; ?></h2>
							</td>
							<td style="background-color: black;color: aliceblue;">
								<h3><?php echo $item["code"]; ?></h3>
							</td>
							<td style="background-color: black;color: aliceblue;" style="text-align:right;">
								<h3><?php echo $item["quantity"]; ?></h3>
							</td>
							<td style="background-color: black;color: aliceblue;" style="text-align:right;">
								<h3><?php echo "Rs. " . $item["price"]; ?></h3>
							</td>
							<td style="background-color: black;color: aliceblue;" style="text-align:right;">
								<h3><?php echo "Rs. " . number_format($item_price, 2); ?></h3>
							</td>
							<td style="background-color: black;color: aliceblue;" style="text-align:center;"><a href="cart.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img src="../img/icon-delete.png" alt="Remove Item" height="40" width="40" /></a></td>
							<td style="background-color: black;color: aliceblue;"><a id="btnEmpty" name="<?php echo $item["code"]; ?> " href="../navigation/thankyou.php"> Buy Now</a></td>
						</tr>
					<?php
						$total_quantity += $item["quantity"];
						$total_price += ($item["price"] * $item["quantity"]);
					}
					?>

					<tr>
						<td colspan="2" align="right" style="background-color: black;color: aliceblue;">
							<h3>Total:</h3>
						</td>
						<td align="right" style="background-color: black;color: aliceblue;">
							<h3><?php echo $total_quantity; ?></h3>
						</td>
						<td align="right" colspan="2" style="background-color: black;color: aliceblue;"><strong>
								<h3><?php echo "Rs. " . number_format($total_price, 2); ?></h3>
							</strong></td>
						<td style="background-color: black;color: aliceblue;"></td>
						

					</tr>
				</tbody>
			</table>
		<?php
		} else {
		?>
			<div class="no-records" style="background-color: black;color: aliceblue;">Your Cart is Empty</div>
		<?php
		}
		?>
	</div>
</body>

</html>