<?php
namespace App\Repositories;


interface ICustomerRepository{

  public function get($customer_id);

  public function all();


}
