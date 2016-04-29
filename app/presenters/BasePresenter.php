<?php

namespace App\Presenters;

use Kdyby\Autowired\AutowireComponentFactories;
use Kdyby\Autowired\AutowireProperties;
use Nette;
use Nette\Application\UI\Presenter;
use Nextras\Application\UI\SecuredLinksPresenterTrait;


abstract class BasePresenter extends Presenter
{



    use AutowireProperties;
    use AutowireComponentFactories;
    use SecuredLinksPresenterTrait;

}
