<?php

namespace User\Controller;

use Traits\HasTables;
use Traits\Controllers\User\AddAction;
use Traits\Controllers\User\DeleteAction;
use Traits\Controllers\User\EditAction;
use Traits\Controllers\User\IndexAction;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Validator\File\IsImage;
use Zend\View\Model\ViewModel;

class UserController extends AbstractActionController
{
    use HasTables, AddAction, DeleteAction, EditAction,
        IndexAction;

    /**
     * UserTable to be used to interface with the tableGateway/database
     */
    private $table;

    /**
     * Constructs UserController.
     * Sets $this->table to the paramater.
     *
     * @param UserTable $table
     * @return void
     */
    public function __construct(UserTable $table)
    {
        $this->table = $table;
    }
}
