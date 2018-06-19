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

namespace Gpupo\CommonSchema\ORM\Entity\Trading\Order\Shippings\Invoice;

use Doctrine\ORM\Mapping as ORM;

/**
 * Item.
 *
 * @ORM\Table(name="cs_trading_order_invoice")
 * @ORM\Entity(repositoryClass="Gpupo\CommonSchema\ORM\Repository\Trading\Order\Shippings\Invoice\ItemRepository")
 */
class Item extends \Gpupo\CommonSchema\AbstractORMEntity
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
     * @ORM\Column(name="invoice_number", type="string", unique=false)
     */
    private $invoice_number;

    /**
     * @var string
     *
     * @ORM\Column(name="invoice_link", type="string", unique=false)
     */
    private $invoice_link;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="invoice_date", type="datetime")
     */
    private $invoice_date;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ship_date", type="datetime")
     */
    private $ship_date;

    /**
     * @var string
     *
     * @ORM\Column(name="accessKey", type="string", unique=false)
     */
    private $accessKey;

    /**
     * @var array
     *
     * @ORM\Column(name="tags", type="array")
     */
    private $tags;

    /**
     * @var array
     *
     * @ORM\Column(name="expands", type="array")
     */
    private $expands;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToOne(targetEntity="Gpupo\CommonSchema\ORM\Entity\Trading\Order\Shippings\Shipping", inversedBy="invoices")
     */
     private $shipping;

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
     * Set invoiceNumber.
     *
     * @param string $invoiceNumber
     *
     * @return Item
     */
    public function setInvoiceNumber($invoiceNumber)
    {
        $this->invoice_number = $invoiceNumber;

        return $this;
    }

    /**
     * Get invoiceNumber.
     *
     * @return string
     */
    public function getInvoiceNumber()
    {
        return $this->invoice_number;
    }

    /**
     * Set invoiceLink.
     *
     * @param string $invoiceLink
     *
     * @return Item
     */
    public function setInvoiceLink($invoiceLink)
    {
        $this->invoice_link = $invoiceLink;

        return $this;
    }

    /**
     * Get invoiceLink.
     *
     * @return string
     */
    public function getInvoiceLink()
    {
        return $this->invoice_link;
    }

    /**
     * Set invoiceDate.
     *
     * @param \DateTime $invoiceDate
     *
     * @return Item
     */
    public function setInvoiceDate($invoiceDate)
    {
        $this->invoice_date = $invoiceDate;

        return $this;
    }

    /**
     * Get invoiceDate.
     *
     * @return \DateTime
     */
    public function getInvoiceDate()
    {
        return $this->invoice_date;
    }

    /**
     * Set shipDate.
     *
     * @param \DateTime $shipDate
     *
     * @return Item
     */
    public function setShipDate($shipDate)
    {
        $this->ship_date = $shipDate;

        return $this;
    }

    /**
     * Get shipDate.
     *
     * @return \DateTime
     */
    public function getShipDate()
    {
        return $this->ship_date;
    }

    /**
     * Set accessKey.
     *
     * @param string $accessKey
     *
     * @return Item
     */
    public function setAccessKey($accessKey)
    {
        $this->accessKey = $accessKey;

        return $this;
    }

    /**
     * Get accessKey.
     *
     * @return string
     */
    public function getAccessKey()
    {
        return $this->accessKey;
    }

    /**
     * Set tags.
     *
     * @param array $tags
     *
     * @return Item
     */
    public function setTags($tags)
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * Get tags.
     *
     * @return array
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Set expands.
     *
     * @param array $expands
     *
     * @return Item
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

    /**
     * Set shipping.
     *
     * @param null|\Gpupo\CommonSchema\ORM\Entity\Trading\Order\Shippings\Shipping $shipping
     *
     * @return Item
     */
    public function setShipping(Gpupo\CommonSchema\ORM\Entity\Trading\Order\Shippings\Shipping $shipping){
        $this->shipping = $shipping;
        return $this;
    }

    /**
     * Get shipping.
     *
     * @return Shipping
     */
    public function getShipping(){
      return $this->shipping;
    }

    public function __toString(){
      return $this->getInvoiceNumber();
    }
}
