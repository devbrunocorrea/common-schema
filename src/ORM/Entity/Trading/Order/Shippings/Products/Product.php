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

namespace Gpupo\CommonSchema\ORM\Entity\Trading\Order\Shippings\Products;

use Doctrine\ORM\Mapping as ORM;

/**
 * Product.
 *
 * @ORM\Table(name="cs_trading_order_shipping_product")
 * @ORM\Entity(repositoryClass="Gpupo\CommonSchema\ORM\Repository\Trading\Order\Shippings\Products\ProductRepository")
 */
class Product extends \Gpupo\CommonSchema\AbstractORMEntity
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
     * @var array
     *
     * @ORM\Column(name="expands", type="array")
     */
    private $expands;

    /**
     * @var string
     *
     * @ORM\Column(name="seller_product_id", type="string", unique=false)
     */
    private $seller_product_id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", unique=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="gtin", type="string", unique=false)
     */
    private $gtin;

    /**
     * @var array
     *
     * @ORM\Column(name="variation_attributes", type="array")
     */
    private $variation_attributes;

    /**
     * @var string
     *
     * @ORM\Column(name="sale_fee", type="decimal", precision=10, scale=2)
     */
    private $sale_fee;

    /**
     * @var int
     *
     * @ORM\Column(name="quantity", type="bigint")
     */
    private $quantity;

    /**
     * @var string
     *
     * @ORM\Column(name="unit_price", type="decimal", precision=10, scale=2)
     */
    private $unit_price;

    /**
     * @var Gpupo\CommonSchema\ORM\Entity\Trading\Order\Shippings\Shipping
     *
     * @ORM\ManyToOne(targetEntity="Gpupo\CommonSchema\ORM\Entity\Trading\Order\Shippings\Shipping", inversedBy="products")
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
     * Set expands.
     *
     * @param array $expands
     *
     * @return Product
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
     * Set sellerProductId.
     *
     * @param string $sellerProductId
     *
     * @return Product
     */
    public function setSellerProductId($sellerProductId)
    {
        $this->seller_product_id = $sellerProductId;

        return $this;
    }

    /**
     * Get sellerProductId.
     *
     * @return string
     */
    public function getSellerProductId()
    {
        return $this->seller_product_id;
    }

    /**
     * Set title.
     *
     * @param string $title
     *
     * @return Product
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set gtin.
     *
     * @param string $gtin
     *
     * @return Product
     */
    public function setGtin($gtin)
    {
        $this->gtin = $gtin;

        return $this;
    }

    /**
     * Get gtin.
     *
     * @return string
     */
    public function getGtin()
    {
        return $this->gtin;
    }

    /**
     * Set variationAttributes.
     *
     * @param array $variationAttributes
     *
     * @return Product
     */
    public function setVariationAttributes($variationAttributes)
    {
        $this->variation_attributes = $variationAttributes;

        return $this;
    }

    /**
     * Get variationAttributes.
     *
     * @return array
     */
    public function getVariationAttributes()
    {
        return $this->variation_attributes;
    }

    /**
     * Set saleFee.
     *
     * @param string $saleFee
     *
     * @return Product
     */
    public function setSaleFee($saleFee)
    {
        $this->sale_fee = $saleFee;

        return $this;
    }

    /**
     * Get saleFee.
     *
     * @return string
     */
    public function getSaleFee()
    {
        return $this->sale_fee;
    }

    /**
     * Set quantity.
     *
     * @param int $quantity
     *
     * @return Product
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity.
     *
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set unitPrice.
     *
     * @param string $unitPrice
     *
     * @return Product
     */
    public function setUnitPrice($unitPrice)
    {
        $this->unit_price = $unitPrice;

        return $this;
    }

    /**
     * Get unitPrice.
     *
     * @return string
     */
    public function getUnitPrice()
    {
        return $this->unit_price;
    }

    /**
     * Get shipping.
     *
     * @return Gpupo\CommonSchema\ORM\Entity\Trading\Order\Shippings\Shipping
     */
    public function getShipping()
    {
        return $this->shipping;
    }

    /**
     * Set order.
     *
     * @param null|\Gpupo\CommonSchema\ORM\Entity\Trading\Order\Shippings\Shipping $shipping
     *
     * @return Shipping
     */
    public function setShipping(\Gpupo\CommonSchema\ORM\Entity\Trading\Order\Shippings\Shipping $shipping)
    {
        $this->shipping = $shipping;
        return $this;
    }

}
