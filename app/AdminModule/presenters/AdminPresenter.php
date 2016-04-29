<?php

namespace App\AdminModule\Presenters;

use App\Presenters\BasePresenter;
use Kdyby\Translation\Translator;
use Kollarovic\Admin\IAdminControlFactory;
use Nette;

abstract class AdminPresenter extends BasePresenter
{


    /** @var Translator @inject   */
    public $translator;


    protected function createComponentAdminControl(IAdminControlFactory $af)
    {
        $adminControl = $af->create();
        $adminControl->onLoggedOut[] = $this->logOut;
        $adminControl->onSearch[] = $this->search;
        $adminControl->setUserImage("img/user.png");
        $adminControl->setFooter("© Ing. Jan Loufek");
        $adminControl->setAdminName("Chap sandbox");
        $adminControl->setUserName($this->user->getIdentity()->name);
        return $adminControl;
    }

    public function logOut()
    {
        $this->flashMessage("Good Bye");
        $this->redirect("Sign:in");
    }

    public function search($word)
    {
        $this->flashMessage("Looking for: ".$word);
    }


    public function startup()
    {
        parent::startup();
        if (!$this->user->loggedIn){
            $this->redirect("Sign:in",["backlink"=>$this->storeRequest()]);
        }
        $this->translator->setLocale("en");
        if ($this->getParameter("no_layout",false)){
            $this->setLayout(false);
        }

    }
}
