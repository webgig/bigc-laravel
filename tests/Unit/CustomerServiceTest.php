<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CustomerServiceTest extends TestCase
{

    public function setUp()
    {
      parent::setUp();

      $this->_customerRepositoryMock = $this->createMock("\\App\\Repositories\\ICustomerRepository");

      $this->_orderRepositoryMock = $this->createMock("\\App\\Repositories\\IOrderRepository");
     
      $this->_customerService = new \App\Services\Impl\BigcommerceCustomerService($this->_customerRepositoryMock, $this->_orderRepositoryMock);

    }

    /**
     * Test List Customers
     *
     * @return void
     */
    public function testListAllCustomers()
    { 
        $customer = $this->app->make('\App\Entities\Customer'); 

        $customer->id = 1;
        $customer->first_name = "test";
        $customer->last_name = "test";
        $customer->order_count = 1;
        
        $customers[] = $customer;

        $customer = $this->app->make('\App\Entities\Customer'); 

        $customer->id = 1;
        $customer->first_name = "test";
        $customer->last_name = "test";
        $customer->order_count = 1;
        
        $customers[] = $customer;

        $this->_customerRepositoryMock->expects($this->any())->method('all')->willReturn($customers);

        $result = $this->_customerService->listAllCustomers();

        $this->assertNotCount(0, $result);
        $this->assertTrue(is_array($result));
    }

    /**
     * Test Get Customer
     *
     * @return void
     */
    public function testGetCustomers()
    { 
        $customer = $this->app->make('\App\Entities\Customer'); 

        $customer->id = 1;
        $customer->first_name = "test";
        $customer->last_name = "test";
        $customer->order_count = 1;

        $order = $this->app->make('\App\Entities\Order'); 
        $order->id = 1;
        $order->customer_id = 1;
        $order->total = 10;
        $order->item_total = 1;

        $orders[] = $order;


        $order = $this->app->make('\App\Entities\Order'); 
        $order->id = 2;
        $order->customer_id = 2;
        $order->total = 10;
        $order->item_total = 1;

        $orders[] = $order;
        
        $customer->orders = $orders;

        $this->_customerRepositoryMock->expects($this->any())->method('get')->willReturn($customer);
        $this->_orderRepositoryMock->expects($this->any())->method('all')->willReturn($orders);

        $result = $this->_customerService->getCustomer(1);

        $this->assertNotCount(0, $result->orders);
        $this->assertTrue($result instanceof \App\Entities\Customer);
    }
    
    /**
     * Test Total Calculatoin
     *
     * @return void
     */
    public function testCalculateLifetimeValue()
    { 
        $order = $this->app->make('\App\Entities\Order'); 
        $order->total = 10;

        $orders[] = $order;

        $order = $this->app->make('\App\Entities\Order'); 
        $order->total = 10;

        $orders[] = $order;
        
        $result = $this->_customerService->calculateLifetimeValue($orders);

        $this->assertEquals($result,20);
    }
       


}
