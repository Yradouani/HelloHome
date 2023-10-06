<?php
require_once './views/View.php';
require_once './models/Property.php';
require_once './models/Transaction.php';
require_once './models/Rental.php';
require_once './models/Sale.php';
require_once './models/House.php';
require_once './models/Apartment.php';
require_once './models/Picture.php';
require_once './controllers/TransactionController.php';
//include './models/Connection.php';
require_once 'models/Connection.php';

require_once './controllers/UserController.php';

class PropertyController
{
    private $property;
    private $transaction;
    private $rental;
    private $sale;
    private $house;
    private $apartment;
    private $transactionCtrl;
    private $userCtrl;
    private $picture;

    public function __construct()
    {
        $this->property = new Property();
        $this->house = new House();
        $this->apartment = new Apartment();
        $this->transaction = new Transaction();
        $this->rental = new Rental();
        $this->sale = new Sale();
        $this->transactionCtrl = new TransactionController();
        $this->picture = new Picture();


        $this->userCtrl = new UserController();
    }


    public function home()
    {
        $displayLastProperties = $this->displayLastProperties();
        // $displayLastProperties = "hello";
        $view = new View("Home");
        $view->generer(array('displayLastProperties' => $displayLastProperties));
    }

    // Gives an array with property_id, property_type(appt or house) and transaction_type(rental or sale)
    public function getTypesByPropertyId($id_property)
    {
        if ($this->apartment->getOneApartment($id_property)) {
            // echo "toto";
            $propertyType = "apartment";
            $transactionId = $this->transaction->getOneTransaction($id_property);
            if ($this->sale->getOneSale($transactionId["id"])) {
                $transactionType = "sale";
            } else if ($this->rental->getOneRental($transactionId["id"])) {
                $transactionType = "rental";
            }
        } elseif ($this->house->getOneHouse($id_property)) {

            $propertyType = "house";
            $transactionId = $this->transaction->getOneTransaction($id_property);
            if ($this->sale->getOneSale($transactionId["id"])) {
                $transactionType = "sale";
            } else if ($this->rental->getOneRental($transactionId["id"])) {
                $transactionType = "rental";
            }
        }
        $result = ['id' => $id_property, 'type' => $propertyType, 'transaction' => $transactionType];

        return ($result);
    }

