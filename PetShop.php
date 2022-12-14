<?php
include_once __DIR__ . '/models/Food.php';
include_once __DIR__ . '/models/Toy.php';
include_once __DIR__ . '/models/Accessory.php';
include_once __DIR__ . '/models/UtentePremium.php';

if (isset($_POST['password']) && isset($_POST['email']) && isset($_POST['cardNumber']) && isset($_POST['expireDate'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cardNumber = $_POST['cardNumber'];
    $expireDate = $_POST['expireDate'];
    $paymentCard = new PaymentCard($cardNumber, $expireDate);
    $premiumUser = new PremiumUser($email, $password, $paymentCard);
    // var_dump($paymentCard);
    // var_dump($premiumUser);
}
if (isset($_POST['guest'])) {
    $user = new User();
    // var_dump($user);
}


$categoryCat = new Category('Gatto', 'cat.png');
$categoryDog = new Category('Cane', 'dog.png');
// var_dump($categoryCat);
// var_dump($categoryDog);

$PetFood = new Food('Croccantini per taglia media', 'croccantini.jpg', -20, $categoryDog, 16, ['Carne di Manzo', 'Mix Verdure'], '2022-10-25');
$PetFood2 = new Food('Croccantini naturali bio', 'croccantinigatto.jpg', 5.73, $categoryCat, -2, ['Pollo Vegano', 'Mix Verdure'], '2025-04-15');
// var_dump($PetFood);

$PetToy = new Game('Osso giocattolo', 'osso.jpg', 15.33, $categoryDog, '', ['Gomma', 'Stoffa']);
$PetToy2 = new Game('Topi giocattolo', 'topi.jpg', 29.99, $categoryCat, '', ['Stoffa', 'Cotone']);
$PetToy->setsize('Standard');
$PetToy2->setsize('50x50cm');
// var_dump($PetToy);

$PetAccessory = new Kennel('Ciotola Plus', 'ciotola.jpg', -14.55, $categoryDog, '', 65, ['Metallo']);
$PetAccessory2 = new Kennel('Collare Personalizzato', 'collare.jpg', 35, $categoryCat, '', 30, ['Stoffa']);
$PetAccessory->setsize('Standard');
$PetAccessory2->setsize('50x50cm');
// var_dump($PetAccessory);
?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel='shortcut icon' href='#'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi' crossorigin='anonymous'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css' integrity='sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==' crossorigin='anonymous' referrerpolicy='no-referrer' />
    <link rel='stylesheet' href='./css/style.css'>
    <script src='https://cdn.jsdelivr.net/npm/axios@1.1.2/dist/axios.min.js'></script>
    <script src='https://unpkg.com/vue@3/dist/vue.global.js'></script>
    <script src='./js/script.js' defer></script>
    <title>PetShop</title>
</head>

<body>
    <header class="position-sticky sticky-top my-borderb">
        <nav class="navbar bg-white">
            <div class="container-fluid">
                <a class="navbar-brand fs-1 fw-bold" href="#">
                    <img class="wlogo" src="./img/Logo.jpg" alt="Logo" class="d-inline-block align-text-top">
                    Pet Shop
                </a>
            </div>
        </nav>
    </header>
    <main>
        <div class="container mt-5" id="app">
            <h1>Prodotti disponibili...</h1>
            <div class="row mt-5">
                <div class="my-card">
                    <div><img src="./img/<?php echo $PetFood->category->getIcon() ?>" alt="" class="icon"></div>
                    <div><img src="./img/<?php echo $PetFood->getImage() ?>" alt="" class="mt-2 img-prod"></div>
                    <div class="p-2 info">
                        <div class="title"><?php echo $PetFood->getTitle()  ?></div>
                        <div>
                            <?php
                            if ($PetFood->getAvaliable()) {
                                echo "<span class='text-success'>Available</span>";
                            } else {
                                echo "<span class='text-danger'>Not Available</span>";
                            }
                            ?>
                        </div>
                        <div class="price"><?php echo $PetFood->getPrice() . ' €'  ?></div>
                        <div><?php echo ($PetFood->getWeight()) ? ($PetFood2->getWeight() . ' Kg') : 'Leggero' ?></div>
                        <div><?php echo $PetFood->getExpirationDate()  ?></div>
                        <div><?php echo '<span>Ingredienti:</span> ';
                                foreach ($PetFood->getIngredients() as $ingredient) echo $ingredient . ' ' ?></div>
                    </div>
                </div>
                <div class="my-card">
                    <div><img src="./img/<?php echo $PetFood2->category->getIcon() ?>" alt="" class="icon"></div>
                    <div><img src="./img/<?php echo $PetFood2->getImage() ?>" alt="" class="mt-2 img-prod"></div>
                    <div class="p-2 info">
                        <div class="title"><?php echo $PetFood2->getTitle()  ?></div>
                        <div>
                            <?php
                            if ($PetFood2->getAvaliable()) {
                                echo "<span class='text-success'>Available</span>";
                            } else {
                                echo "<span class='text-danger'>Not Available</span>";
                            }
                            ?>
                        </div>
                        <div class="price"><?php echo $PetFood2->getPrice() . ' €'  ?></div>
                        <div><?php echo ($PetFood2->getWeight()) ? ($PetFood2->getWeight() . ' Kg') : 'Leggero' ?></div>
                        <div><?php echo $PetFood2->getExpirationDate()  ?></div>
                        <div><?php echo '<span>Ingredienti:</span> ';
                                foreach ($PetFood2->getIngredients() as $ingredient) echo $ingredient . ' ' ?></div>
                    </div>
                </div>
                <div class="my-card">
                    <div><img src="./img/<?php echo $PetToy->category->getIcon() ?>" alt="" class="icon"></div>
                    <div><img src="./img/<?php echo $PetToy->getImage() ?>" alt="" class="mt-2 img-prod"></div>
                    <div class="p-2 info">
                        <div class="title"><?php echo $PetToy->getTitle()  ?></div>
                        <div>
                            <?php
                            if ($PetToy->getAvaliable()) {
                                echo "<span class='text-success'>Available</span>";
                            } else {
                                echo "<span class='text-danger'>Not Available</span>";
                            }
                            ?>
                        </div>
                        <div class="price"><?php echo $PetToy->getPrice() . ' €'  ?></div>
                        <div><?php echo '<span>Dimensioni:</span> ' . $PetToy->getsize()  ?></div>
                        <div><?php echo '<span>Materiali:</span> ';
                                foreach ($PetToy->getmaterial() as $ingredient) echo $ingredient . ' ' ?></div>
                    </div>
                </div>
                <div class="my-card">
                    <div><img src="./img/<?php echo $PetToy2->category->getIcon() ?>" alt="" class="icon"></div>
                    <div><img src="./img/<?php echo $PetToy2->getImage() ?>" alt="" class="mt-2 img-prod"></div>
                    <div class="p-2 info">
                        <div class="title"><?php echo $PetToy2->getTitle()  ?></div>
                        <div>
                            <?php
                            if ($PetToy2->getAvaliable()) {
                                echo "<span class='text-success'>Available</span>";
                            } else {
                                echo "<span class='text-danger'>Not Available</span>";
                            }
                            ?>
                        </div>
                        <div class="price"><?php echo $PetToy2->getPrice() . ' €'  ?></div>
                        <div><?php echo '<span>Dimensioni:</span> ' . $PetToy2->getsize()  ?></div>
                        <div><?php echo '<span>Materiali:</span> ';
                                foreach ($PetToy2->getmaterial() as $ingredient) echo $ingredient . ' ' ?></div>
                    </div>
                </div>
                <div class="my-card">
                    <div><img src="./img/<?php echo $PetAccessory->category->getIcon() ?>" alt="" class="icon"></div>
                    <div><img src="./img/<?php echo $PetAccessory->getImage() ?>" alt="" class="mt-2 img-prod"></div>
                    <div class="p-2 info">
                        <div class="title"><?php echo $PetAccessory->getTitle()  ?></div>
                        <div>
                            <?php
                            if ($PetAccessory->getAvaliable()) {
                                echo "<span class='text-success'>Available</span>";
                            } else {
                                echo "<span class='text-danger'>Not Available</span>";
                            }
                            ?>
                        </div>
                        <div class="price"><?php echo $PetAccessory->getPrice() . ' €'  ?></div>
                        <div><?php echo ($PetAccessory->getWeight()) ? ($PetAccessory->getWeight() . ' Kg') : 'Leggero' ?></div>
                        <div><?php echo '<span>Dimensioni:</span> ' . $PetAccessory->getsize()  ?></div>
                        <div><?php echo '<span>Materiali:</span> ';
                                foreach ($PetAccessory->getmaterial() as $ingredient) echo $ingredient . ' ' ?></div>
                    </div>
                </div>
                <div class="my-card">
                    <div><img src="./img/<?php echo $PetAccessory2->category->getIcon() ?>" alt="" class="icon"></div>
                    <div><img src="./img/<?php echo $PetAccessory2->getImage() ?>" alt="" class="mt-2 img-prod"></div>
                    <div class="p-2 info">
                        <div class="title"><?php echo $PetAccessory2->getTitle()  ?></div>
                        <div>
                            <?php
                            if ($PetAccessory2->getAvaliable()) {
                                echo "<span class='text-success'>Available</span>";
                            } else {
                                echo "<span class='text-danger'>Not Available</span>";
                            }
                            ?>
                        </div>
                        <div class="price"><?php echo $PetAccessory2->getPrice() . ' €'  ?></div>
                        <div><?php echo ($PetAccessory2->getWeight()) ? ($PetAccessory2->getWeight() . ' Kg') : 'Leggero' ?></div>
                        <div><?php echo '<span>Dimensioni:</span> ' . $PetAccessory2->getsize()  ?></div>
                        <div><?php echo '<span>Materiali:</span> ';
                                foreach ($PetAccessory2->getmaterial() as $ingredient) echo $ingredient . ' ' ?></div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>