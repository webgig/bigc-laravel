<?php
namespace App\Repositories;

interface IOrderRepository{
  /**
   * Return the Order detail for given order id
   *
   * @param int $order_id
   * @return \App\Entity\Order
   */ 
  public function get($order_id);
  /**
   * Return the order list
   *
   * @param int $order_id
   * @return \App\Entity\Order[]
   */ 
  public function all();
  /**
   * Return the order count
   *
   * @param int $customer_id
   * @return int 
   */ 
  public function count($customer_id);
  

}
