<?php
namespace App\Repositories\Impl;

use App\Repositories\IOrderRepository;
use App\Entities\Order as OrderEntity;


class BigCOrderRepository extends AbstractBigCRepository  implements IOrderRepository
{

  public function get($order_id)
  {
    $order = $this->_Bigcommerce::getOrder($order_id);

    return OrderEntity::create(['id' => $order->id,
                                'customer_id' => $order->customer_id,                                           
                                'date_created' => $order->date_created, 
                                'status' => $order->status,                                          
                                'items_total' => $order->items_total,                                          
                                'total' => $order->total_inc_tax,
                                'payment_method' => $order->payment_method]);
  }

  public function all($customer_id = null)
  {
    $filter = null;

    if($customer_id){
      $filter = array("customer_id" => $customer_id);
    }

    $orders = $this->_Bigcommerce::getOrders($filter);
    $allOrders = [];

    // Transform to entity;
    foreach ($orders as $key => $order) 
    {
       $allOrders[] = OrderEntity::create(['id' => $order->id,
                                          'customer_id' => $order->customer_id, 
                                          'date_created' => $order->date_created, 
                                          'status' => $order->status,
                                          'items_total' => $order->items_total,
                                          'total' => $order->total_inc_tax,
                                          'currency_code' => $order->currency_code,
                                          'payment_method' => $order->payment_method]);
    }

    return $allOrders;
  }

  public function count($customer_id = null)
  {
    $filter = null;

    if($customer_id){
      $filter = array("customer_id" => $customer_id);
    }

    return $this->_Bigcommerce::getOrdersCount($filter);
  }
}