<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use \App\Services\ICustomerService as CustomerService;

class CustomerDetailsController extends BaseController
{   
    
    private $_customerService;

    public function __construct(CustomerService $customerService)
    {

      $this->_customerService = $customerService;
    }
    
    public function show($id)
    {   
        // Retrieve Customer Details
        $customer = $this->_customerService->getCustomer($id);
        
        // Calculate Lifetime value
        $lifeTimeValue = $this->_customerService->calculateLifetimeValue($customer->orders);

        return view('details', [
            'customer' => $customer,
            'lifeTimeValue' => $lifeTimeValue,
        ]);
    }
}
