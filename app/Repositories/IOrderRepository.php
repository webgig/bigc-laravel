<?php
namespace App\Repositories;



interface IOrderRepository{

  public function get($order_id);

  public function all();


}
