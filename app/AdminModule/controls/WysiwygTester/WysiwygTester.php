<?php
/**
 * Created by PhpStorm.
 * User: chap
 * Date: 27.4.2016
 * Time: 7:59
 */

namespace App\AdminModule\Forms;


use Chap\EntityForm;
use Chap\FormControl;



class WysiwygTester extends FormControl
{

    private $content;
    public function __construct()
    {
        parent::__construct();
        $this->templateFile = __DIR__ . "/template.latte";
    }

    public function init(EntityForm $form)
    {
        $form->elementPrototype->addAttributes(["class" => "ajax"]);
        $form->addTextArea("test","Obsah")
            ->setRequired()
            ->controlPrototype->addAttributes(["class" => "tinymce"]);

        $form->addSubmit("Odeslat");

    }



    public function success(EntityForm $form, $values)
    {
        $this->content = $values->test;
        if ($this->presenter->isAjax()){

            $this->redrawControl("wysiwyg");
        }
    }

    public function render()
    {
        $this->template->content = $this->content;
        parent::render();
    }


}