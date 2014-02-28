<?php

use Nette\Application\UI\Form;

/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends Nette\Application\UI\Presenter {

    /** @persistent */
    public $lang;

    /** @var GettextTranslator\Gettext */
    protected $translator;

    /**  @var array */
    protected $langs = ['cs' => 'CZ', 'en' => 'EN'];

    /** @var Nette\Database\Connection */
    protected $db;

    public function __construct(\Nette\DI\Container $context = NULL) {
        parent::__construct($context);
        $this->db = $this->context->connection;
    }

    /**
     * @param GettextTranslator\Gettext
     */
    public function injectTranslator(GettextTranslator\Gettext $translator) {
        $this->translator = $translator;
    }

    /**
     * 
     * @param type $class
     * @return template
     */
    public function createTemplate($class = NULL) {
        $template = parent::createTemplate($class);
        $template->lang = $this->lang;
        $template->langs = $this->langs;
        if (!isset($this->lang)) {
            $this->lang = $this->translator->getLang();
        } else {
            $this->translator->setLang($this->lang);
        }
        $template->setTranslator($this->translator);
        return $template;
    }

    /**
     * 
     * @param \Nette\Application\UI\Form $form
     */
    public function handleChangeLang($lang) {
        $this->lang = $lang;
        $this->redirect('this');
    }

    /**
     * 
     * @param  $template
     */
    public function templatePrepareFilters($template) {
        $latte = new Nette\Latte\Engine;
        $set = new Nette\Latte\Macros\MacroSet($latte->compiler);
        $set->addMacro(
                'style', 'echo "<style>";', 'echo "</style>";'
        );
        $template->registerFilter($latte);
    }

}
