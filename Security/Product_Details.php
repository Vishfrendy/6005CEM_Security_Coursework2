<!-- product_details.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
			text-align: center;
        }

        h1 {
            color: #333;
        }

        p {
            margin-bottom: 10px;
        }

        img {
            max-width: auto;
            height: 500px;
            border: 1px solid #ddd;
            border-radius: 25px;
            margin-top: 10px;
			padding: 25px;
			background-color: white;
        }

        form {
            margin-top: 15px;
        }

        label {
            font-weight: bold;
            margin-right: 10px;
        }

        input {
            padding: 5px;
            width: 50px;
        }

        button {
            padding: 7px 12px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        /* Add to Cart button */
        .add-to-cart {
            margin-top: 15px;
        }

        /* Error message */
        .error-message {
            color: #ff0000;
            margin-top: 15px;
        }
    </style>
</head>
<body>

<?php
$productId = isset($_GET['id']) ? $_GET['id'] : null;

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

// Check if the product ID is valid
if ($productId !== null && array_key_exists($productId - 1, $products)) {
    $product = $products[$productId - 1];

    // Initialize the quantity in the session or use default value
    session_start();
    $quantity = isset($_SESSION['cart'][$productId]) ? $_SESSION['cart'][$productId] : 1;

    // Handle quantity updates
    if (isset($_POST['update_quantity'])) {
        $quantity = max(1, $_POST['quantity']); // Ensure quantity is at least 1
        $_SESSION['cart'][$productId] = $quantity;
    }

    // Display product details and quantity input
    ?>
	<img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
    <h1><?php echo $product['name']; ?></h1>
    <p><strong>Brand:</strong> <?php echo $product['brand']; ?></p>
    <p><strong>Price:</strong> $<?php echo number_format($product['price'], 2); ?></p>
    <form method="post" action="">
        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" value="<?php echo $quantity; ?>" min="1">
        <button type="submit" name="update_quantity">Update Quantity</button>
    </form>

    <form method="post" action="cart.php">
        <input type="hidden" name="product_id" value="<?php echo $productId; ?>">
        <input type="hidden" name="quantity" value="<?php echo $quantity; ?>">
        <button type="submit" name="add_to_cart">Add to Cart</button>
    </form>
    <?php
} else {
    // Invalid product ID, display an error message
    echo '<p>Invalid product ID</p>';
}
?>

</body>
</html>
