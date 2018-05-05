<?php
namespace App\Repositories\Impl;

use App\Repositories\IOrderRepository;
use Bigcommerce\Api\Client as Bigcommerce;


class BigCOrderRepository implements IOrderRepository
{


  public function get($order_id)
  {

    $customer = Bigcommerce::getOrder($order_id);

    // Transform to model;

  }

  public function all()
  {
    
    $customers = Bigcommerce::getOrders();

    // Transform to model;
  }

  public function getCount()
  {

    $count = Bigcommerce::getOrdersCount();

    return $count;

  }


  
}


