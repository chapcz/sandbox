<?php

namespace App\Presenters;


use WebLoader\Nette\CssLoader;
use WebLoader\Nette\JavaScriptLoader;
use WebLoader\Nette\LoaderFactory;
use Nette;



abstract class FrontPresenter extends BasePresenter
{

    /**
     * @param LoaderFactory $f abstraktní továrna WebLoader
     * @return CssLoader
     */
    protected function createComponentCss(LoaderFactory $f)
    {
        return $f->createCssLoader('front');
    }

    /**
     * @param LoaderFactory $f abstraktní továrna WebLoader
     * @return JavaScriptLoader
     */
    protected function createComponentJs(LoaderFactory $f)
    {
        return $f->createJavaScriptLoader('front');
    }

}
