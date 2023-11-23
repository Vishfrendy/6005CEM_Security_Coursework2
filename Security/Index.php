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
		if ($_SERVER['HTTPS'] != 'on') {
			header('Location: https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
			exit;
		}
		
		// Sample product data
		$products = [
			['id' => 1, 'name' => 'iPhone 13 Pro', 'brand' => 'Apple', 'price' => 2999.00, 'image' => 'https://doc.iwant.cz/pic/E0UY000501-600-600.jpg'],
			['id' => 2, 'name' => 'Samsung Galaxy S21 Ultra', 'brand' => 'Samsung', 'price' => 2249.00, 'image' => 'https://shop.compasia.com/cdn/shop/files/galaxy-s21-ultra-5g-compasia-malaysia-4_59cf9f48-7f0c-4ad1-a1f2-b91f0503dd76_800x.jpg?v=1690819600'],
			['id' => 3, 'name' => 'Huawei P50 Pro', 'brand' => 'Huawei', 'price' => 2599.00, 'image' => 'https://cdn.dxomark.com/wp-content/uploads/medias/post-88973/featured_huaweip50pro.jpg'],
			['id' => 4, 'name' => 'Pixel 6 Pro', 'brand' => 'Google', 'price' => 1770.00, 'image' => 'https://www.custommacbd.com/cdn/shop/files/3784-23234.jpg?v=1687459730'],
			['id' => 5, 'name' => 'OnePlus 9 Pro', 'brand' => 'OnePlus', 'price' => 1779.00, 'image' => 'https://oasis.opstatics.com/content/dam/oasis/page/2021/9-series/spec-image/9-pro/Morning%20mist-gallery.png'],
			['id' => 6, 'name' => 'Xiaomi Mi 11 Ultra', 'brand' => 'Xiaomi', 'price' => 1485.00, 'image' => 'https://i02.appmifile.com/657_operator_in/23/04/2021/49df87eb207b7fb714789495761f1c3b!800x800!85.png'],
			['id' => 7, 'name' => 'Oppo Find X3 Pro', 'brand' => 'Oppo', 'price' => 1415.00, 'image' => 'https://lzd-img-global.slatic.net/g/p/0ef1b8d532279a1b7018583b9a0d554b.jpg_720x720q80.jpg'],
			['id' => 8, 'name' => 'Vivo X70 Pro+', 'brand' => 'Vivo', 'price' => 3100.00, 'image' => 'https://asia-exstatic-vivofs.vivo.com/PSee2l50xoirPK7y/1632043709581/700595811256f1c1c5acbb4f8bf8dfc4.png'],
			['id' => 9, 'name' => 'Sony Xperia 1 III', 'brand' => 'Sony', 'price' => 2350.00, 'image' => 'https://laz-img-sg.alicdn.com/p/0929e69328fdc0cc06591f21058e3025.jpg'],
			['id' => 10, 'name' => 'LG Wing', 'brand' => 'LG', 'price' => 3165.00, 'image' => 'https://media.us.lg.com/transform/ecomm-PDPGallery-1100x730/694202fc-53d4-44aa-8076-a7b22e8a001f/md07518569-zoom-03-jpg'],
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
