<?php

namespace AdminModule;

class DefaultPresenter extends \BasePresenter
{
    protected function startup()
    {
        parent::startup();

        $this->user->getStorage()->setNamespace('admin');
        if(!$this->user->isLoggedIn()) {
            $this->redirect('Sign:in');
        }

        $this->template->metaTitle = 'Administrácia | example.com';
    }

    protected function beforeRender()
    {
        //Twitter Bootstrap layout gridsystem columns
        $this->template->grid = 12;
    }
}
