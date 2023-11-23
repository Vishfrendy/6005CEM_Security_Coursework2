<?php
session_start();

// Initialize the cart in the session if not already set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Handle adding product to the cart
if (isset($_POST['add_to_cart'])) {
    $productId = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    // Add product and quantity to the cart in the session
    $_SESSION['cart'][$productId] = $quantity;
}

// Check if a product ID is sent through POST (for removing items from the cart)
if (isset($_POST['remove_product_id'])) {
    $remove_product_id = $_POST['remove_product_id'];

    // Remove the product from the cart
    unset($_SESSION['cart'][$remove_product_id]);
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Shopping Cart</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin-top: 20px;
			background-color: #F2F3F4;
        }
		
		h2 {
			text-align: center;
			padding-top: 50px;
		}
		
        .cart-container {
			text-align: center;
			height: 1075px;
		}

		.cart-item {
			display: inline-block;
			padding: 10px;
			margin: 10px;
			text-align: center;
			background-color: white;
			border-radius: 25px;
		}
		
		img {
            width: 250px;
			height: 250px;
			object-fit: cover;
        }
		
		.remove-button {
            background-color: #ff0000;
            color: #ffffff;
            padding: 5px;
            cursor: pointer;
            border: none;
			border-radius: 25px;
			padding: 5px 15px;
        }
		
		a.continue-shopping {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            border-radius: 5px;
			position: relative;
			left: 1650px;
        }

        a.continue-shopping:hover {
            background-color: #45a049;
        }
		
		.summary {
            background-color: white;
            border: 1px solid #000;
            position: fixed;
            bottom: 0px;
            text-align: center;
            right: -2px;
            width: 100%;
			padding-bottom: 40px;
        }

        .checkout-button {
            background-color: #0096c7;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            font-size: 16px;
            border-radius: 25px;
            cursor: pointer;
			position: relative;
			top: 8px;
        }

        .checkout-button:hover {
            background-color: #0056b3;
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

    <h2>Shopping Cart</h2>

    <div class="cart-container">
		<?php
		$totalPrice = 0;
		$selectedProducts = [];

		if (!empty($_SESSION['cart'])) {
			foreach ($_SESSION['cart'] as $productId => $quantity) {
				$product = $products[$productId - 1];
				$totalPrice += $product['price'] * $quantity;

				echo '<div class="cart-item">';
				echo '<img src="' . $product['image'] . '" alt="' . $product['name'] . '">';
				echo '<h3>' . $product['name'] . '</h3>';
				echo '<p>Price: $' . $product['price'] . '</p>';
				echo '<p>Quantity: ' . $quantity . '</p>';
				echo '<form method="post" action="">';
				echo '<input type="hidden" name="remove_product_id" value="' . $productId . '">';
				echo '<input type="submit" class="remove-button" value="Remove">';
				echo '</form>';
				echo '</div>';

				// Store selected product names
				$selectedProducts[] = ($quantity > 1) ? $product['name'] . ' x ' . $quantity : $product['name'];
			}
		} else {
			echo '<p>Your shopping cart is empty.</p>';
		}
		?>
	</div>
	
	<div class="summary">
        <h3>Total Price: $<?php echo number_format($totalPrice, 2); ?></h3>
        <h3>Selected Products: <?php echo implode(', ', $selectedProducts); ?></h3>
		<a href="checkout.php" class="checkout-button">Proceed to Checkout</a>
    </div>

</body>
</html>
