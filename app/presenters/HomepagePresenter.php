<?php

namespace App\Presenters;

use Nette;


class HomepagePresenter extends FrontPresenter
{


    public function actionDefault()
    {
        $this->flashMessage("Aplikace je pripravena ", "success");
    }
}
