<?php

namespace Chap;

use Nette\Utils\DateTime;
use Ublaboo\DataGrid\DataGrid;

class GridTester{

    /** @var BaseGrid */
    public $gridFactory;

    public function __construct(BaseGrid $f)
    {
        $this->gridFactory = $f;
    }

    /**
     * @return DataGrid
     */
    public function create(){
        $grid = $this->gridFactory->create();
        $grid->addColumnText("id","ID");
        $grid->addColumnText("name","Name")->setFilterText();
        $grid->addColumnDateTime("date", "Date")->setFilterDate();
        $grid->setDataSource([
            ["id" => 1, "name" => "Karel", "date"=>DateTime::createFromFormat("d.m.Y","10.10.2000")],
            ["id" => 2, "name" => "Pavel", "date"=> new DateTime()],
        ]);
        return $grid;
    }

}
