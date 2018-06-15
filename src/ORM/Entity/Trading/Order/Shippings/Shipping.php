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

namespace Gpupo\CommonSchema\ORM\Entity\Trading\Order\Shippings;

use Doctrine\ORM\Mapping as ORM;

/**
 * Shipping.
 *
 * @ORM\Table(name="cs_trading_order_shipping")
 * @ORM\Entity(repositoryClass="Gpupo\CommonSchema\ORM\Repository\Trading\Order\Shippings\ShippingRepository")
 */
class Shipping extends \Gpupo\CommonSchema\AbstractORMEntity
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
     * @var int
     *
     * @ORM\Column(name="shipping_number", type="bigint")
     */
    private $shipping_number;

    /**
     * @var bool
     *
     * @ORM\Column(name="fulfilled", type="boolean")
     */
    private $fulfilled;

    /**
     * @var bool
     *
     * @ORM\Column(name="hidden_for_seller", type="boolean")
     */
    private $hidden_for_seller;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_created", type="datetime")
     */
    private $date_created;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_last_expiration", type="datetime")
     */
    private $date_last_expiration;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_last_modified", type="datetime")
     */
    private $date_last_modified;

    /**
     * @var string
     *
     * @ORM\Column(name="currency_id", type="string", unique=false)
     */
    private $currency_id;

    /**
     * @var string
     *
     * @ORM\Column(name="total_commission", type="decimal", precision=10, scale=2)
     */
    private $total_commission;

    /**
     * @var string
     *
     * @ORM\Column(name="total_discount", type="decimal", precision=10, scale=2)
     */
    private $total_discount;

    /**
     * @var string
     *
     * @ORM\Column(name="total_freight", type="decimal", precision=10, scale=2)
     */
    private $total_freight;

    /**
     * @var string
     *
     * @ORM\Column(name="total_gross", type="decimal", precision=10, scale=2)
     */
    private $total_gross;

    /**
     * @var string
     *
     * @ORM\Column(name="total_net", type="decimal", precision=10, scale=2)
     */
    private $total_net;

    /**
     * @var string
     *
     * @ORM\Column(name="total_quantity", type="decimal", precision=10, scale=2)
     */
    private $total_quantity;

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
     * @var \Gpupo\CommonSchema\ORM\Entity\Trading\Order\Shippings\Seller
     *
     * @ORM\OneToOne(targetEntity="Gpupo\CommonSchema\ORM\Entity\Trading\Order\Shippings\Seller")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="seller_id", referencedColumnName="id", unique=true)
     * })
     */
    private $seller;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Gpupo\CommonSchema\ORM\Entity\Trading\Order\Shippings\Products\Product", mappedBy="shipping")
     */
    private $products;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Gpupo\CommonSchema\ORM\Entity\Trading\Order\Shippings\Transport\Item", mappedBy="transport")
     */
    private $transport;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Gpupo\CommonSchema\ORM\Entity\Trading\Order\Shippings\Invoice\Item", mappedBy="invoice")
     */
    private $invoice;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Gpupo\CommonSchema\ORM\Entity\Trading\Order\Shippings\Comments\Item", mappedBy="comment")
     */
    private $comment;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Gpupo\CommonSchema\ORM\Entity\Trading\Order\Shippings\Feedback\Item", mappedBy="feedback")
     */
    private $feedback;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToOne(targetEntity="Gpupo\CommonSchema\ORM\Entity\Trading\Order\Order", inversedBy="shippings")
     */
    private $order;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->product = new \Doctrine\Common\Collections\ArrayCollection();
        $this->transport = new \Doctrine\Common\Collections\ArrayCollection();
        $this->invoice = new \Doctrine\Common\Collections\ArrayCollection();
        $this->comment = new \Doctrine\Common\Collections\ArrayCollection();
        $this->feedback = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set shippingNumber.
     *
     * @param int $shippingNumber
     *
     * @return Shipping
     */
    public function setShippingNumber($shippingNumber)
    {
        $this->shipping_number = $shippingNumber;

        return $this;
    }

    /**
     * Get shippingNumber.
     *
     * @return int
     */
    public function getShippingNumber()
    {
        return $this->shipping_number;
    }

    /**
     * Set fulfilled.
     *
     * @param bool $fulfilled
     *
     * @return Shipping
     */
    public function setFulfilled($fulfilled)
    {
        $this->fulfilled = $fulfilled;

        return $this;
    }

    /**
     * Get fulfilled.
     *
     * @return bool
     */
    public function getFulfilled()
    {
        return $this->fulfilled;
    }

    /**
     * Set hiddenForSeller.
     *
     * @param bool $hiddenForSeller
     *
     * @return Shipping
     */
    public function setHiddenForSeller($hiddenForSeller)
    {
        $this->hidden_for_seller = $hiddenForSeller;

        return $this;
    }

    /**
     * Get hiddenForSeller.
     *
     * @return bool
     */
    public function getHiddenForSeller()
    {
        return $this->hidden_for_seller;
    }

    /**
     * Set dateCreated.
     *
     * @param \DateTime $dateCreated
     *
     * @return Shipping
     */
    public function setDateCreated($dateCreated)
    {
        $this->date_created = $dateCreated;

        return $this;
    }

    /**
     * Get dateCreated.
     *
     * @return \DateTime
     */
    public function getDateCreated()
    {
        return $this->date_created;
    }

    /**
     * Set dateLastExpiration.
     *
     * @param \DateTime $dateLastExpiration
     *
     * @return Shipping
     */
    public function setDateLastExpiration($dateLastExpiration)
    {
        $this->date_last_expiration = $dateLastExpiration;

        return $this;
    }

    /**
     * Get dateLastExpiration.
     *
     * @return \DateTime
     */
    public function getDateLastExpiration()
    {
        return $this->date_last_expiration;
    }

    /**
     * Set dateLastModified.
     *
     * @param \DateTime $dateLastModified
     *
     * @return Shipping
     */
    public function setDateLastModified($dateLastModified)
    {
        $this->date_last_modified = $dateLastModified;

        return $this;
    }

    /**
     * Get dateLastModified.
     *
     * @return \DateTime
     */
    public function getDateLastModified()
    {
        return $this->date_last_modified;
    }

    /**
     * Set currencyId.
     *
     * @param string $currencyId
     *
     * @return Shipping
     */
    public function setCurrencyId($currencyId)
    {
        $this->currency_id = $currencyId;

        return $this;
    }

    /**
     * Get currencyId.
     *
     * @return string
     */
    public function getCurrencyId()
    {
        return $this->currency_id;
    }

    /**
     * Set totalCommission.
     *
     * @param string $totalCommission
     *
     * @return Shipping
     */
    public function setTotalCommission($totalCommission)
    {
        $this->total_commission = $totalCommission;

        return $this;
    }

    /**
     * Get totalCommission.
     *
     * @return string
     */
    public function getTotalCommission()
    {
        return $this->total_commission;
    }

    /**
     * Set totalDiscount.
     *
     * @param string $totalDiscount
     *
     * @return Shipping
     */
    public function setTotalDiscount($totalDiscount)
    {
        $this->total_discount = $totalDiscount;

        return $this;
    }

    /**
     * Get totalDiscount.
     *
     * @return string
     */
    public function getTotalDiscount()
    {
        return $this->total_discount;
    }

    /**
     * Set totalFreight.
     *
     * @param string $totalFreight
     *
     * @return Shipping
     */
    public function setTotalFreight($totalFreight)
    {
        $this->total_freight = $totalFreight;

        return $this;
    }

    /**
     * Get totalFreight.
     *
     * @return string
     */
    public function getTotalFreight()
    {
        return $this->total_freight;
    }

    /**
     * Set totalGross.
     *
     * @param string $totalGross
     *
     * @return Shipping
     */
    public function setTotalGross($totalGross)
    {
        $this->total_gross = $totalGross;

        return $this;
    }

    /**
     * Get totalGross.
     *
     * @return string
     */
    public function getTotalGross()
    {
        return $this->total_gross;
    }

    /**
     * Set totalNet.
     *
     * @param string $totalNet
     *
     * @return Shipping
     */
    public function setTotalNet($totalNet)
    {
        $this->total_net = $totalNet;

        return $this;
    }

    /**
     * Get totalNet.
     *
     * @return string
     */
    public function getTotalNet()
    {
        return $this->total_net;
    }

    /**
     * Set totalQuantity.
     *
     * @param string $totalQuantity
     *
     * @return Shipping
     */
    public function setTotalQuantity($totalQuantity)
    {
        $this->total_quantity = $totalQuantity;

        return $this;
    }

    /**
     * Get totalQuantity.
     *
     * @return string
     */
    public function getTotalQuantity()
    {
        return $this->total_quantity;
    }

    /**
     * Set tags.
     *
     * @param array $tags
     *
     * @return Shipping
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
     * @return Shipping
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
     * Set seller.
     *
     * @param null|\Gpupo\CommonSchema\ORM\Entity\Trading\Order\Shippings\Seller $seller
     *
     * @return Shipping
     */
    public function setSeller(\Gpupo\CommonSchema\ORM\Entity\Trading\Order\Shippings\Seller $seller = null)
    {
        $this->seller = $seller;

        return $this;
    }

    /**
     * Get seller.
     *
     * @return null|\Gpupo\CommonSchema\ORM\Entity\Trading\Order\Shippings\Seller
     */
    public function getSeller()
    {
        return $this->seller;
    }

    /**
     * Add product.
     *
     * @param \Gpupo\CommonSchema\ORM\Entity\Trading\Order\Shippings\Products\Product $product
     *
     * @return Shipping
     */
    public function addProduct(\Gpupo\CommonSchema\ORM\Entity\Trading\Order\Shippings\Products\Product $product)
    {
        $this->product[] = $product;

        return $this;
    }

    /**
     * Remove product.
     *
     * @param \Gpupo\CommonSchema\ORM\Entity\Trading\Order\Shippings\Products\Product $product
     *
     * @return bool TRUE if this collection contained the specified element, FALSE otherwise
     */
    public function removeProduct(\Gpupo\CommonSchema\ORM\Entity\Trading\Order\Shippings\Products\Product $product)
    {
        return $this->product->removeElement($product);
    }

    /**
     * Get product.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Add transport.
     *
     * @param \Gpupo\CommonSchema\ORM\Entity\Trading\Order\Shippings\Transport\Item $transport
     *
     * @return Shipping
     */
    public function addTransport(\Gpupo\CommonSchema\ORM\Entity\Trading\Order\Shippings\Transport\Item $transport)
    {
        $this->transport[] = $transport;

        return $this;
    }

    /**
     * Remove transport.
     *
     * @param \Gpupo\CommonSchema\ORM\Entity\Trading\Order\Shippings\Transport\Item $transport
     *
     * @return bool TRUE if this collection contained the specified element, FALSE otherwise
     */
    public function removeTransport(\Gpupo\CommonSchema\ORM\Entity\Trading\Order\Shippings\Transport\Item $transport)
    {
        return $this->transport->removeElement($transport);
    }

    /**
     * Get transport.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTransport()
    {
        return $this->transport;
    }

    /**
     * Add invoice.
     *
     * @param \Gpupo\CommonSchema\ORM\Entity\Trading\Order\Shippings\Invoice\Item $invoice
     *
     * @return Shipping
     */
    public function addInvoice(\Gpupo\CommonSchema\ORM\Entity\Trading\Order\Shippings\Invoice\Item $invoice)
    {
        $this->invoice[] = $invoice;

        return $this;
    }

    /**
     * Remove invoice.
     *
     * @param \Gpupo\CommonSchema\ORM\Entity\Trading\Order\Shippings\Invoice\Item $invoice
     *
     * @return bool TRUE if this collection contained the specified element, FALSE otherwise
     */
    public function removeInvoice(\Gpupo\CommonSchema\ORM\Entity\Trading\Order\Shippings\Invoice\Item $invoice)
    {
        return $this->invoice->removeElement($invoice);
    }

    /**
     * Get invoice.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getInvoice()
    {
        return $this->invoice;
    }

    /**
     * Add comment.
     *
     * @param \Gpupo\CommonSchema\ORM\Entity\Trading\Order\Shippings\Comments\Item $comment
     *
     * @return Shipping
     */
    public function addComment(\Gpupo\CommonSchema\ORM\Entity\Trading\Order\Shippings\Comments\Item $comment)
    {
        $this->comment[] = $comment;

        return $this;
    }

    /**
     * Remove comment.
     *
     * @param \Gpupo\CommonSchema\ORM\Entity\Trading\Order\Shippings\Comments\Item $comment
     *
     * @return bool TRUE if this collection contained the specified element, FALSE otherwise
     */
    public function removeComment(\Gpupo\CommonSchema\ORM\Entity\Trading\Order\Shippings\Comments\Item $comment)
    {
        return $this->comment->removeElement($comment);
    }

    /**
     * Get comment.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Add feedback.
     *
     * @param \Gpupo\CommonSchema\ORM\Entity\Trading\Order\Shippings\Feedback\Item $feedback
     *
     * @return Shipping
     */
    public function addFeedback(\Gpupo\CommonSchema\ORM\Entity\Trading\Order\Shippings\Feedback\Item $feedback)
    {
        $this->feedback[] = $feedback;

        return $this;
    }

    /**
     * Remove feedback.
     *
     * @param \Gpupo\CommonSchema\ORM\Entity\Trading\Order\Shippings\Feedback\Item $feedback
     *
     * @return bool TRUE if this collection contained the specified element, FALSE otherwise
     */
    public function removeFeedback(\Gpupo\CommonSchema\ORM\Entity\Trading\Order\Shippings\Feedback\Item $feedback)
    {
        return $this->feedback->removeElement($feedback);
    }

    /**
     * Get feedback.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFeedback()
    {
        return $this->feedback;
    }

    /**
     * Get order.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Set order.
     *
     * @param null|\Gpupo\CommonSchema\ORM\Entity\Trading\Order\Order $order
     *
     * @return Shipping
     */
    public function setOrder(\Gpupo\CommonSchema\ORM\Entity\Trading\Order\Order $order)
    {
        $this->order = $order;
        return $this;
    }
}
