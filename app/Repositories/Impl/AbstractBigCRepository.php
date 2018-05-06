<?php
namespace App\Repositories\Impl;


abstract class AbstractBigCRepository 
{
  protected $_Bigcommerce = null;
  
  public function __construct($Bigcommerce = "\\Bigcommerce\\Api\\Client" )
  {
    $this->_Bigcommerce = $Bigcommerce;
  }

}


