<?php
header('Content-Type: text/html; charset=utf-8');

$fruitImages = [
    'apple' => 'https://t3.ftcdn.net/jpg/03/10/32/02/360_F_310320273_I9rR1l7918MJoZ0GRHGIBgZl9F9ShEXq.jpg',
    'banana' => 'https://cdn.pixabay.com/photo/2017/06/27/22/21/banana-2449019_960_720.jpg',
    'orange' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c4/Orange-Fruit-Pieces.jpg/2560px-Orange-Fruit-Pieces.jpg',
    'strawberry' => 'https://thumbs.dreamstime.com/b/three-strawberries-strawberry-leaf-white-background-114284301.jpg',
    'grape' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQByEqYwb6KNabgDkOL4y-4ITyykqKVfnEoHg&s',
    'watermelon' => 'https://media.istockphoto.com/id/1142119394/photo/whole-and-slices-watermelon-fruit-isolated-on-white-background.jpg?s=612x612&w=0&k=20&c=A5XnLyeI_3mwkCNadv-QLU4jzgNux8kUPfIlDvwT0jo=',
    'pineapple' => "https://www.healthxchange.sg/sites/hexassets/Assets/food-nutrition/pineapple-health-benefits-and-ways-to-enjoy.jpg",
    'mango' => 'https://cdn.pixabay.com/photo/2016/03/05/22/18/food-1239241_960_720.jpg'
];

$fruitDescriptions = [
    'apple' => 'Crisp and refreshing, apples are packed with fiber and vitamin C.',
    'banana' => 'Energy-packed bananas are rich in potassium and great for digestion.',
    'orange' => 'Juicy oranges are vitamin C powerhouses that boost your immune system.',
    'strawberry' => 'Sweet strawberries are loaded with antioxidants and vitamin C.',
    'grape' => 'Grapes contain resveratrol, a compound that may promote heart health.',
    'watermelon' => 'Hydrating watermelon is 92% water and rich in lycopene.',
    'pineapple' => 'Tropical pineapple contains bromelain, an enzyme that aids digestion.',
    'mango' => 'Called the "king of fruits," mangoes are rich in vitamins A and C.'
];

if (isset($_POST['fruits']) && is_array($_POST['fruits'])) {
    $selectedFruits = $_POST['fruits'];
} else {
    $selectedFruits = [];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Fruit Selection</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Design/OutputDesign.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Your Fruit Selection</h1>
        </div>
        
        <div class="content">
            <?php if (empty($selectedFruits)): ?>
                <div class="no-selection">
                    <h2>You didn't select any fruits!</h2>
                    <p>It seems you didn't choose any fruits. Fruits are essential for a healthy diet.</p>
                    <a href="index.html" class="btn">Go Back and Select Some</a>
                </div>
            <?php else: ?>
                <div class="result-message">
                    <?php
                    $count = count($selectedFruits);
                    if ($count == 1) {
                        echo "<h2>You selected 1 fruit!</h2>";
                    } else {
                        echo "<h2>You selected $count fruits!</h2>";
                    }
                    ?>
                    <p>Here are your selected fruits with their health benefits:</p>
                </div>
                
                <div class="selected-fruits">
                    <?php foreach ($selectedFruits as $fruit): ?>
                        <?php if (array_key_exists($fruit, $fruitImages)): ?>
                            <div class="fruit-item">
                                <img src="<?php echo htmlspecialchars($fruitImages[$fruit]); ?>" alt="<?php echo ucfirst($fruit); ?>" class="fruit-img">
                                <div class="fruit-name"><?php echo ucfirst($fruit); ?></div>
                                <div class="fruit-description"><?php echo $fruitDescriptions[$fruit]; ?></div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                
                <div class="health-tip">
                    <?php
                    if ($count >= 5) {
                        echo "<p><strong>Excellent choice!</strong> You've selected a variety of fruits that will provide a wide range of nutrients.</p>";
                    } elseif ($count >= 3) {
                        echo "<p><strong>Good selection!</strong> You're on your way to meeting your daily fruit intake recommendations.</p>";
                    } else {
                        echo "<p><strong>Tip:</strong> Try to include more fruits in your diet for better health and nutrition.</p>";
                    }
                    ?>
                </div>
                
                <a href="index.html" class="btn1">Make Another Selection</a>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>