<?php
/**
 * Created by PhpStorm.
 * User: chap
 * Date: 26.4.2016
 * Time: 11:01
 */

namespace App\AdminModule\Presenters;


use App\AdminModule\Forms\IFormTesterFactory;
use App\AdminModule\Forms\IWysiwygTesterFactory;
use Chap\GridTester;
use Nette\Application\UI\Control;
use Nette\Utils\DateTime;
use OndrejBrejla\Eciovni\DataBuilder;
use OndrejBrejla\Eciovni\Eciovni;
use OndrejBrejla\Eciovni\ItemImpl;
use OndrejBrejla\Eciovni\ParticipantBuilder;
use OndrejBrejla\Eciovni\TaxImpl;
use Ublaboo\DataGrid\DataGrid;

class HomepagePresenter extends AdminPresenter
{


    /**
     * @return DataGrid
     */
    protected function createComponentGrid(GridTester $g)
    {
        return $g->create();
    }

    /**
     * @return Control
     */
    protected function createComponentForm(IFormTesterFactory  $f)
    {
        return $f->create();
    }


    /**
     * @return Control
     */
    protected function createComponentWysiwyg(IWysiwygTesterFactory  $f)
    {
        return $f->create();
    }

    protected function createComponentFaktura() {
        $dateNow = new DateTime();

        $variableSymbol = 123;


        $supplierBuilder = new ParticipantBuilder("company", "Street", '', "City", "Postcode");
        $supplier = $supplierBuilder->setIn(1111)->setTin("CZ1111")->setAccountNumber("123/0800")->build();

        $nazev = "Customer Name";
        $customerBuilder = new ParticipantBuilder($nazev, "Customer street", '',"Customer city", "Postcode");

        $customer = $customerBuilder->build();

        $items = array(
            new ItemImpl('Sample item', 1, 1111, TaxImpl::fromPercent(22),false),
        );

        $dataBuilder = new DataBuilder(999, 'Faktura', $supplier, $customer, $dateNow->modifyClone("+14 days"), $dateNow, $items);

        $dataBuilder->setVariableSymbol($variableSymbol)->setDateOfVatRevenueRecognition($dateNow->modifyClone("+15 days"));
        $data = $dataBuilder->build();
        $env = new Eciovni($data);
        $env->setTemplatePath(__DIR__."/templates/faktura.latte");

        return $env;
    }

    /**
     * secured
     * @param $id
     */
    public function handleInvoice($id) {
        $mpdf = new \mPDF('utf-8');
        $this['faktura']->exportToPdf($mpdf,'Faktura-'.$id.'.pdf', 'D');
    }



    public function actionData()
    {
        $d = ["Ahoj", "Cau", "Nazdar"];
        $q = $this->getParameter("query","");
        $r = array_filter($d, function($v) use($q) { return preg_match('/.*'.$q.'.*/i', $v); });
        $this->sendJson($r);
    }

    /**
     * @secured
     */
    public function handleSecured($id)
    {
        $this->flashMessage("Tento link $id nejde jen tak upravit");
        $this->redirect("this");
    }
}