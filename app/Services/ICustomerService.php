<?php
namespace App\Services;

interface ICustomerService {

  /**
   * Retrieves the customer list.
   *
   * @return \App\Customer[]
   */ 
  public function list();

  /**
   * Retrieves the order list for a given customer.
   *
   * @param int $customerId The customer ID.
   * @return \App\Order
   */ 
  public function orders($customerId);

}
?>