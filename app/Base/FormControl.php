<?php

namespace Chap;

 use Instante\Bootstrap3Renderer\BootstrapRenderer;
 use Kdyby\Autowired\AutowireComponentFactories;
 use Kdyby\Doctrine\EntityManager;
 use Kdyby\Translation\ITranslator;
 use Nette\Application\LinkGenerator;
 use Nette\Application\UI\Control;

 /**
 * Description of MyControl
 *
 * @author Jan
 */
abstract class FormControl extends Control{
   
    use AutowireComponentFactories;
    
    public $edit;
     
    /**  @var EntityManager */
    public $em;

    /**  @var BootstrapRenderer   */
    protected $renderer;

    /**  @var LinkGenerator */
    public $links;

    /** @var ITranslator   */
    public $translator;

    protected $templateFile = false;

    public function createComponentForm(EntityManager $em, LinkGenerator $lg, ITranslator $it, IEntityFormFactory $ef)
    {
        $this->links = $lg;
        $this->translator = $it;
        $this->em = $em;
        $form = $ef->create();
        $form->onSuccess[] = $this->success;
        $re = new BootstrapRenderer();
        $this->renderer = $re;
        $form->setRenderer($re);
        $form->setTranslator($this->translator);
        $this->init($form);
        return $form;
    }

    public function render() {
        if ($this->templateFile){
            $this->getTemplate()->setFile($this->templateFile);
            $this->getTemplate()->render();
        }else{
            $this["form"]->render();
        }
    }
    
     public abstract function success(EntityForm $form, $values);
     public abstract function init(EntityForm $form);

}

 