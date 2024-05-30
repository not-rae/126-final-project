<?php
include 'DBconnector.php';

// list of items

$items = [
    // coffee
    ['item_name' => 'Kopiko Black', 'category' => 'Coffee', 'image_path' => './coffee/kopiko black.jpg', 'price' => 5.00, 'quantity' => 100],
    ['item_name' => 'Lucky Day', 'category' => 'Coffee', 'image_path' => './coffee/lucky day.jpg', 'price' => 15.00, 'quantity' => 20],
    ['item_name' => 'Cafe Puro', 'category' => 'Coffee', 'image_path' => './coffee/cafe puro.jpg', 'price' => 15.00, 'quantity' => 20],
    ['item_name' => 'Kopiko Blanca', 'category' => 'Coffee', 'image_path' => './coffee/kopiko blanca.jpg', 'price' => 15.00, 'quantity' => 20],
    ['item_name' => 'Kopiko Brown', 'category' => 'Coffee', 'image_path' => './coffee/kopiko brown.jpg', 'price' => 15.00, 'quantity' => 20],
    ['item_name' => 'Chilled Latte', 'category' => 'Coffee', 'image_path' => './coffee/chilled latte.jpg', 'price' => 15.00, 'quantity' => 20],
    ['item_name' => 'Chilled Mocha', 'category' => 'Coffee', 'image_path' => './coffee/chilled mocha.jpeg', 'price' => 15.00, 'quantity' => 20],

    // beverages
    ['item_name' => 'Dutch Mill', 'category' => 'Beverages', 'image_path' => './beverages/dutchmill.jpg', 'price' => 15.00, 'quantity' => 20],
    ['item_name' => 'Absolute Water', 'category' => 'Beverages', 'image_path' => './beverages/absolute water.jpg', 'price' => 15.00, 'quantity' => 20],
    ['item_name' => 'Bear Brand', 'category' => 'Beverages', 'image_path' => './beverages/bear brand.jpg', 'price' => 15.00, 'quantity' => 20],
    ['item_name' => 'Gatorade', 'category' => 'Beverages', 'image_path' => './beverages/gatorade.jpg', 'price' => 15.00, 'quantity' => 20],
    ['item_name' => 'Nutri Boost', 'category' => 'Beverages', 'image_path' => './beverages/nutri boost.jpg', 'price' => 15.00, 'quantity' => 20],
    ['item_name' => 'Royal', 'category' => 'Beverages', 'image_path' => './beverages/royal.jpg', 'price' => 15.00, 'quantity' => 20],
    ['item_name' => 'Strawberry', 'category' => 'Beverages', 'image_path' => './beverages/strawberry.jpg', 'price' => 15.00, 'quantity' => 20],
    ['item_name' => 'Tang', 'category' => 'Beverages', 'image_path' => './beverages/tang.jpg', 'price' => 15.00, 'quantity' => 20],

    // noodles
    ['item_name' => 'Lucky Me Beef', 'category' => 'Noodles', 'image_path' => './noodles/lucky me beef.jpg', 'price' => 15.00, 'quantity' => 20],
    ['item_name' => 'Lucky Me Chicken', 'category' => 'Noodles', 'image_path' => './noodles/chicken.jpg', 'price' => 15.00, 'quantity' => 20],
    ['item_name' => 'Chili Mansi', 'category' => 'Noodles', 'image_path' => './noodles/chili mansi.jpg', 'price' => 15.00, 'quantity' => 20],
    ['item_name' => 'Kalamansi', 'category' => 'Noodles', 'image_path' => './noodles/kalamansi.jpg', 'price' => 15.00, 'quantity' => 20],
    ['item_name' => 'Lomi', 'category' => 'Noodles', 'image_path' => './noodles/lomi.jpg', 'price' => 15.00, 'quantity' => 20],
    ['item_name' => 'Original', 'category' => 'Noodles', 'image_path' => './noodles/original.jpg', 'price' => 15.00, 'quantity' => 20],
    ['item_name' => 'Spicy', 'category' => 'Noodles', 'image_path' => './noodles/spicy.jpg', 'price' => 15.00, 'quantity' => 20],


    // school supplies
    ['item_name' => 'Correction Tape', 'category' => 'School Supplies', 'image_path' => './supplies/correction_tape.jpg', 'price' => 15.00, 'quantity' => 20],
    ['item_name' => 'Pencil', 'category' => 'School Supplies', 'image_path' => './supplies/pencil.jpg', 'price' => 15.00, 'quantity' => 20],
    ['item_name' => 'Scissor', 'category' => 'School Supplies', 'image_path' => './supplies/scisssor.jpg', 'price' => 15.00, 'quantity' => 20],
    ['item_name' => 'Tape', 'category' => 'School Supplies', 'image_path' => './supplies/tape.jpg', 'price' => 15.00, 'quantity' => 20],
    ['item_name' => 'Yellow Pad', 'category' => 'School Supplies', 'image_path' => './supplies/yellow paper.jpg', 'price' => 15.00, 'quantity' => 20],

    // snack
    ['item_name' => 'Sky Flakes', 'category' => 'Snack', 'image_path' => './snack/sky_flakes.jpg', 'price' => 15.00, 'quantity' => 20],
    ['item_name' => 'Bread Stick', 'category' => 'Snack', 'image_path' => './snack/bread stcik.jpg', 'price' => 15.00, 'quantity' => 20],
    ['item_name' => 'Choco Mucho', 'category' => 'Snack', 'image_path' => './snack/chocomucho.jpg', 'price' => 15.00, 'quantity' => 20],
    ['item_name' => 'Cloud 9', 'category' => 'Snack', 'image_path' => './snack/cload 9.jpg', 'price' => 15.00, 'quantity' => 20],
    ['item_name' => 'Hello', 'category' => 'Snack', 'image_path' => './snack/hello.jpg', 'price' => 15.00, 'quantity' => 20],
    ['item_name' => 'Kitkat', 'category' => 'Snack', 'image_path' => './snack/kitkat.jpg', 'price' => 15.00, 'quantity' => 20],
    ['item_name' => 'Loaded', 'category' => 'Snack', 'image_path' => './snack/loaded.jpg', 'price' => 15.00, 'quantity' => 20],
    ['item_name' => 'Rebisco', 'category' => 'Snack', 'image_path' => './snack/rebisco.jpg', 'price' => 15.00, 'quantity' => 20],
    ['item_name' => 'Stck-O', 'category' => 'Snack', 'image_path' => './snack/stick o.jpg', 'price' => 15.00, 'quantity' => 20],
    ['item_name' => 'Waffer Time', 'category' => 'Snack', 'image_path' => './snack/waffer time.jpg', 'price' => 15.00, 'quantity' => 20],

    // toiletries
    ['item_name' => 'Cream Silk', 'category' => 'Toiletries', 'image_path' => './toiletries&laundry/creamsilk.jpg', 'price' => 15.00, 'quantity' => 20],
    ['item_name' => 'Axion', 'category' => 'Toiletries', 'image_path' => './toiletries&laundry/axion.jpg', 'price' => 15.00, 'quantity' => 20],
    ['item_name' => 'Dove', 'category' => 'Toiletries', 'image_path' => './toiletries&laundry/dove.jpg', 'price' => 15.00, 'quantity' => 20],
    ['item_name' => 'Modess', 'category' => 'Toiletries', 'image_path' => './toiletries&laundry/modess.jpg', 'price' => 15.00, 'quantity' => 20],
    ['item_name' => 'Safeguard', 'category' => 'Toiletries', 'image_path' => './toiletries&laundry/safeguard.jpg', 'price' => 15.00, 'quantity' => 20],
    ['item_name' => 'Sisters', 'category' => 'Toiletries', 'image_path' => './toiletries&laundry/sisters.jpg', 'price' => 15.00, 'quantity' => 20],
    ['item_name' => 'Surf', 'category' => 'Toiletries', 'image_path' => './toiletries&laundry/surf.jpg', 'price' => 15.00, 'quantity' => 20],
    ['item_name' => 'Tide', 'category' => 'Toiletries', 'image_path' => './toiletries&laundry/tide.jpg', 'price' => 15.00, 'quantity' => 20],

];

$stmt = $conn->prepare("INSERT INTO inventory (item_name, category, image_path, price, quantity) VALUES (?, ?, ?, ?, ?)");

foreach ($items as $item) {
    $stmt->bind_param("sssdi", $item['item_name'], $item['category'], $item['image_path'], $item['price'], $item['quantity']);
    $stmt->execute();
}

echo "Inventory updated successfully";

$stmt->close();
$conn->close();
?>
