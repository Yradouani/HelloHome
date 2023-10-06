<?php $titre = "Profil Administrateur";
// var_dump($allProperties);
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
<link rel="stylesheet" href="./style/adminProfil.css">
</head>

<body>
    <header>
        <a href="?action=displayDashboard">
            <img src="././asset/img/logo_white.png" alt="logo">
        </a>
        <div id="icon_container">
            <a href="?action=profil">
                <i class="bi bi-person-fill"></i>
            </a>
            <a href="?action=deconnection">
                <i class="bi bi-x-circle-fill"></i>
            </a>
        </div>
    </header>
    <div id="main_container">
        <h1>Bienvenue sur votre profil <?= $allProperties['firstname'] . " " . $allProperties['lastname'] ?></h1>
        <div id="info_admin">
            <h2>Vos informations personnelles :</h2>
            <div class="info">
                <span class="info_title">Nom : </span>
                <span class="info_value"><?= $allProperties['lastname'] ?></span>
            </div>
            <div class="info">
                <span class="info_title">Prénom : </span>
                <span class="info_value"><?= $allProperties['firstname'] ?></span>
            </div>
            <div class="info">
                <span class="info_title">Email : </span>
                <span class="info_value"><?= $allProperties['email'] ?></span>
            </div>
            <button class="info changeBtn" id="changeInfo">Modifier mes informations</button>
            <hr>
            <div class="info change_pwd">Changer le mot de passe :</div>
            <label for="password" class="info">Ancien mot de passe</label>
            <input type="password" name="oldpassword" id="oldpassword" class="info">
            <label for="newpassword" class="info">Nouveau mot de passe</label>
            <input type="password" name="newpassword" id="newpassword" class="info">
            <button class="info changeBtn" id="changePwd" data-bs-toggle="modal" data-bs-target="#pwdModal" data-dismiss="modal">Changer mon mot de passe</button>
        </div>
    </div>

    <!-- Modal update Info profil-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Etes-vous sûr de vouloir modifier vos informations ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <input type="submit" class="btn btn-secondary" id="submitUpdate" name="submitMeal" data-bs-dismiss="modal" value="Valider">
                </div>
            </div>
        </div>
    </div>

    <!-- Modal update password-->
    <div class="modal fade" id="pwdModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Etes-vous sûr de vouloir modifier votre mot de passe ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <input type="submit" class="btn btn-secondary" id="submitMeal" name="submitMeal" data-bs-dismiss="modal" value="Valider">
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p>HelloHome © 2023</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="./js/profil.js"></script>