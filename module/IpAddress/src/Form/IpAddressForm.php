<?php

namespace IpAddress\Form;

use Zend\Form\Element;
use Zend\Form\Form;

class IpAddressForm extends Form
{
    /**
     * Constructs IpAddressForm.
     * * Calls the parent (Zend\Form\Form) constructor
     * * Calls $this->addElements
     *
     * @param String $name
     * @param dictionary $options
     * @return void
     */
    public function __construct($name = "ipAddress", $options = [])
    {
        parent::__construct($name, $options);

        $this->addElements();
    }

    /**
     * Adds Elements to the form.
     *
     * @return void
     */
    private function addElements()
    {
        $this->add([
            'name' => 'slug',
            'type' => 'hidden',
        ]);

        $this->add([
            'name' => 'name',
            'type' => 'text',
            'options' => [
                'label' => 'Name',
            ],
        ]);

        $this->add([
            'name' => 'description',
            'type' => 'text',
            'options' => [
                'label' => 'Description',
            ],
        ]);

        $this->add([
            'name' => 'submit',
            'type' => 'submit',
            'attributes' => [
               'value' => 'Submit',
            ],
        ]);
    }
}
