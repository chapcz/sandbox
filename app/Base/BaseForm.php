<?php
/**
 * Created by PhpStorm.
 * User: chap
 * Date: 27.4.2016
 * Time: 7:55
 */

namespace Chap;



use Nette\Localization\ITranslator;
use Nextras\Forms\Rendering\Bs3FormRenderer;

class BaseForm
{
    /** @var ITranslator */
    public $translator;



    public function __construct(ITranslator $tr)
    {
        $this->translator = $tr;
    }

    /**
     * @return EntityForm
     */
    public function create(){
        $form = new  EntityForm();
        //$form->elementPrototype->addAttributes(["class" => "ajax"]);
        $form->setTranslator($this->translator);
        $renderer = new Bs3FormRenderer();
         $form->setRenderer($renderer);
        return $form;
    }


}