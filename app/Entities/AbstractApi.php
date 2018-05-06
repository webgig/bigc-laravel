<?php
namespace App\Entities;

abstract class AbstractApi 
{
  private $data = [];
  //
  public static function create(array $array)
  {
    if(is_array($array))
    {
      $entity =  new static();
      foreach ($array as $key => $value) {
        $entity->{$key} = $value;
      }
    }

    return $entity;
  }

  public function __set($key,$value)
  {
    $this->data[$key] = $value;
  }

  public function __get($key)
  {
    if (array_key_exists($key, $this->data)) 
    {
      return $this->data[$key];
    }
  }

}
