<?php
namespace App\Repositories\Impl;


abstract class AbstractBigcommerceRepository 
{
  protected $_Bigcommerce = null;

  public function __construct($Bigcommerce = "\\Bigcommerce\\Api\\Client" )
  {
    $this->_Bigcommerce = $Bigcommerce;
  }

}