    public function displayLastProperties()
    {
        try {
            $lastProperties = $this->property->getLastProperties();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        //Looping on 3 last properties : execute queries to select all datas we need to display 3 last properties
        for ($i = 0; $i < count($lastProperties); $i++) {
            $getTypes[$i] = $this->getTypesByPropertyId($lastProperties[$i]["id"]);
            $request[$i] = $this->property->getDetailsLastProperties($getTypes[$i]['id'], $getTypes[$i]['type'], $getTypes[$i]['transaction']);
        }
        return $request;
    }

    public function addProperty()
    {
        $properties = "hello";
        $view = new View("AddProperty");
        $view->generer(array('properties' => $properties));
    }

    public function validAddProperty()
    {

        $propertyInfo = [];
        if (isset($_POST['addTypeOfProperty']) && $_POST['addTypeOfProperty'] != "") {
            $typeOfProperty = $_POST['addTypeOfProperty'];
            $propertyInfo['typeOfProperty'] = $typeOfProperty;

            if ($typeOfProperty == "house") {
                if (isset($_POST['garden']) && $_POST['garden'] != "") {
                    $garden = 1;
                } else {
                    $garden = 0;
                }
                $propertyInfo['garden'] = $garden;

                if (isset($_POST['bonus']) && $_POST['bonus'] != "") {
                    $bonus = $_POST['bonus'];
                    $propertyInfo['bonus'] = $_POST['bonus'];
                } else {
                    $bonus = "";
                }
            } else if ($typeOfProperty == "apartment") {
                if (isset($_POST['parking']) && $_POST['parking'] != "") {
                    $parking = 1;
                } else {
                    $parking = 0;
                }
                $propertyInfo['parking'] = $parking;

                if (isset($_POST['floor']) && $_POST['floor'] != "") {
                    $floor = 1;
                } else {
                    $floor = 0;
                }
                $propertyInfo['floor'] = $floor;

                if (isset($_POST['caretaking']) && $_POST['caretaking'] != "") {
                    $caretaking = 1;
                } else {
                    $caretaking = 0;
                }
                $propertyInfo['caretaking'] = $caretaking;

                if (isset($_POST['elevator']) && $_POST['elevator'] != "") {
                    $elevator = 1;
                } else {
                    $elevator = 0;
                }
                $propertyInfo['elevator'] = $elevator;

                if (isset($_POST['balcony']) && $_POST['balcony'] != "") {
                    $balcony = 1;
                } else {
                    $balcony = 0;
                }
                $propertyInfo['balcony'] = $balcony;
            }
        }

        if (isset($_POST['addStatutProperty']) && $_POST['addStatutProperty'] != "") {
            $statutProperty = $_POST['addStatutProperty'];
            $propertyInfo['statutProperty'] = $_POST['addStatutProperty'];

            if ($statutProperty == "sale") {
                if (isset($_POST['salePrice']) && $_POST['salePrice'] != "") {
                    $selling_price = $_POST['salePrice'];
                    $propertyInfo['salePrice'] = $selling_price;
                }
            } else if ($statutProperty == "rent") {
                if (isset($_POST['rent']) && $_POST['rent'] != "") {
                    $rent = $_POST['rent'];
                    $propertyInfo['rent'] = $rent;
                }
                if (isset($_POST['chargesForRent']) && $_POST['chargesForRent'] != "") {
                    $charges = $_POST['chargesForRent'];
                    $propertyInfo['charges'] = $charges;
                }
                if (isset($_POST['furnishedProperty']) && $_POST['furnishedProperty'] != "") {
                    $furnished = 1;
                } else {
                    $furnished = 0;
                }
                $propertyInfo['furnished'] = $furnished;
            }
        }
        if (isset($_POST['locationOfProperty']) && $_POST['locationOfProperty'] != "") {
            $property_location = $_POST['locationOfProperty'];
            $propertyInfo['property_location'] = $_POST['locationOfProperty'];
        }
        if (isset($_POST['area']) && $_POST['area'] != "") {
            $property_area = $_POST['area'];
            $propertyInfo['property_area'] = $property_area;
        }
        if (isset($_POST['numberOfPieces']) && $_POST['numberOfPieces'] != "") {
            $property_numberOfPieces = $_POST['numberOfPieces'];
            $propertyInfo['property_numberOfPieces'] = $property_numberOfPieces;
        }
        if (isset($_POST['distanceFromTheSea']) && $_POST['distanceFromTheSea'] != "") {
            $property_distanceFromSea = $_POST['distanceFromTheSea'];
            $propertyInfo['property_distanceFromSea'] = $property_distanceFromSea;
        }
        if (isset($_POST['swimmingpool']) && $_POST['swimmingpool'] != "") {
            $property_swimmingpool = true;
        } else {
            $property_swimmingpool = 0;
        }
        $propertyInfo['property_swimmingpool'] = $property_swimmingpool;

        if (isset($_POST['seaView']) && $_POST['seaView'] != "") {
            $property_seaView = true;
        } else {
            $property_seaView = 0;
        }
        $propertyInfo['property_seaView'] = $property_seaView;

        if (isset($_POST['nameProperty']) && $_POST['nameProperty'] != "") {
            $property_name = $_POST['nameProperty'];
            $propertyInfo['property_name'] = $property_name;
        }
        if (isset($_POST['descriptionProperty']) && $_POST['descriptionProperty'] != "") {
            $property_description = $_POST['descriptionProperty'];
            $propertyInfo['property_description'] = $_POST['descriptionProperty'];
        }
        if (isset($_FILES['picture']) && $_FILES['picture'] != "") {
            $picture_name = $_FILES['picture']['name'];
            $picture_tmp = $_FILES['picture']['tmp_name'];

            $destination_folder = './asset/img/';

            try {
                move_uploaded_file($picture_tmp, $destination_folder . $picture_name);
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }

        session_start();
        $id_property = $this->property->addProperty($property_name, $property_description, $property_location, $property_area, $property_numberOfPieces, $property_distanceFromSea, $property_swimmingpool, $property_seaView, $_SESSION['user_id']);
        $this->picture->addPicture($id_property, $property_name, $picture_name);
        $id_transaction = $this->transactionCtrl->addTransaction($id_property, $statutProperty);
        if ($typeOfProperty == "house") {
            $this->house->addHouse($id_property, $garden, $bonus);
        } else if ($typeOfProperty == "apartment") {
            $this->apartment->addApartment($id_property, $parking, $floor, $elevator, $caretaking, $balcony);
        }
        if ($statutProperty == "sale") {
            $this->transactionCtrl->addSale($id_transaction, $selling_price);
        } else if ($statutProperty == "rent") {
            $this->transactionCtrl->addRental($id_transaction, $rent, $charges, $furnished);
        }

        header("LOCATION: http://localhost/POO_Immo/?action=displayDashboard");
    }


    public function updateProperty()
    {
        $id_property = $_GET['id'];
        $status = [];
        $type = [];
        $isSale = null;
        $isRental = null;
        $isHouse = null;
        $isApartment = null;
        $property = $this->property->getOneProperty($id_property);

        if ($this->sale->getAllPropertyToSale($id_property)) {
            $status[0] = "à vendre";
            $isSale = $this->sale->getAllPropertyToSale($id_property);
        } else if ($this->rental->getAllPropertyToRent($id_property)) {
            $status[0] = "à louer";
            $isRental = $this->rental->getAllPropertyToRent($id_property);
        }

        if ($this->house->getAllHousesByUser($id_property)) {
            $type[0] = "maison";
            $isHouse = $this->house->getAllHousesByUser($id_property);
        } else if ($this->apartment->getAllApartmentsByUser($id_property)) {
            $type[0] = "appartement";
            $isApartment = $this->apartment->getAllApartmentsByUser($id_property);
        }

        $pictures = $this->picture->getPicturesOfOneProperty($id_property);

        $view = new View("UpdateProperty");
        $view->generer(array(
            'properties' => $property,
            'type' => $type,
            'status' => $status,
            ($isSale ? 'sale' : 'rental') => ($isSale ? $isSale : $isRental),
            ($isHouse ? 'house' : 'apartment') => ($isHouse ? $isHouse : $isApartment),
            'picture' => $pictures

        ));
    }

    public function validUpdateProperty()

    {
        $id_property = $_GET['id'];
        $propertyInfo = [];
        if (isset($_POST['addTypeOfProperty']) && $_POST['addTypeOfProperty'] != "") {
            $typeOfProperty = $_POST['addTypeOfProperty'];
            $propertyInfo['typeOfProperty'] = $typeOfProperty;

            if ($typeOfProperty == "house") {
                if (isset($_POST['garden']) && $_POST['garden'] != "") {
                    $garden = 1;
                } else {
                    $garden = 0;
                }
                $propertyInfo['garden'] = $garden;

                if (isset($_POST['bonus']) && $_POST['bonus'] != "") {
                    $bonus = $_POST['bonus'];
                    $propertyInfo['bonus'] = $_POST['bonus'];
                }
            } else if ($typeOfProperty == "apartment") {
                if (isset($_POST['parking']) && $_POST['parking'] != "") {
                    $parking = 1;
                } else {
                    $parking = 0;
                }
                $propertyInfo['parking'] = $parking;

                if (isset($_POST['floor']) && $_POST['floor'] != "") {
                    $floor = 1;
                } else {
                    $floor = 0;
                }
                $propertyInfo['floor'] = $floor;

                if (isset($_POST['caretaking']) && $_POST['caretaking'] != "") {
                    $caretaking = 1;
                } else {
                    $caretaking = 0;
                }
                $propertyInfo['caretaking'] = $caretaking;

                if (isset($_POST['elevator']) && $_POST['elevator'] != "") {
                    $elevator = 1;
                } else {
                    $elevator = 0;
                }
                $propertyInfo['elevator'] = $elevator;

                if (isset($_POST['balcony']) && $_POST['balcony'] != "") {
                    $balcony = 1;
                } else {
                    $balcony = 0;
                }
                $propertyInfo['balcony'] = $balcony;
            }
        }

        if (isset($_POST['addStatutProperty']) && $_POST['addStatutProperty'] != "") {
            $statutProperty = $_POST['addStatutProperty'];
            $propertyInfo['statutProperty'] = $_POST['addStatutProperty'];

            if ($statutProperty == "sale") {
                if (isset($_POST['salePrice']) && $_POST['salePrice'] != "") {
                    $selling_price = $_POST['salePrice'];
                    $propertyInfo['salePrice'] = $selling_price;
                }
            } else if ($statutProperty == "rent") {
                if (isset($_POST['rent']) && $_POST['rent'] != "") {
                    $rent = $_POST['rent'];
                    $propertyInfo['rent'] = $rent;
                }
                if (isset($_POST['chargesForRent']) && $_POST['chargesForRent'] != "") {
                    $charges = $_POST['chargesForRent'];
                    $propertyInfo['charges'] = $charges;
                }
                if (isset($_POST['furnishedProperty']) && $_POST['furnishedProperty'] != "") {
                    $furnished = 1;
                } else {
                    $furnished = 0;
                }
                $propertyInfo['furnished'] = $furnished;
            }
        }
        if (isset($_POST['locationOfProperty']) && $_POST['locationOfProperty'] != "") {
            $property_location = $_POST['locationOfProperty'];
            $propertyInfo['property_location'] = $_POST['locationOfProperty'];
        }
        if (isset($_POST['area']) && $_POST['area'] != "") {
            $property_area = $_POST['area'];
            $propertyInfo['property_area'] = $property_area;
        }
        if (isset($_POST['numberOfPieces']) && $_POST['numberOfPieces'] != "") {
            $property_numberOfPieces = $_POST['numberOfPieces'];
            $propertyInfo['property_numberOfPieces'] = $property_numberOfPieces;
        }
        if (isset($_POST['distanceFromTheSea']) && $_POST['distanceFromTheSea'] != "") {
            $property_distanceFromSea = $_POST['distanceFromTheSea'];
            $propertyInfo['property_distanceFromSea'] = $property_distanceFromSea;
        }
        if (isset($_POST['swimmingpool']) && $_POST['swimmingpool'] != "") {
            $property_swimmingpool = true;
        } else {
            $property_swimmingpool = 0;
        }
        $propertyInfo['property_swimmingpool'] = $property_swimmingpool;

        if (isset($_POST['seaView']) && $_POST['seaView'] != "") {
            $property_seaView = true;
        } else {
            $property_seaView = 0;
        }
        $propertyInfo['property_seaView'] = $property_seaView;

        if (isset($_POST['nameProperty']) && $_POST['nameProperty'] != "") {
            $property_name = $_POST['nameProperty'];
            $propertyInfo['property_name'] = $property_name;
        }
        if (isset($_POST['descriptionProperty']) && $_POST['descriptionProperty'] != "") {
            $property_description = $_POST['descriptionProperty'];
            $propertyInfo['property_description'] = $property_description;
        }
        if (isset($_FILES['picture']) && $_FILES['picture'] != "") {
            $picture_name = $_FILES['picture']['name'];
            $picture_tmp = $_FILES['picture']['tmp_name'];

            $destination_folder = './asset/img/';

            try {
                move_uploaded_file($picture_tmp, $destination_folder . $picture_name);
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }

        $this->property->updateProperty($property_name, $property_description, $property_location, $property_area, $property_numberOfPieces, $property_distanceFromSea, $property_swimmingpool, $property_seaView, $id_property);
        $id_transaction = $this->transaction->updateTransaction($_POST['availablity'], $id_property);
        $this->picture->updatePicture($id_property, $picture_name);
        if ($typeOfProperty == "house") {
            $this->house->updateHouse($garden, $bonus, $id_property);
        } else if ($typeOfProperty == "apartment") {
            $this->apartment->updateApartment($parking, $floor, $elevator, $caretaking, $balcony, $id_property);
        }
        if ($statutProperty == "sale") {
            $this->sale->updateSale($id_transaction, $selling_price);
        } else if ($statutProperty == "rent") {
            $this->rental->updateRental($id_transaction, $rent, $charges, $furnished);
        }

        try {
            if (!isset($_SESSION)) {
                session_start();
            }
            $allProperties = $this->property->getAllPropertyOfOneAdmin($_SESSION['user_id']);
            $status = [];
            $type = [];

            for ($i = 0; $i < count($allProperties); $i++) {
                if ($this->sale->getAllPropertyToSale($allProperties[$i]['id'])) {
                    $status[$i] = "A vendre";
                } else if ($this->rental->getAllPropertyToRent($allProperties[$i]['id'])) {
                    $status[$i] = "A louer";
                }
            }
            for ($i = 0; $i < count($allProperties); $i++) {
                if ($this->house->getAllHousesByUser($allProperties[$i]['id'])) {
                    $type[$i] = "Maison";
                } else if ($this->apartment->getAllApartmentsByUser($allProperties[$i]['id'])) {
                    $type[$i] = "Appartement";
                }
            }
            header("LOCATION: http://localhost/POO_Immo/?action=displayDashboard");
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function displayProperty()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $type = $this->getTypesByPropertyId($id)["type"];
            $transaction =  $this->getTypesByPropertyId($id)["transaction"];
            $displayProperty = $this->property->getDetailsLastProperties($id, $type, $transaction);
            $picture = $this->picture->getPicturesOfOneProperty($id);
            $propView = new View("Property");
            $propView->generer(array("displayProperty" => $displayProperty, "picture" => $picture));
        }
    }

    public function getTypeFromUrl($url)
    {
        $parsedUrl = parse_url($url);
        $query = $parsedUrl['query'];
        parse_str($query, $queryParams);
        return $queryParams['type'];
    }

    public function getTransactionFromUrl($url)
    {
        $parsedUrl = parse_url($url);
        $query = $parsedUrl['query'];
        parse_str($query, $queryParams);
        return $queryParams['transaction'];
    }


    //return $displayProperty;

    public function validDeleteProperty($id_property)
    {
        session_start();
        $transaction =  $this->transaction->getOneTransaction($id_property);
        if ($transaction != false) {
            $idTransaction = $transaction["id"];
            $this->rental->deleteRental($idTransaction);
            $this->sale->deleteSale($idTransaction);
            $this->picture->deletePicture($id_property);
            $this->house->deleteHouse($id_property);
            $this->apartment->deleteApartment($id_property);
            $this->transaction->deleteOneTransaction($id_property);
            $this->property->deleteProperty($id_property);
        }
        $this->userCtrl->displayDashboard();
    }


    public function getProperties()
    {
        // FILTERS ARRAY
        $researchProperties = [];

        if (isset($_POST['transaction']) && $_POST['transaction'] != "") {
            $transactionStatus = $_POST['transaction'];
        }
        if (isset($_POST['type']) && $_POST['type'] != "") {
            $propertyType = $_POST['type'];
        }
        if (isset($_POST['location']) && $_POST['location'] != "all") {
            $propertyLocation = $_POST['location'];
            $researchProperties['property_location'] = $propertyLocation;
        }
        if (isset($_POST['rooms']) && $_POST['rooms'] != "") {
            $numberOfPieces = $_POST['rooms'];
            $researchProperties['property_numberOfPieces'] = $numberOfPieces;
        }
        if (isset($_POST['area']) && $_POST['area'] != "") {
            $area = $_POST['area'];
            $researchProperties['property_area'] = $area;
        }
        if (isset($_POST['seaDistance']) && $_POST['seaDistance'] != "") {
            $distanceFromSea = $_POST['seaDistance'];
            $researchProperties['property_distanceFromSea'] = $distanceFromSea;
        }
        if (isset($_POST['pool']) && $_POST['pool'] != "") {
            $pool = $_POST['pool'];
            $researchProperties['property_swimmingpool'] = $pool;
        }
        if (isset($_POST['seaView']) && $_POST['seaView'] != "") {
            $seaView = $_POST['seaView'];
            $researchProperties['property_seaView'] = $seaView;
        }
        if (isset($_POST['garden']) && $_POST['garden'] != "") {
            $garden = $_POST['garden'];
            $researchProperties['garden'] = $garden;
        }
        if (isset($_POST['parking']) && $_POST['parking'] != "") {
            $parking = $_POST['parking'];
            $researchProperties['parking'] = $parking;
        }
        if (isset($_POST['elevator']) && $_POST['elevator'] != "") {
            $elevator = $_POST['elevator'];
            $researchProperties['elevator'] = $elevator;
        }
        if (isset($_POST['caretaking']) && $_POST['caretaking'] != "") {
            $caretaking = $_POST['caretaking'];
            $researchProperties['caretaking'] = $caretaking;
        }
        if (isset($_POST['balcony']) && $_POST['balcony'] != "") {
            $balcony = $_POST['balcony'];
            $researchProperties['balcony'] = $balcony;
        }
        if (isset($_POST['furnished']) && $_POST['furnished'] != "") {
            $furnished = $_POST['furnished'];
            $researchProperties['furnished'] = $furnished;
        }
        if (isset($_POST['price']) && $_POST['price'] != "") {
            $price = $_POST['price'];
            $researchProperties['selling_price'] = $price;
        }
        if (isset($_POST['rent']) && $_POST['rent'] != "") {
            $rent = $_POST['rent'];
            $researchProperties['rent'] = $rent;
        }

        $where = " WHERE ";
        $params = [];
        $sqlParts = [];
        $authorizedKeys = [
            'property_location', 'property_area', 'property_numberOfPieces',
            'property_distanceFromSea', 'property_swimmingpool',
            'property_seaView', 'parking', 'elevator', 'caretaking',
            'balcony', 'garden', 'rent', 'selling_price', 'furnished'
        ]; // Ici les noms d'inputs acceptés pour la clause de condition
        foreach ($researchProperties as $key => $value) {

            if (in_array($key, $authorizedKeys)) {
                if ($key == 'property_area' || $key == 'property_numberOfPieces') {
                    $sqlParts[] = "$key >= ?";
                } else if ($key == 'property_distanceFromSea' || $key == 'rent' || $key == 'selling_price') {
                    $sqlParts[] = "$key <= ?";
                } else if (
                    $key == 'property_location' || $key == 'property_swimmingpool'
                    || $key == 'parking' || $key == 'elevator' || $key == 'caretaking'
                    || $key == 'balcony' || $key == 'furnished' || $key == 'garden'
                ) {
                    $sqlParts[] = "$key = ?";
                }
                $params[] = $value;
            }
        }

        if (count($sqlParts) >= 1) {
            foreach ($sqlParts as $k => $v) {
                $and = ($k < count($sqlParts) - 1) ? ' AND ' : null;
                $where .= $v . $and;
            }
        }

        $researchedProperties = $this->property->getProperties($propertyType, $transactionStatus, $where, $params);
        $displayLastProperties = $this->displayLastProperties();
        $view = new View("Home");
        $view->generer(array('researchedProperties' => $researchedProperties, 'propertyType' => $propertyType, 'transactionStatus' => $transactionStatus, 'displayLastProperties' => $displayLastProperties));
    }
}
