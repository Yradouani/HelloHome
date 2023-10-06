<?php
$titre = "Accueil";
?>

<link rel="stylesheet" href="./style/homepage.css">
</head>

<body>
    <header>
        <div id="logo">
            <a href="?action=dashboardConnection">
                <img src="asset/hellohome_1.png" width="150px" alt="hellohome logo">
            </a>
        </div>
        <div class="navbar">
            <ul>
                <li><a href="#landingPage">Accueil</a></li>
                <li><a href="#spotlightTitle">Nos biens à la une</a></li>
                <li><a href="#landingPage">Recherche</a></li>
                <li><a href="#helloHomeAgency">L'agence</a></li>
                <li><a href="#contactSection">Contact</a></li>
            </ul>
        </div>

    </header>
    <!-- Landing page with picture in background and research form -->

    <div id="landingPage">
        <div id="researchForm">
            <form action="?action=getProperties" method="post" id="researchFormContent">

                <!-- Buttons that trigger rental or sale filters -->
                <div id="rentOrSaleBtns">
                    <input type="radio" name="transaction" class="firstBtn rental" id="btns-rental" value="rental">
                    <label for="btns-rental" id="btns-rental-lbl">Louer</label>
                    <input type="radio" name="transaction" class="firstBtn sale" id="btns-sale" value="sale" checked>
                    <label for="btns-sale" id="btns-sale-lbl">Acheter</label>
                </div>

                <!-- Property search form : general attributes for both sales and rentals, flats and houses -->
                <div id="location">
                    <label for="location">Ville:</label>
                    <select name="location" id="location-select">
                        <option value="all">Toutes localités</option>
                        <option value="Nice">Nice</option>
                        <option value="Saint-Jean-Cap-Ferrat">Saint-Jean-Cap-Ferrat</option>
                        <option value="Cagnes-sur-Mer">Cagnes-sur-Mer</option>
                    </select>
                </div>
                <div id="property">
                    <label for="property">Type de bien </label>
                    <select name="type" id="type-select">
                        <option value="house" id="houseSelected">Maison</option>
                        <option value="apartment" id="flatSelected">Appartement</option>
                    </select>
                </div>
                <div id="rooms">
                    <label for="rooms">Nombre de pièces(minimum):</label>
                    <input type="number" id="roomsInput" name="rooms"></input>
                </div>
                <div id="area">
                    <label for="area">Superficie minimum (m2)</label>
                    <input type="number" id="areaInput" name="area"></input>
                </div>

                <!-- button that trigger more filters (common to sales, rentals, flats and houses) -->
                <div id="filterBtn">
                    <button id="moreFiltersBtn" type="button">Plus de critères</button>
                </div>

                <!-- More detailed filters which will appear if user clicks on the upper button -->
                <section id="generalFilters">
                    <div id="seaDistance">
                        <label for="seaDistance">Distance de la mer maximum (m)</label>
                        <input type="number" id="seaDistanceInput" name="seaDistance"></input>
                    </div>
                    <div id="pool">
                        <label for="pool">Piscine</label>
                        <input type="checkbox" name="pool" value="1">
                    </div>
                    <div id="seaView">
                        <label for="seaView">Vue sur mer</label>
                        <input type="checkbox" name="seaView" value="1">
                    </div>
                </section>

                <!-- Specific attribute if it's a flat (triggered by -->
                <section id="flatFilters">
                    <div id="parking">
                        <label for="parking">Parking</label>
                        <input type="checkbox" name="parking" value="1">
                    </div>
                    <div id="elevator">
                        <label for="elevator">Ascenseur</label>
                        <input type="checkbox" name="elevator" value="1">
                    </div>
                    <div id="caretaking">
                        <label for="caretaking">Gardiennage</label>
                        <input type="checkbox" name="caretaking" value="1">
                    </div>
                    <div id="balcony">
                        <label for="balcony">Balcon</label>
                        <input type="checkbox" name="balcony" value="1">
                    </div>
                </section>

                <!-- Specific attribute if it's a house-->
                <section id="houseFilters">
                    <div id="garden">
                        <label for="garden">Jardin</label>
                        <input type="checkbox" name="garden" value="1">
                    </div>
                </section>

                <!-- Two specific attributes if it's a rental-->
                <section id="rentalFilters">
                    <div id="furnished">
                        <label for="furnished">Meublé </label>
                        <input type="checkbox" name="furnished" value="1">
                    </div>
                    <div id="rent">
                        <label for="rent">Loyer maximum</label>
                        <input type="number" id="rentInput" name="rent"></input>
                    </div>
                </section>

                <!-- One specific attribute if it's a sale-->
                <section id="saleFilters">
                    <div id="price">
                        <label for="price">Budget maximum</label>
                        <input type="number" id="priceInput" name="price"></input>
                    </div>
                </section>

                <!-- Search button -->
                <div id="searchBtn">
                    <button type="submit" id="searchFormBtn">Rechercher</button>
                </div>
            </form>

        </div>
    </div>

    <!-- Results of research (which only appear after a research : click event on the form) -->
    <?php if (isset($researchedProperties)) { ?>

        <div class="homePageTitles" id="resultsTitle">Résultats</div>
        <div id="researchedProperties">
            <?php if (empty($researchedProperties)) {
                echo '<div id="nullResearch"> Aucun bien ne correspond à vos critères de recherche </div>';
            } else {
                for ($i = 0; $i < count($researchedProperties); $i++) { ?>
                    <div class="propertyCard" id="researchedPropertyCard">
                        <div class="containerPicResearched">
                            <img class="propertyPic" src="./asset/img/<?= $researchedProperties[$i]["picture_url"] ?>">
                        </div>
                        <div class="propertyPreview" id="resultsPreview">
                            <div id="nameCard"> <?= $researchedProperties[$i]["property_name"] ?> </div>
                            <div id="typeCard">Type : <?php if ($propertyType == "house") {
                                                            echo "maison";
                                                        } else if ($propertyType == "apartment") {
                                                            echo "appartement";
                                                        } ?></div>
                            <div id="locationCard">à <?= $researchedProperties[$i]["property_location"] ?></div>
                            <div id="areaCard">Surface de <?= $researchedProperties[$i]["property_area"] ?> m2</div>
                            <div id="numberOfPiecesCard"><?= $researchedProperties[$i]["property_numberOfPieces"] ?> pièces </div>
                            <div id="transactionCard">Disponible à <?php if ($transactionStatus == "sale") {
                                                                        echo "l'achat";
                                                                    } else if ($transactionStatus == "rental") {
                                                                        echo "la location";
                                                                    } ?></div>
                            <div id="priceCard">Prix : <?php if (isset($researchedProperties[$i]["selling_price"])) {
                                                            echo $researchedProperties[$i]["selling_price"];
                                                        } else if (isset($researchedProperties[$i]["rent"])) {
                                                            echo $researchedProperties[$i]["rent"];
                                                        } ?> €</div>
                            <a href="?action=visitProperty&id=<?= $researchedProperties[$i]["id_property"] ?>"> <button id="visitBtn"> Je visite </button></a>
                        </div>
                    </div>


        <?php }
            }
        } ?>
        </div>

        <!-- Last/spotlight properties  -->
        <div class="homePageTitles" id="spotlightTitle">Nos biens à la une</div>
        <div id="lastProperties">
            <?php for ($i = 0; $i < count($displayLastProperties); $i++) {
                for ($j = 0; $j < count($displayLastProperties[$i]); $j++) {
                    if (isset($displayLastProperties[$i][$j])) {
                        $type = "appartement";
                    } else {
                        $type = "maison";
                    }
                    if (isset($displayLastProperties[$i][$j]["rent"])) {
                        $transaction = "la location";
                        $transactionPrice = "rent";
                    } else {
                        $transaction = "l'achat";
                        $transactionPrice = "selling_price";
                    } ?>
                    <div class="propertyCard">
                        <div class="containerPicSpotlight">
                            <img class="propertyPic" src="./asset/img/<?= $displayLastProperties[$i][$j]["picture_url"] ?>" alt="<?= $displayLastProperties[$i][$j]["picture_description"] ?>">
                        </div>
                        <div class="propertyPreview">
                            <div id="nameCard"> <?= $displayLastProperties[$i][$j]["property_name"] ?> </div>
                            <div id="typeCard">Type : <?= $type ?></div>
                            <div id="locationCard">à <?= $displayLastProperties[$i][$j]["property_location"] ?></div>
                            <div id="areaCard">Surface de <?= $displayLastProperties[$i][$j]["property_area"] ?> m2</div>
                            <div id="numberOfPiecesCard"><?= $displayLastProperties[$i][$j]["property_numberOfPieces"] ?> pièces </div>
                            <div id="transactionCard">Disponible à <?= $transaction ?></div>
                            <div id="priceCard">Prix : <?= $displayLastProperties[$i][$j]["$transactionPrice"] ?> €</div>
                            <a href="?action=visitProperty&id=<?= $displayLastProperties[$i][$j]["id_property"] ?>"> <button id="visitBtn"> Je visite </button></a>
                        </div>
                    </div>
            <?php }
            } ?>
        </div>


        <!--  HELLOHOME presentation text-->

        <div id="helloHomeAgency">
            <div class="homePageTitles" id="agencyTitle">Hello Home</div>
            <div id="helloHomeDescription">
                <div id="containerIllustrationAgency">
                    <img src="asset/hellohome_1.png" alt="real estate agency illustration" id="agency-img">
                </div>
                <h4>Votre agence immobilière de prestige à Nice</h4>
                <p id="descriptionAgency">
                    Hello Home est reconnue pour offrir une expérience de qualité supérieure, en proposant une large gamme
                    d'appartements et de villas de prestige situés dans les quartiers les plus recherchés de Nice, Cagnes-sur-Mer
                    et Saint-Jean-Cap-Ferrat. Les biens immobiliers que nous proposons se distinguent par leur raffinement,
                    leur emplacement privilégié, ainsi que par les prestations haut de gamme qu'ils offrent.
                    Notre équipe est composée de professionnels expérimentés et passionnés, qui mettent leur expertise
                    à votre service pour offrir un service personnalisé et sur mesure.</p>

            </div>
        </div>
        <!-- Contact form and informations -->
        <div class="homePageTitles" id="contactSection">Nous contacter</div>
        <div id="contactContent">
            <div id="contactForm">
                <h5>Formulaire de contact</h5>
                <form action="../index.php" method="post" id="contact">
                    <div id="nameDiv">
                        <input type="text" value="Nom" id="nameInput">
                        <input type="text" value="Prénom" id="firstNameInput">
                    </div>
                    <div id="contactDiv">
                        <input type="text" value="Téléphone" id="phoneInput">
                        <input type="text" value="Email" id="emailInput">
                    </div>
                    <div id="messageDiv">
                        <input type="textarea" value="Votre message" id="messageInput">
                    </div>
                    <div id="sendBtnDiv">
                        <button type="submit" id="contactBtn">Envoyer</button>
                    </div>
                </form>
            </div>
            <div id="contactDetails">
                <h5>Nos coordonnées</h5>
                <div id="containerMap">

                    <div id="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2884.3071215915875!2d7.265751115797838!3d43.70416617911946!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12cddaa88a077eed%3A0x4218e3ddc48aeb4c!2s20%20Avenue%20Notre%20Dame%2C%2006000%20Nice!5e0!3m2!1sfr!2sfr!4v1679902199416!5m2!1sfr!2sfr" width="350" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div id="containerAddress">
                        <div id="address">
                            <h6>Adresse</h6>
                            <p>20 avenue Notre-Dame </br>
                                06000 Nice</p>
                        </div>
                        <div id="phoneNumber"></div>
                        <h6>Téléphone:</h6>
                        <p>04-32-16-32-16</p>
                    </div>
                </div>
            </div>
        </div>
        <footer>
            <h1 id="footer">
                Mentions légales | 2023 |
                <a href="?action=dashboardConnection">
                    Dashboard
                </a>
            </h1>
        </footer>

        <script src="./js/home.js"></script>