<?php
// Silence is golden
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
    <div class="container" id="app">
        <div class="d-flex justify-content-center mb-5"><img src="./img/Logo.jpg" alt="" class="wlogoform"></div>
        <div class="form">
            <div class="inner-form">
                <form action="PetShop.php" method="post" v-show="viewForm == 'login'">
                    <input type="text" hidden name="guest" value="guest">
                    <button class="btn btn-light">Entra come Ospite</button>
                </form>
                <button class="btn btn-light ms-5 " @click="setView('user')" v-show="viewForm == 'login'">Registrati</button>
                <form action="PetShop.php" method="post" v-show="viewForm == 'user'">
                    <div class="row">
                        <label for="" class="p-0 text-white">Indirizzo e-mail..</label>
                        <input type="email" class="p-0 mb-3" required name="email">
                        <label for="" class="p-0 text-white">Password..</label>
                        <input type="password" class="p-0 mb-3" required name="password">
                    </div>
                    <div class="row">
                        <label for="" class="p-0 text-white">Numero della carta..</label>
                        <input type="text" class="p-0 mb-3" required name="cardNumber">
                        <label for="" class="p-0 text-white">Data di scadenza della carta (es. 2025-05)</label>
                        <input type="text" class="p-0 mb-3" required name="expireDate">
                    </div>
                    <div class="d-flex justify-content-center mt-5">
                        <button class="btn btn-light me-5" @click.prevent="setView('login')">Indietro</button>
                        <button class="btn btn-light">Invia</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>