<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Smartphone Sales</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
			background-color: #F2F3F4;
			overflow-x: hidden;
			user-select: none;
			-moz-user-select: none;
			-webkit-user-select: none;
			-ms-user-select: none;
        }
		
		h2 {
			text-align: left;
			position: relative;
			padding-top: 50px;
			left: 80px;
		}

        .product {
            padding: 10px;
            margin: 10px;
            float: left;
			position: relative;
			left: 75px;
            width: 300px;
			background-color: white;
			border-radius: 15px;
			height: 435px;
        }
		
		.product h3 {
			text-align: left;
			position: relative;
			left: 20px;
		}

        .product img {
            width: 300px;
			height: 300px;
			object-fit: cover;
			margin-bottom: 10px;
        }
		
		.product p {
			font-size: 16px;
			text-align: left;
			position: relative;
			left: 20px;
		}
		
		.product button {
			background-color: #0096c7;
			border-radius: 25px;
			border: none;
			padding: 10px 15px;
			color: white;
			float: right;
			font-size: 16px;
			position: relative;
			bottom: 45px;
			right: 20px;
		}
		
		header {
			background-color: #F2F3F4;
			text-align: center;
		}

		nav {
			display: flex;
			justify-content: center;
			align-items: center;
		}

		nav a {
			color: black;
			text-decoration: none;
			padding: 10px 20px;
			margin: 0 10px;
			font-size: 16px;
		}

		nav a:hover {
			border-bottom: 2px solid #fff;
		}

		.logo {
			max-width: 52px;
			height: auto;
			margin: 0 10px;
		}
		
		nav i {
			color: black;
			text-decoration: none;
			padding: 0px 1px;
			margin: 0 10px;
			font-size: 16px;
		}
    </style>
	
	<script>
		document.addEventListener('contextmenu', function (e) {
			e.preventDefault();
		});
	</script>
</head>
<body>
	<header>
		<nav>
			<img src="Logo.png" alt="Logo" class="logo" style="cursor: pointer;" onclick="redirectToIndex()">
			<a href="Index.php">Smartphones</a>
			<a href="Accessories.php">Accessories</a>
			<a href="#">Support</a>
			<a href="Cart.php"><i class="fas fa-shopping-cart" style="color: #000000;"></i></a>
			<a href="Signup.php"><i class="fa-solid fa-user" style="color: #000000;"></i></a>
		</nav>
	</header>

    <h2>The Latest Smartphones In The Market!</h2>

    <?php
		// Sample product data
		$products = [
			['id' => 11, 'name' => 'AirTag 4 Pack', 'brand' => 'Apple', 'price' => 499.00, 'image' => 'https://store.storeimages.cdn-apple.com/8756/as-images.apple.com/is/airtag-4pack-select-202104?wid=532&hei=582&fmt=png-alpha&.v=1617761669000'],
			['id' => 12, 'name' => 'Magic Mouse', 'brand' => 'Apple', 'price' => 379.00, 'image' => 'https://store.storeimages.cdn-apple.com/8756/as-images.apple.com/is/MMMQ3?wid=532&hei=582&fmt=png-alpha&.v=1645138486301'],
			['id' => 13, 'name' => 'Magic Keyboard', 'brand' => 'Apple', 'price' => 729.00, 'image' => 'https://store.storeimages.cdn-apple.com/8756/as-images.apple.com/is/MMMR3?wid=532&hei=582&fmt=png-alpha&.v=1645719947833'],
			['id' => 14, 'name' => 'AirPods Max', 'brand' => 'Apple', 'price' => 2499.00, 'image' => 'https://store.storeimages.cdn-apple.com/8756/as-images.apple.com/is/airpods-max-select-skyblue-202011?wid=445&hei=445&fmt=jpeg&qlt=95&.v=1604022365000'],
			['id' => 15, 'name' => 'Apple Pencil', 'brand' => 'Apple', 'price' => 399.00, 'image' => 'https://store.storeimages.cdn-apple.com/8756/as-images.apple.com/is/MUWA3?wid=572&hei=572&fmt=jpeg&qlt=95&.v=1695933856697'],
			['id' => 16, 'name' => 'Mi 20W Charging Stand', 'brand' => 'Xiaomi', 'price' => 1485.00, 'image' => 'https://i01.appmifile.com/v1/MI_18455B3E4DA706226CF7535A58E875F0267/pms_1666845465.09499859.png'],
			['id' => 17, 'name' => 'Mi Portable Photo Printer', 'brand' => 'Xiaomi', 'price' => 1415.00, 'image' => 'https://i01.appmifile.com/v1/MI_18455B3E4DA706226CF7535A58E875F0267/pms_1672037953.35458850.png'],
			['id' => 18, 'name' => 'Galaxy Watch 4', 'brand' => 'Samsung', 'price' => 799.00, 'image' => 'https://images.samsung.com/is/image/samsung/p6pim/my/2108/gallery/my-galaxy-watch4-sm-r860nzkaxme-thumb-481112708?$252_252_PNG$'],
			['id' => 19, 'name' => 'Smart Monitor M5', 'brand' => 'Samsung', 'price' => 1288.00, 'image' => 'https://images.samsung.com/is/image/samsung/p6pim/my/ls32cm501eexxs/gallery/my-smart-m5-32m501c-ls32cm501eexxs-535965558?$684_547_PNG$'],
			['id' => 20, 'name' => 'Galaxy Z Flip5 Flipsuit Case', 'brand' => 'Samsung', 'price' => 199.00, 'image' => 'https://images.samsung.com/is/image/samsung/p6pim/my/2307/gallery/my-galaxy-z-flip5-flip-suit-case-ef-zf731-ef-zf731ctegww-537277767?$730_584_PNG$'],
		];
		
		foreach ($products as $product) {
			echo '<div class="product">';
			echo '<h3>' . $product['name'] . '</h3>';
			echo '<img src="' . $product['image'] . '" alt="' . $product['name'] . '">';
			echo '<p>From RM' . $product['price'] . '</p>';
			echo '<button class="button" onclick="redirectToProductDetails(\'' . $product['id'] . '\')">Buy</button>';
			echo '</div>';
		}
    ?>
</body>

<script>
	function redirectToIndex() {
		window.location.href = "Index.php";
	}
</script>

<script>
    function redirectToProductDetails(productId) {
        // You can modify this line to include additional parameters or customize the redirection logic.
        window.location.href = 'Product_Details.php?id=' + productId;
    }
</script>

</html>
