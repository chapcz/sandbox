<?php
namespace App\AdminModule\Forms;


interface IFormTesterFactory {

    /**
     *
     * @return FormTester
     */
    function create();

}
