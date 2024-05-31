<?php
include 'DBconnector.php';

// list of items
$items = [
    // uploaded_files
    ['item_name' => 'Kopiko Black', 'category' => 'Coffee', 'price' => 5.00, 'quantity' => 100, 'restockDate' => '2024-05-31', 'image_path' => 'kopiko black.jpg'],
    ['item_name' => 'Lucky Day', 'category' => 'Coffee', 'price' => 15.00, 'quantity' => 20, 'restockDate' => '2024-05-31', 'image_path' => 'lucky day.jpg'],
    ['item_name' => 'Cafe Puro', 'category' => 'Coffee', 'price' => 15.00, 'quantity' => 20, 'restockDate' => '2024-05-31', 'image_path' => 'cafe puro.jpg'],
    ['item_name' => 'Kopiko Blanca', 'category' => 'Coffee', 'price' => 15.00, 'quantity' => 20, 'restockDate' => '2024-05-31', 'image_path' => 'kopiko blanca.jpg'],
    ['item_name' => 'Kopiko Brown', 'category' => 'Coffee', 'price' => 15.00, 'quantity' => 20, 'restockDate' => '2024-05-31', 'image_path' => 'kopiko brown.jpg'],
    ['item_name' => 'Chilled Latte', 'category' => 'Coffee', 'price' => 15.00, 'quantity' => 20, 'restockDate' => '2024-05-31', 'image_path' => 'chilled latte.jpg'],
    ['item_name' => 'Chilled Mocha', 'category' => 'Coffee', 'price' => 15.00, 'quantity' => 20, 'restockDate' => '2024-05-31', 'image_path' => 'chilled mocha.jpeg'],

    // uploaded_files
    ['item_name' => 'Dutch Mill', 'category' => 'Beverages', 'price' => 15.00, 'quantity' => 20, 'restockDate' => '2024-05-31', 'image_path' => 'dutchmill.jpg'],
    ['item_name' => 'Absolute Water', 'category' => 'Beverages', 'price' => 15.00, 'quantity' => 20, 'restockDate' => '2024-05-31', 'image_path' => 'absolute water.jpg'],
    ['item_name' => 'Bear Brand', 'category' => 'Beverages', 'price' => 15.00, 'quantity' => 20, 'restockDate' => '2024-05-31', 'image_path' => 'bear brand.jpg'],
    ['item_name' => 'Gatorade', 'category' => 'Beverages', 'price' => 15.00, 'quantity' => 20, 'restockDate' => '2024-05-31', 'image_path' => 'gatorade.jpg'],
    ['item_name' => 'Nutri Boost', 'category' => 'Beverages', 'price' => 15.00, 'quantity' => 20, 'restockDate' => '2024-05-31', 'image_path' => 'nutri boost.jpg'],
    ['item_name' => 'Royal', 'category' => 'Beverages', 'price' => 15.00, 'quantity' => 20, 'restockDate' => '2024-05-31', 'image_path' => 'royal.jpg'],
    ['item_name' => 'Strawberry', 'category' => 'Beverages', 'price' => 15.00, 'quantity' => 20, 'restockDate' => '2024-05-31', 'image_path' => 'strawberry.jpg'],
    ['item_name' => 'Tang', 'category' => 'Beverages', 'price' => 15.00, 'quantity' => 20, 'restockDate' => '2024-05-31', 'image_path' => 'tang.jpg'],
    

    // uploaded_files
    ['item_name' => 'Lucky Me Beef', 'category' => 'Noodles', 'price' => 15.00, 'quantity' => 20, 'restockDate' => '2024-05-31', 'image_path' => 'lucky me beef.jpg'],
    ['item_name' => 'Lucky Me Chicken', 'category' => 'Noodles', 'price' => 15.00, 'quantity' => 20, 'restockDate' => '2024-05-31', 'image_path' => 'chicken.jpg'],
    ['item_name' => 'Chili Mansi', 'category' => 'Noodles', 'price' => 15.00, 'quantity' => 20, 'restockDate' => '2024-05-31', 'image_path' => 'chili mansi.jpg'],
    ['item_name' => 'Kalamansi', 'category' => 'Noodles', 'price' => 15.00, 'quantity' => 20, 'restockDate' => '2024-05-31', 'image_path' => 'kalamansi.jpg'],
    ['item_name' => 'Lomi', 'category' => 'Noodles', 'price' => 15.00, 'quantity' => 20, 'restockDate' => '2024-05-31', 'image_path' => 'lomi.jpg'],
    ['item_name' => 'Original', 'category' => 'Noodles', 'price' => 15.00, 'quantity' => 20, 'restockDate' => '2024-05-31', 'image_path' => 'original.jpg'],
    ['item_name' => 'Spicy', 'category' => 'Noodles', 'price' => 15.00, 'quantity' => 20, 'restockDate' => '2024-05-31', 'image_path' => 'spicy.jpg'],
    
    // school uploaded_files
    ['item_name' => 'Correction Tape', 'category' => 'School Supplies', 'price' => 15.00, 'quantity' => 20, 'restockDate' => '2024-05-31', 'image_path' => 'correction_tape.jpg'],
    ['item_name' => 'Pencil', 'category' => 'School Supplies', 'price' => 15.00, 'quantity' => 20, 'restockDate' => '2024-05-31', 'image_path' => 'pencil.jpg'],
    ['item_name' => 'Scissor', 'category' => 'School Supplies', 'price' => 15.00, 'quantity' => 20, 'restockDate' => '2024-05-31', 'image_path' => 'scisssor.jpg'],
    ['item_name' => 'Tape', 'category' => 'School Supplies', 'price' => 15.00, 'quantity' => 20, 'restockDate' => '2024-05-31', 'image_path' => 'tape.jpg'],
    ['item_name' => 'Yellow Pad', 'category' => 'School Supplies', 'price' => 15.00, 'quantity' => 20, 'restockDate' => '2024-05-31', 'image_path' => 'yellow paper.jpg'],
    
    // uploaded_files
    ['item_name' => 'Sky Flakes', 'category' => 'Snack', 'price' => 15.00, 'quantity' => 20, 'restockDate' => '2024-05-31', 'image_path' => 'sky_flakes.jpg'],
    ['item_name' => 'Bread Stick', 'category' => 'Snack', 'price' => 15.00, 'quantity' => 20, 'restockDate' => '2024-05-31', 'image_path' => 'bread stcik.jpg'],
    ['item_name' => 'Choco Mucho', 'category' => 'Snack', 'price' => 15.00, 'quantity' => 20, 'restockDate' => '2024-05-31', 'image_path' => 'chocomucho.jpg'],
    ['item_name' => 'Cloud 9', 'category' => 'Snack', 'price' => 15.00, 'quantity' => 20, 'restockDate' => '2024-05-31', 'image_path' => 'cload 9.jpg'],
    ['item_name' => 'Hello', 'category' => 'Snack', 'price' => 15.00, 'quantity' => 20, 'restockDate' => '2024-05-31', 'image_path' => 'hello.jpg'],
    ['item_name' => 'Kitkat', 'category' => 'Snack', 'price' => 15.00, 'quantity' => 20, 'restockDate' => '2024-05-31', 'image_path' => 'kitkat.jpg'],
    ['item_name' => 'Loaded', 'category' => 'Snack', 'price' => 15.00, 'quantity' => 20, 'restockDate' => '2024-05-31', 'image_path' => 'loaded.jpg'],
    ['item_name' => 'Rebisco', 'category' => 'Snack', 'price' => 15.00, 'quantity' => 20, 'restockDate' => '2024-05-31', 'image_path' => 'rebisco.jpg'],
    ['item_name' => 'Stck-O', 'category' => 'Snack', 'price' => 15.00, 'quantity' => 20, 'restockDate' => '2024-05-31', 'image_path' => 'stick o.jpg'],
    ['item_name' => 'Waffer Time', 'category' => 'Snack', 'price' => 15.00, 'quantity' => 20, 'restockDate' => '2024-05-31', 'image_path' => 'waffer time.jpg'],
    
    // uploaded_files
    ['item_name' => 'Cream Silk', 'category' => 'Toiletries', 'price' => 15.00, 'quantity' => 20, 'restockDate' => '2024-05-31', 'image_path' => 'creamsilk.jpg'],
    ['item_name' => 'Axion', 'category' => 'Toiletries', 'price' => 15.00, 'quantity' => 20, 'restockDate' => '2024-05-31', 'image_path' => 'axion.jpg'],
    ['item_name' => 'Dove', 'category' => 'Toiletries', 'price' => 15.00, 'quantity' => 20, 'restockDate' => '2024-05-31', 'image_path' => 'dove.jpg'],
    ['item_name' => 'Modess', 'category' => 'Toiletries', 'price' => 15.00, 'quantity' => 20, 'restockDate' => '2024-05-31', 'image_path' => 'modess.jpg'],
    ['item_name' => 'Safeguard', 'category' => 'Toiletries', 'price' => 15.00, 'quantity' => 20, 'restockDate' => '2024-05-31', 'image_path' => 'safeguard.jpg'],
    ['item_name' => 'Sisters', 'category' => 'Toiletries', 'price' => 15.00, 'quantity' => 20, 'restockDate' => '2024-05-31', 'image_path' => 'sisters.jpg'],
    ['item_name' => 'Surf', 'category' => 'Toiletries', 'price' => 15.00, 'quantity' => 20, 'restockDate' => '2024-05-31', 'image_path' => 'surf.jpg'],
];

$stmt = $conn->prepare("INSERT INTO inventory (item_name, category, price, quantity, restockDate, image_path) VALUES (?, ?, ?, ?, ?, ?)");

foreach ($items as $item) {
    $stmt->bind_param("ssdiss", $item['item_name'], $item['category'], $item['price'], $item['quantity'], $item['restockDate'], $item['image_path']);
    $stmt->execute();
}

echo "Inventory updated successfully";

$stmt->close();
$conn->close();
?>
