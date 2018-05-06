<?php
namespace App\Entities;

class Order extends AbstractApi
{
  // Order Entities
  private $_attributes = ["id","customer_id","date_created","total","currency_code","payment_method","items_total"];

}
