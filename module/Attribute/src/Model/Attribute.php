<?php

namespace Attribute\Model;

use Attribute\InputFilter\NameFilter;
use DomainException;
use Traits\Interfaces\HasSlug as HasSlugInterface;
use Traits\Models\ExchangeArray;
use Traits\Models\HasGuarded;
use Traits\Models\HasSlug;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterInterface;

class Attribute implements HasSlugInterface
{
    use HasSlug, HasGuarded, ExchangeArray;
    /**
     * Int for Attribute's id found in the db.
     */
    public $id;
    /**
     * String for Attribute's name.
     */
    public $name;
    /**
     * String for Attribute's description.
     */
    public $description;

    /**
     * InputFilter for Attribute's inputFilter.
     */
    protected $inputFilter;

    /**
     * Static variable containing values users cannot change.
     */
    protected static $guarded = [
        'id',
        'slug',
    ];

    /**
     * Get attribute values as array.
     *
     * @return array
     */
    public function getArrayCopy()
    {
        return [
            'id'          => $this->id,
            'slug'        => $this->slug,
            'name'        => $this->name,
            'description' => $this->description,
            'data'        => $this->data,
        ];
    }

    /**
     * Gets Attribute's input filter.
     *
     * Returns the app's inputFilter.
     * Creates the inputFilter if it does not exist.
     *
     * @param array $options
     *
     * @return Attribute $this
     */
    public function getInputFilter($options = [])
    {
        $tmpFilter = (new InputFilter())
            ->merge(new NameFilter());

        $this->inputFilter = $tmpFilter;

        return $tmpFilter;
    }

    /**
     * Sets Attribute's inputFilter.
     *
     * Throws error. Attribute's inputFilter cannot be modifed
     * by an outside enity.
     *
     * @throws DomainException
     *
     * @return Attribute $this
     */
    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new DomainException(sprintf(
            '%s does not allow injection of an alternate input filter',
            __CLASS__
        ));
    }
}
