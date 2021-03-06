<?php

declare(strict_types=1);

/*
 * This file is part of gpupo/common-schema
 * Created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file
 * LICENSE which is distributed with this source code.
 * Para a informação dos direitos autorais e de licença você deve ler o arquivo
 * LICENSE que é distribuído com este código-fonte.
 * Para obtener la información de los derechos de autor y la licencia debe leer
 * el archivo LICENSE que se distribuye con el código fuente.
 * For more information, see <https://opensource.gpupo.com/>.
 *
 */

namespace Gpupo\CommonSchema\ORM\Entity\Trading\Order\Customer;

use Doctrine\ORM\Mapping as ORM;

/**
 * AddressDelivery.
 *
 * @ORM\Table(name="cs_trading_order_customer_address_delivery")
 * @ORM\Entity(repositoryClass="Gpupo\CommonSchema\ORM\Repository\Trading\Order\Customer\AddressDeliveryRepository")
 */
class AddressDelivery extends \Gpupo\CommonSchema\AbstractORMEntity
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="street", type="string", unique=false)
     */
    private $street;

    /**
     * @var string
     *
     * @ORM\Column(name="number", type="string", unique=false)
     */
    private $number;

    /**
     * @var string
     *
     * @ORM\Column(name="neighborhood", type="string", unique=false)
     */
    private $neighborhood;

    /**
     * @var string
     *
     * @ORM\Column(name="reference", type="string", unique=false)
     */
    private $reference;

    /**
     * @var string
     *
     * @ORM\Column(name="comments", type="string", unique=false)
     */
    private $comments;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", unique=false)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", unique=false)
     */
    private $state;

    /**
     * @var string
     *
     * @ORM\Column(name="postalCode", type="string", unique=false)
     */
    private $postalCode;

    /**
     * @var array
     *
     * @ORM\Column(name="expands", type="array", unique=false)
     */
    private $expands;

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set street.
     *
     * @param string $street
     *
     * @return AddressDelivery
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Get street.
     *
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set number.
     *
     * @param string $number
     *
     * @return AddressDelivery
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number.
     *
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set neighborhood.
     *
     * @param string $neighborhood
     *
     * @return AddressDelivery
     */
    public function setNeighborhood($neighborhood)
    {
        $this->neighborhood = $neighborhood;

        return $this;
    }

    /**
     * Get neighborhood.
     *
     * @return string
     */
    public function getNeighborhood()
    {
        return $this->neighborhood;
    }

    /**
     * Set reference.
     *
     * @param string $reference
     *
     * @return AddressDelivery
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference.
     *
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set comments.
     *
     * @param string $comments
     *
     * @return AddressDelivery
     */
    public function setComments($comments)
    {
        $this->comments = $comments;

        return $this;
    }

    /**
     * Get comments.
     *
     * @return string
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set city.
     *
     * @param string $city
     *
     * @return AddressDelivery
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city.
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set state.
     *
     * @param string $state
     *
     * @return AddressDelivery
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state.
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set postalCode.
     *
     * @param string $postalCode
     *
     * @return AddressDelivery
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * Get postalCode.
     *
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * Set expands.
     *
     * @param array $expands
     *
     * @return AddressDelivery
     */
    public function setExpands($expands)
    {
        $this->expands = $expands;

        return $this;
    }

    /**
     * Get expands.
     *
     * @return array
     */
    public function getExpands()
    {
        return $this->expands;
    }
}
