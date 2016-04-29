<?php

 
namespace Chap;
use Nette\Application\UI\Form;

/**
 * Description of EntityForm
 *
 * @author Ing. Jan Loufek <loufek@chap.cz>
 */
class EntityForm extends Form{
    use \Kdyby\DoctrineForms\EntityForm;
}
