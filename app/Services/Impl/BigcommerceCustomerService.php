<?php
namespace App\Services\Impl;


use \App\Repositories\ICustomerRepository;
use \App\Repositories\IOrderRepository;
use \App\Services\ICustomerService;

use Illuminate\Support\Facades\Cache;

class BigcommerceCustomerService implements ICustomerService {

  private $_customer;


  public function __construct( ICustomerRepository $customer,  IOrderRepository $order )
  {
    $this->_customer = $customer;

    $this->_order = $order;
  }

  public function listAllCustomers()
  {
      try 
      {
          $cache_key = 'customer_list';

          if (Cache::has($cache_key)) {
            return Cache::get($cache_key);
          }

          $customers = $this->_customer->all();

          foreach ($customers as $key => $customer) 
          {
            $customer->order_count = $this->_order->count($customer->id);
          }
          // Set the cache
          Cache::put($cache_key, $customers, env("CACHE_EXPIRY"));
      } catch (\Exception $e){
        // Log Here
      } finally {
        // Handle the error
      }
      return  $customers;
  }

  public function getCustomer($customer_id)
  {
      try 
      {
          $cache_key = 'customer_'.$customer_id;

          if (Cache::has($cache_key)) {
            return Cache::get($cache_key);
          }

          $customer = $this->_customer->get($customer_id);
          $orders   = $this->_order->all($customer_id);

          $customer->orders = $orders;

          Cache::put($cache_key, $customer, env("CACHE_EXPIRY"));
      } catch (\Exception $e){
        // Log Here
      } finally {
        // Handle the error
      }
      return $customer;
  }

  public function calculateLifetimeValue($orders)
  {
      $sum = null;

      if(is_array($orders))
      {
          $sum = array_reduce($orders, function($sum, $order)
          { 
              $sum += $order->total;
              return $sum;
          });
      }

      return $sum;
  }

}