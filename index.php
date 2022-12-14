<?php
require_once __DIR__ . "./models/Food.php";
require_once __DIR__ . "./models/Toy.php";
require_once __DIR__ . "./models/Accessory.php";
require_once __DIR__ . "./models/Utente.php";

$categoriaGatto = new Category('gatto', 'cat.png');
$categoriaCane = new Category('cane', 'dog.png');

$pet_food = new Food("croccantini.jpg", "PetFood", "Croccantini di alta qualità per animali", 3.99, "20/02/2023", $categoriaCane);
$pet_toy = new Toy("osso.jpg", "PetToy", "Osso", 5.99, "gomma", $categoriaCane);
$pet_accessory = new Accessory("ciotola.jpg", "Ciotola", "Ciotola ", 49.99, "CiotoPlus", $categoriaGatto);
$pet_accessory2 = new Accessory("collare.jpg", "Collare", "Collare personalizzato", 6.99, "Amici a quattro zampe", $categoriaGatto);

// Utente

$UtenteProva = new User("UtenteProva", "utenteprova@gmail.com", 121545459865, true, true);
$UtenteProva->addToCart($pet_accessory);
$UtenteProva->addToCart($pet_food);
$UtenteProva->addToCart($pet_food);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/style.css">
    <title>Pet Shop</title>
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
        <div class="d-flex justify-content-center mt-5">
            <section class="">
                <h2 class="mb-5">Prodotti disponibili:</h2>
                <div class="card-2 mb-3 d-flex justify-content-center">
                    <div><img src="./img/<?php echo $pet_food->getImage() ?>" alt="" class="img-prod"></div>
                    <div class="info">
                        <div class="name mb-4"><?php echo $pet_food->getName()  ?></div>
                        <div class="price mb-4"><?php echo $pet_food->getPrice() . ' €'  ?></div>
                        <div class="description"><?php echo $pet_food->getDescription()  ?></div>
                    </div>
                </div>
                <div class="card-2 mb-3 d-flex justify-content-center">
                    <div><img src="./img/<?php echo $pet_toy->getImage() ?>" alt="" class="img-prod"></div>
                    <div class="info">
                        <div class="name mb-4"><?php echo $pet_toy->getName()  ?></div>
                        <div class="price mb-4"><?php echo $pet_toy->getPrice() . ' €'  ?></div>
                        <div class="description mb-4"><?php echo $pet_toy->getDescription()  ?></div>
                    </div>
                </div>
                <div class="card-2 mb-3 d-flex justify-content-center">
                    <div><img src="./img/<?php echo $pet_accessory->getImage() ?>" alt="" class="img-prod"></div>
                    <div class="info">
                        <div class="name mb-4"><?php echo $pet_accessory->getName()  ?></div>
                        <div class="price mb-4"><?php echo $pet_accessory->getPrice() . ' €'  ?></div>
                        <div class="description mb-4"><?php echo $pet_accessory->getDescription()  ?></div>
                    </div>
                </div>
                <div class="card-2 mb-3 d-flex justify-content-center">
                    <div><img src="./img/<?php echo $pet_accessory2->getImage() ?>" alt="" class="img-prod"></div>
                    <div class="info">
                        <div class="name mb-4"><?php echo $pet_accessory2->getName()  ?></div>
                        <div class="price mb-4"><?php echo $pet_accessory2->getPrice() . ' €'  ?></div>
                        <div class="description mb-4"><?php echo $pet_accessory2->getDescription()  ?></div>
                    </div>
                </div>
            </section>
        </div>

        <section class="card-2">
            <h2 class="mb-5">Ciao <?php echo $UtenteProva->name; ?>. Ecco il tuo carrello:</h2>
            <ul>
                <?php foreach ($UtenteProva->cart as $item) { ?>
                    <li>
                        <div class="d-flex justify-content-center">
                            <?php echo $item->getName() ?>
                            <?php echo $item->getPrice() . ' €'  ?>

                        </div>
                    </li>
                    <br>
                <?php } ?>
            </ul>
        </section>

        </div>
        <section class="mt-5 d-flex justify-content-center">
            <div class="card-1">
                <h2 class="me-5 card-2">Totale: € <?php echo $UtenteProva->getTotalPrice(); ?></h2>
                <h3 class="card-2">
                    <?php echo $UtenteProva->checkCDC(); ?>
                </h3>
            </div>
        </section>
    </main>
</body>

</html>