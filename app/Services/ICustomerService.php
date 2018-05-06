<?php
namespace App\Services;

interface ICustomerService {
    /**
     * Retrieves the customer list.
     *
     * @return \App\Customer[]
     */ 
    public function listAllCustomers();

    /**
     * Retrieves the customer details for a given customer.
     *
     * @param int $customerId The customer ID.
     * @return \App\Order
     */ 
    public function getCustomer($customer_id);
    
    /**
     * Calculates the customer lifetime value.
     *
     * @param \App\Order[]
     * @return float
     */ 
    public function calculateLifetimeValue($orders);


}
?>