<?php

 namespace Chap\Doctrine;
 use Kdyby\Doctrine\MagicAccessors\MagicAccessors;
 use Nette\Object;


 /**
 * BaseEntity for Doctrine
 *
 * @copyright Copyright (c) 2016
 * @author Ing. Jan Loufek 
 */
class BaseEntity extends Object
{
      use MagicAccessors;

}
