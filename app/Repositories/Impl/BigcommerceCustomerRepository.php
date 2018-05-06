<?php
namespace App\Repositories\Impl;

use App\Repositories\ICustomerRepository;
use App\Entities\Customer as CustomerEntity;
use Bigcommerce\Api\Client as Bigcommerce;
use Illuminate\Support\Collection;


class BigcommerceCustomerRepository extends AbstractBigcommerceRepository implements ICustomerRepository
{

  public function get($customer_id)
  {
    if(!$customer_id)
    {
      throw new \Exception("Customer Id Not Provided");
    }

    $customer = $this->_Bigcommerce::getCustomer($customer_id);

    if(!$customer)
    {
      throw new Exception("Customers Not Found");
    }
    // Transform to model;
    return  CustomerEntity::create(['id'=>$customer->id,'first_name' => $customer->first_name, 'last_name' => $customer->last_name]);
  }


  public function all()
  { 
    $customers =  $this->_Bigcommerce::getCustomers();
    $allCustomers = [];
    
    if(!$customers)
    {
      throw new \Exception("Customers Not Found");
    }
    foreach ($customers as $key => $customer) {
      $allCustomers[] = CustomerEntity::create(['id'=>$customer->id,'first_name' => $customer->first_name, 'last_name' => $customer->last_name]);
    }
    
    return $allCustomers;
  }
}