<?php
/**
 * Created by PhpStorm.
 * User: chap
 * Date: 26.4.2016
 * Time: 11:02
 */

namespace App\AdminModule\Presenters;


use App\Presenters\BasePresenter;
use Kollarovic\Admin\ILoginControlFactory;

class SignPresenter extends BasePresenter
{


    /**
     * @var String
     * @persistent
     */
    public $backlink;

    protected function createComponentLoginControl(ILoginControlFactory $lf)
    {
        $loginControl = $lf->create();
        $loginControl->onLoggedIn[] = function() {
            if ($this->backlink){
                $this->restoreRequest($this->backlink);
            }
            $this->redirect('Homepage:default');
        };
        return $loginControl;
    }
}