<?php
/**
 * Created by PhpStorm.
 * User: chap
 * Date: 27.4.2016
 * Time: 7:59
 */

namespace App\AdminModule\Forms;


use App\User;
use Chap\EntityForm;
use Chap\FormControl;
use Nette\Application\UI\Form;
use Tracy\Debugger;


class FormTester extends FormControl
{


    public function __construct()
    {
        parent::__construct();
        $this->templateFile = __DIR__ . "/template.latte";
    }

    public function init(EntityForm $form)
    {
        $form->addText("user_name","Neco")->setRequired();
        $form->addText("password","Cislo")->addRule(Form::INTEGER,"Zadej cislo");
        $form->addText("login_name","napis AB");
        $form->addText("role","Max length")->controlPrototype->addAttributes(["maxlength"=>15]);
        $form->addText("last_seen","Datum")->controlPrototype->addAttributes(["class"=>"datepicker"]);
        $form->addText("email", "Find")->controlPrototype
            ->addAttributes(["class"=>"typeahead","data-remote"=>$this->links->link("Admin:Homepage:data")]);
        $form->addSubmit("Odeslat");
        $form->onValidate[]= $this->validate;


        $form->bindEntity(new User());

    }

    public function validate(Form $form, $values)
    {
        if ($values->login_name != "AB") {
           $form["login_name"]->addError("Nenapsal jsi AB");
        }
        if ($form->hasErrors()){
            $this->presenter->flashMessage("Form has some errors!!", "danger");
        }
    }

    public function success(EntityForm $form, $values)
    {
        Debugger::barDump($form->getEntity());
    }



}