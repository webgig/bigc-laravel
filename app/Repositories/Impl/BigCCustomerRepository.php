<?php
namespace App\Repositories\Impl;

use App\Repositories\ICustomerRepository;

use Bigcommerce\Api\Client as Bigcommerce;



class BigCCustomerRepository implements ICustomerRepository
{

  // public function __construct()
  // {
  // }

  public function get($customer_id)
  {

    $customer = Bigcommerce::getCustomer($customer_id);

    // Transform to model;

  }


  public function all()
  {
    
    $customers = Bigcommerce::getCustomers();

    // Transform to model;
    
    return $customers;
  }






}


