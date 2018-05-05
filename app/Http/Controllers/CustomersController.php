<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

use \App\Services\ICustomerService as CustomerService;

class CustomersController extends BaseController
{
    private $_customerService;

    public function __construct(CustomerService $customerService)
    {

      $this->_customerService = $customerService;

    }

    public function index()
    {
      $customers = $this->_customerService->list();


      return view('customers');
    }
}
