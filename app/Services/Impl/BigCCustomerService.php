<?php

namespace App\Services\Impl;


use \App\Repositories\ICustomerRepository;
use \App\Repositories\IOrderRepository;
use \App\Services\ICustomerService;


class BigCCustomerService implements ICustomerService {

  private $_customer;

  public function __construct(
      ICustomerRepository $customer, 
      IOrderRepository $order )
  {
    $this->_customer = $customer;

    $this->_order = $order;
  }

  public function list()
  {

    // Customer Repository 

    $customers = $this->_customer->all();

    // More Business Logic here

   // $orders_count = $this 

    return  $customers;

  }

  public function orders($customerId)
  {

  }

}