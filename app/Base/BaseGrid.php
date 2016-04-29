<?php
/**
 * Created by PhpStorm.
 * User: chap
 * Date: 27.4.2016
 * Time: 7:53
 */

namespace Chap;


use Nette\Localization\ITranslator;
use Ublaboo\DataGrid\DataGrid;

class BaseGrid
{

    /** @var ITranslator */
    public $translator;

    public function __construct(ITranslator $tr)
    {
        $this->translator = $tr;
    }

    /**
     * @return DataGrid
     */
    public function create(){
        $grid = new  DataGrid();
        $grid->setTranslator($this->translator);
        return $grid;
    }
}