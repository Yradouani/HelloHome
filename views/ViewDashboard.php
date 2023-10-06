<?php $titre = "Tableau de bord";
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
<link rel="stylesheet" href="./style/dashboard.css">

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
            <a href="?">
                <i class="bi bi-window-fullscreen"></i>
            </a>

        </div>
    </header>

    <div id="containerHomePageDashboard">
        <div id="positionElementsHomePageDashboard">
            <div id="managementProperty">
                <h1 class="titlePageDashboard">Gestion des biens</h1>

                <div id="dashboardManagementFilters">

                    <select name="locationOfProperty" id="locationProperty" class="btnFilterSelectDashboard">
                        <option value="all">Choisir une ville</option>
                        <option value="Nice">Nice</option>
                        <option value="Saint-Jean-Cap-Ferrat">Saint-Jean-Cap-Ferrat</option>
                        <option value="Cagnes-sur-Mer">Cagnes-sur-Mer</option>
                    </select>

                    <select name="filterPropertyStatut" id="dashboardPropertyStatus" class="btnFilterSelectDashboard">
                        <option value="all">Choisir un statut</option>
                        <option value="sale">A vendre</option>
                        <option value="rent">A louer</option>
                    </select>

                    <select name="filterTypeOfProperty" id="dashaboardTypeProperty" class="btnFilterSelectDashboard">
                        <option value="all">Choisir un type</option>
                        <option value="apartment">Appartement</option>
                        <option value="house">Maison</option>
                    </select>

                    <a href="?action=addProperty">
                        <button type="button" id="btnAddProperty"> Ajouter un bien</button>
                    </a>
                </div>

                <div id="listOfProperties">
                    <table>
                        <thead>
                            <tr style="border : solid 1px">
                                <th>Nom</th>
                                <th>Ville</th>
                                <th>Statut</th>
                                <th>Type</th>
                            </tr>
                        </thead>
                        <tbody id="contenuOfTable">
                            <?php
                            for ($i = 0; $i < count($allProperties); $i++) {

                            ?>
                                <tr class="propertyItem" style="border : solid 1px">
                                    <td class="listOfPropertyByUser">
                                        <a href="?action=updateProperty&id=<?= $allProperties[$i]['id'] ?>">
                                            <?= $allProperties[$i]['property_name'] ?>
                                        </a>
                                    </td>
                                    <td class="propertyLocation"><?= $allProperties[$i]['property_location'] ?></td>
                                    <td class="propertyStatus"><?= $status[$i] ?></td>
                                    <td class="propertyType"><?= $type[$i] ?></td>

                                    <td>
                                        <a href="?action=removeProperty&propertyId=<?= $allProperties[$i]['id'] ?>">
                                            <i class="bi bi-trash-fill"></i>
                                    </td>
                                    </a>
                                    </td>
                                <?php
                            }
                                ?>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div id="statistiquesDashboard">
                <h1>Statistiques</h1>
                <div id="statistic_container">
                    <div id="numberOfPropertiesAvailable" class="numberStatistique">
                        <h3 class="statistiques">Nombre de biens total</h3>
                        <p id="numberPropertyAvailable">
                            <?php
                            echo count($allProperties);
                            ?>
                        </p>
                    </div>
                    <div id="numberOfPropertiesToSale" class="numberStatistique">
                        <h3 class="statistiques">Nombre de biens à vendre</h3>
                        <p id="numberPropertySale">
                            <?php
                            echo $countToSell;
                            ?>
                        </p>
                    </div>

                    <div id="numberOfPropertiesToRent" class="numberStatistique">
                        <h3 class="statistiques">Nombre de biens à louer</h3>
                        <p id="numberPropertyRent">
                            <?php
                            echo $countToRent;
                            ?>
                        </p>
                    </div>
                    <div id="numberOfPropertiesAsHouses" class="numberStatistique">
                        <h3 class="statistiques">Nombre de maisons</h3>
                        <p id="numberHouses">
                            <?php
                            echo $countNumberOfHouses;
                            ?>
                        </p>
                    </div>

                    <div id="numberOfPropertiesAsApartments" class="numberStatistique">
                        <h3 class="statistiques">Nombre d'appartements</h3>
                        <p id="numberApartments">
                            <?php
                            echo $countNumberOfApartments;
                            ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <footer>
            <p>HelloHome © 2023</p>
        </footer>

        <script src="js/dashboardHome.js"></script>