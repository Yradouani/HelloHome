<?php
// require __DIR__ . '/../views/View.php';
require_once './models/Transaction.php';
require_once './models/Sale.php';
require_once './models/Rental.php';

class TransactionController
{
    private $transaction;
    private $sale;
    private $rental;

    public function __construct()
    {
        $this->transaction = new Transaction();
        $this->sale = new Sale();
        $this->rental = new Rental();
    }
    public function addTransaction($id_property, $statutProperty)
    {
        $transaction_onlineDate = date('Y-m-d');
        $transaction_status = "available";
        $id_transaction = $this->transaction->addNewTransaction($transaction_onlineDate, $transaction_status, $id_property);

        return $id_transaction;
    }

    public function addSale($id_transaction, $selling_price)
    {
        $this->sale->addSale($id_transaction, $selling_price);
    }
    public function addRental($id_transaction, $rent, $charges, $furnished)
    {
        $this->rental->addRental($id_transaction, $rent, $charges, $furnished);
    }
}
