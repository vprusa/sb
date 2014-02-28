<?php

use Nette\Application\UI;

class BaseFormControl extends UI\Control {

    /** @var string default template file */
    protected $defaultTemplateFile = "form";

    /** @var Nette\Application\UI\Form */
    protected $form;
    
    public function __construct(\Nette\ComponentModel\IContainer $parent = NULL, $name = NULL) {
        parent::__construct($parent, $name);
        $this->form = new UI\Form;
    }
    
    public function createTemplate($class = null) {
        $template = parent::createTemplate($class);
        $template->_form = $template->form = $this['form'];
        return $template;
    }

    public function render() {
        $args = array();
        if (func_num_args() > 0) {
            $args = func_num_args();
        }
        $template = $this->template;
        if ($this->template instanceof \Nette\Templating\FileTemplate) {

            $path = dirname(Nette\Reflection\ClassType::from($this)->getFileName()) . '/' . Nette\Reflection\ClassType::from($this)->getShortName() . '.latte';
            // ked mam definovanu sablonu pre control
            if (is_file($path)) {
                $template->setFile($path);
            }
            //defaultna sablona pre control
            else {
                if (is_file(__DIR__ . "/" . $this->defaultTemplateFile . ".latte")) {
                    $template->setFile(__DIR__ . "/" . $this->defaultTemplateFile . ".latte");
                }
            }
        }
        array_unshift($args, $template);
        call_user_func_array(array($this->template, 'render'), $args);
    }

    protected function createComponentForm() {
        return $this->form;
    }
    
    public function getForm() {
        return $this->form;
    }

}
