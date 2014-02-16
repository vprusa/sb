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

    /**
     * @param GettextTranslator\Gettext
     */
    public function injectTranslator(GettextTranslator\Gettext $translator) {
        $this->translator = $translator;
    }

    public function createTemplate($class = NULL) {
        $template = parent::createTemplate($class);
        if (!isset($this->lang)) {
            $this->lang = $this->translator->getLang();
        } else {
            $this->translator->setLang($this->lang);
        }
        $template->setTranslator($this->translator);
        return $template;
    }
    
    public function createComponentLangForm() {
        $form = new Form; //;Nette\Forms\Form;
        $form->setMethod('get');
        $form->setAction('this');
        $form->getElementPrototype()->id('frm-langForm')->class('language');
        $renderer = $form->getRenderer();
        $renderer->wrappers['controls']['container'] = NULL;
        $renderer->wrappers['pair']['container'] = NULL;
        $renderer->wrappers['label']['container'] = NULL;
        $renderer->wrappers['control']['container'] = NULL;

        $form->addSelect('language', 'Jazyk', array("en" => "EN", "cs" => "CZ"), 1)->setValue($this->lang)
                ->setAttribute('onchange', 'this.form.submit()');
        $form->onSuccess[] = callback($this, 'processChangeLang');
        return $form;
    }

    public function processChangeLang(Form $form) {
        $values = $form->getValues();
        $this->lang = $values->language;
        $this->redirect('this');
    }
    
}
