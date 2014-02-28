<?php

use Nette\Application\UI;

class SignInFormControl extends BaseFormControl {

    protected function createComponentForm() {
        $form = new UI\Form;
        return $form;
    }
    // pokial nebudem chceit defaultnu sablonu tak si len pridam k suboru SignInFormControl.latte

}
