<?php $titre = "Ajouter un bien";

$id_property = $_GET['id'];

// var_dump($properties);
// print_r($type);
// if (isset($house)) {
//     var_dump($house);
// } else if (isset($apartment)) {
//     var_dump($apartment);
// }

// echo ($picture[0]["picture_url"]);

// if (isset($sale)) {
//     var_dump($sale);
// } else if (isset($rental)) {
//     var_dump($rental);
// }

// echo $rental[0]['furnished'];

?>

<link rel="stylesheet" href="./style/dashboardUpdateProperty.css">
</head>

<body>
    <header>
        <a href="?action=displayDashboard">
            <img src="././asset/img/logo_white.png" alt="logo">
        </a>
        <div id="icon_container">
            <i class="bi bi-person-fill"></i>
            <i class="bi bi-x-circle-fill"></i>
        </div>
    </header>
    <div id="returnDashboard">
        <a href="?action=displayDashboard">
            <i id="arrowReturn" class="bi bi-arrow-left-circle"></i>
        </a>
    </div>
    <div id="containerDashboardAddProperty">
        <div id="titleAddProperty">
            <h1 class="titlePageDashboard">Modifier le bien</h1>
        </div>


        <form autocomplete="off" id="addPropertyForm" method="post" action="?action=validUpdateProperty&id=<?= $id_property ?>" enctype="multipart/form-data">

            <div id="addPropertyDetails">
                <div>
                    <label for="addTypeOfProperty" class="formElement"></label>
                    <select name="addTypeOfProperty" id="addTypeProperty" class="btnSelectAddDetails">
                        <option value="">Type</option>
                        <option value="house" id="btnSelectHouse" <?php if ($type[0] == "maison") {
                                                                        echo "selected='selected'";
                                                                    } ?>>Maison</option>
                        <option value="apartment" <?php if ($type[0] == "appartement") {
                                                        echo "selected='selected'";
                                                    } ?>>Appartement</option>
                    </select>
                </div>
                <div>
                    <label for="addStatutProperty" class="formElement"></label>
                    <select name="addStatutProperty" id="addStatut" class="btnSelectAddDetails">
                        <option value="">Statut</option>
                        <option value="sale" <?php if ($status[0] == "à vendre") {
                                                    echo "selected='selected'";
                                                } ?>>A vendre</option>
                        <option value="rent" id="btnSelectRent" <?php if ($status[0] == "à louer") {
                                                                    echo "selected='selected'";
                                                                } ?>>A louer</option>
                    </select>
                </div>
                <div>
                    <label for="locationOfProperty" class="formElement"></label>
                    <select name="locationOfProperty" id="locationProperty" class="btnSelectAddDetails">
                        <option value="">Ville</option>
                        <option value="Nice" <?php if ($properties['property_location'] == "Nice") {
                                                    echo "selected='selected'";
                                                } ?>>Nice</option>
                        <option value="Saint-Jean-Cap-Ferrat" <?php if ($properties['property_location'] == "Saint-Jean-Cap-Ferrat") {
                                                                    echo "selected='selected'";
                                                                } ?>>Saint-Jean-Cap-Ferrat</option>
                        <option value="Cagnes-sur-Mer" <?php if ($properties['property_location'] == "Cagnes-sur-Mer") {
                                                            echo "selected='selected'";
                                                        } ?>>Cagnes-sur-Mer</option>
                    </select>

                </div>
                <select name="availablity" class="btnSelectAddDetails">
                    <option value="disponible">Disponible</option>
                    <option value="vendu">Vendu</option>
                    <option value="loué">Loué</option>
                </select>
                <div>
                    <input type="text" name="nameProperty" id="propertyName" placeholder="<?= $properties['property_name'] ?>" value="<?= $properties['property_name'] ?>">

                </div>
                <?php if (isset($rental)) {
                ?>
                    <div class="specificationToRent">
                        <label for="furnishedProperty" class="formElement"></label>
                        <select name="furnishedProperty" id="furnished" class="btnSelectAddDetails">
                            <option value="furnished" <?php if (isset($rental) && $rental[0]['furnished'] == "1") {
                                                            echo "selected='selected'";
                                                        } ?>>Meublé</option>
                            <option value="noFurnished" <?php if (isset($rental) && $rental[0]['furnished'] == "0") {
                                                            echo "selected='selected'";
                                                        } ?>>Non meublé</option>
                        </select>
                    </div>

                <?php } ?>
                <?php if (isset($sale)) {
                ?>
                    <div id="price">
                        <label for="addPriceProperty" class="formElement"></label>
                        <input type="number" name="salePrice" value="<?= $sale[0]["selling_price"] ?>" class="formElement input" placeholder="<?= $sale[0]["selling_price"] ?> €">
                    </div>
                <?php } ?>
                <?php if (isset($rental)) {
                ?>
                    <div class="specificationToRent">
                        <label for="addPriceProperty" class="formElement"></label>
                        <input type="number" name="rent" value="<?= $rental[0]["rent"] ?>" class="formElement input" placeholder="<?= $rental[0]["rent"] ?> €">
                    </div>
                    <div class="specificationToRent">
                        <label for="chargesForRent" class="formElement"></label>
                        <input type="number" name="chargesForRent" value="<?= $rental[0]["charges"] ?>" class="formElement input" placeholder="<?= $rental[0]["charges"] ?> €">
                    </div>
                <?php } ?>
                <div>
                    <label for="area" class="formElement"></label>

                    <input type="number" name="area" value="<?= $properties["property_area"] ?>" class="formElement input" placeholder="<?= $properties["property_area"] ?> m²">
                </div>
                <div>
                    <label for="numberOfPieces" class="formElement"></label>
                    <input type="number" name="numberOfPieces" value="<?= $properties["property_numberOfPieces"] ?>" class="formElement input" placeholder="<?= $properties["property_numberOfPieces"] ?> pièces">
                </div>
                <div>
                    <label for="distanceFromTheSea" class="formElement"></label>
                    <input type="number" name="distanceFromTheSea" value="<?= $properties["property_distanceFromSea"] ?>" class="formElement input" placeholder="<?= $properties["property_distanceFromSea"] ?> mètres">

                </div>

            </div>
            <div id="btnCheckbox">
                <label for="swimmingpool" class="formElement">Piscine</label>
                <input type="checkbox" id="swimmingpool" class="btnCheckboxBonus" name="swimmingpool" value="swimmingpool" <?php if ($properties["property_swimmingpool"] == "1") {
                                                                                                                                echo "checked='checked'";
                                                                                                                            } ?>>
                <label for="seaView" class="formElement">Vue sur mer</label>
                <input type="checkbox" id="seaView" class="btnCheckboxBonus" name="seaView" value="seaView" <?php if ($properties["property_seaView"] == "1") {
                                                                                                                echo "checked='checked'";
                                                                                                            } ?>>
                <?php if (isset($house)) { ?>
                    <div id="houseProperty">
                        <label for="garden" class="formElement">Jardin</label>
                        <input type="checkbox" id="garden" class="btnCheckboxBonus" name="garden" value="garden" <?php if ($house[0]["garden"] == "1") {
                                                                                                                        echo "checked='checked'";
                                                                                                                    } ?>>
                        <input type="text" name="bonus" id="bonus" placeholder="<?= $house[0]["bonus"] ?>" value="<?= $house[0]["bonus"] ?>">
                    </div>
                <?php } ?>
                <?php if (isset($apartment)) { ?>
                    <div id="propertyApartment">
                        <label for="parking" class="formElement">Parking</label>
                        <input type="checkbox" id="parking" class="btnCheckboxBonus" name="parking" value="parking" <?php if ($apartment[0]["parking"] == "1") {
                                                                                                                        echo "checked='checked'";
                                                                                                                    } ?>>
                        <label for="lift" class="formElement">Ascenseur</label>
                        <input type="checkbox" id="lift" class="btnCheckboxBonus" name="elevator" value="elevator" <?php if ($apartment[0]["elevator"] == "1") {
                                                                                                                        echo "checked='checked'";
                                                                                                                    } ?>>
                        <label for="daycareService" class="formElement">Gardiennage</label>
                        <input type="checkbox" id="daycareService" class="btnCheckboxBonus" name="caretaking" value="caretaking" <?php if ($apartment[0]["caretaking"] == "1") {
                                                                                                                                        echo "checked='checked'";
                                                                                                                                    } ?>>
                        <label for="balcony" class="formElement">Balcon</label>
                        <input type="checkbox" id="balcony" class="btnCheckboxBonus" name="balcony" value="balcony" <?php if ($apartment[0]["balcony"] == "1") {
                                                                                                                        echo "checked='checked'";
                                                                                                                    } ?>>
                        <input type="text" id="floor" name="floor" class="" value="<?= $apartment[0]["floor"] ?>">
                    </div>
                <?php } ?>

                <div id="textarea">
                    <label for="descriptionProperty" class="formElement"></label>
                    <textarea id="descritionOfTheProperty" name="descriptionProperty" value=""><?= $properties["property_description"] ?></textarea>

                </div>
                <label for="picture"><?php echo $picture[0]['picture_url']; ?></label>
                <input type="file" name="picture" id="picture" value="<?php echo $picture[0]['picture_url']; ?>" />


                <!-- <button type="button" id="addImage">Ajouter des images</button> -->
                <div class="bottomForm">
                    <button type="submit" class="propertySubmitBtn"> Valider </button>
                    <!-- <button type="reset" class="propertySubmitBtn"> Annuler </button> -->
                </div>
            </div>
        </form>
    </div>
    <footer>
        <p>HelloHome © 2023</p>
    </footer>

    <script src="./js/updateProperty.js"></script>