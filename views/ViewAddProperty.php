<?php $titre = "Ajouter un bien"; ?>

<link rel="stylesheet" href="./style/dashboardAddProperty.css">
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

    <div id="returnDashboard">
        <a href="?action=displayDashboard">
            <i id="arrowReturn" class="bi bi-arrow-left-circle"></i>
        </a>
    </div>

    <div id="containerDashboardAddProperty">
        <div id="titleAddProperty">
            <h1 class="titlePageDashboard">Ajouter un bien</h1>
        </div>

        <form id="addPropertyForm" method="post" action="?action=validAddProperty" enctype="multipart/form-data">
            <div id="addPropertyDetails">
                <div>
                    <label for="addTypeOfProperty" class="formElement"></label>
                    <select name="addTypeOfProperty" id="addTypeProperty" class="btnSelectAddDetails">
                        <option value="">Type</option>
                        <option value="house" id="btnSelectHouse">Maison</option>
                        <option value="apartment">Appartement</option>
                    </select>
                </div>
                <div>
                    <label for="addStatutProperty" class="formElement"></label>
                    <select name="addStatutProperty" id="addStatut" class="btnSelectAddDetails">
                        <option value="">Statut</option>
                        <option value="sale">A vendre</option>
                        <option value="rent" id="btnSelectRent">A louer</option>
                    </select>
                </div>
                <div>
                    <label for="locationOfProperty" class="formElement"></label>
                    <select name="locationOfProperty" id="locationAddProperty" class="btnSelectAddDetails">
                        <option value="">Ville</option>
                        <option value="Nice">Nice</option>
                        <option value="Saint-Jean-Cap-Ferrat">Saint-Jean-Cap-Ferrat</option>
                        <option value="Cagnes-sur-Mer">Cagnes-sur-Mer</option>
                    </select>
                </div>

                <div class="specificationToRent">
                    <label for="furnishedProperty" class="formElement"></label>
                    <select name="furnishedProperty" id="furnished" class="btnSelectAddDetails">
                        <option value="furnished">Meublé</option>
                        <option value="noFurnished">Non meublé</option>
                    </select>
                </div>
                <div>
                    <input type="text" name="nameProperty" id="propertyName" placeholder="Nom du bien*">
                </div>
                <div id="price">
                    <label for="addPriceProperty" class="formElement"></label>
                    <input type="number" name="salePrice" value="" class="formElement input" placeholder="Prix de vente*">
                </div>
                <div class="specificationToRent">
                    <label for="addPriceProperty" class="formElement"></label>
                    <input type="number" name="rent" value="" class="formElement input" placeholder="Prix par mois*">
                </div>
                <div class="specificationToRent">
                    <label for="chargesForRent" class="formElement"></label>
                    <input type="number" name="chargesForRent" value="" class="formElement input" placeholder="Charges par mois*">
                </div>
                <div>
                    <label for="area" class="formElement"></label>
                    <input type="number" name="area" value="" class="formElement input" placeholder="Surface en m2*">
                </div>
                <div>
                    <label for="numberOfPieces" class="formElement"></label>
                    <input type="number" name="numberOfPieces" value="" class="formElement input" placeholder="Nombre de pièce*">
                </div>
                <div>
                    <label for="distanceFromTheSea" class="formElement"></label>
                    <input type="number" name="distanceFromTheSea" value="" class="formElement input" placeholder="Distance de la mer en mètre*">
                </div>

            </div>
            <div id="btnCheckbox">
                <label for="swimmingpool" class="formElement">Piscine</label>
                <input type="checkbox" id="swimmingpool" class="btnCheckboxBonus" name="swimmingpool" value="swimmingpool">
                <label for="seaView" class="formElement">Vue sur mer</label>
                <input type="checkbox" id="seaView" class="btnCheckboxBonus" name="seaView" value="seaView">
                <div id="houseProperty">
                    <label for="garden" class="formElement">Jardin</label>
                    <input type="checkbox" id="garden" class="btnCheckboxBonus" name="garden" value="garden">
                    <input type="text" name="bonus" id="bonus" placeholder="Bonus">
                </div>
                <div id="propertyApartment">
                    <label for="parking" class="formElement">Parking</label>
                    <input type="checkbox" id="parking" class="btnCheckboxBonus" name="parking" value="parking">
                    <label for="lift" class="formElement">Ascenseur</label>
                    <input type="checkbox" id="lift" class="btnCheckboxBonus" name="elevator" value="elevator">
                    <label for="daycareService" class="formElement">Gardiennage</label>
                    <input type="checkbox" id="daycareService" class="btnCheckboxBonus" name="caretaking" value="caretaking">
                    <label for="balcony" class="formElement">Balcon</label>
                    <input type="checkbox" id="balcony" class="btnCheckboxBonus" name="balcony" value="balcony">

                    <input type="text" id="floor" name="floor" class="" value="floor">
                </div>

                <div id="textarea">
                    <label for="descriptionProperty" class="formElement"></label>
                    <textarea id="descritionOfTheProperty" name="descriptionProperty" placeholder="Description*" value=""></textarea>
                </div>
                <label for="picture" id="add_picture">Ajouter une image</label>
                <input type="file" name="picture" id="picture" class="inputfile">

                <div class="bottomForm">

                    <button type="submit" class="propertySubmitBtn" id="validateFormAddProperty"> Valider </button>
                    <button type="reset" class="propertySubmitBtn"> Annuler </button>

                </div>
            </div>
        </form>
    </div>
    <footer>
        <p>HelloHome © 2023</p>
    </footer>
    <script src="js/dashboardHome.js"></script>