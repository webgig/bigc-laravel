<?php
namespace App\Repositories;


interface ICustomerRepository{
  /**
   * Retrieves the customer details for given customer.
   *
   * @param int $customer_id
   * @return \App\Entity\Customer
   */ 
  public function get($customer_id);
  /**
   * Retrieves the customer list
   *
   * @return \App\Entity\Customer[]
   */ 
  public function all();
}
