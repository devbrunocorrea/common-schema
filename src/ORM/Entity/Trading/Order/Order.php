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

namespace Gpupo\CommonSchema\ORM\Entity\Trading\Order;

use Doctrine\ORM\Mapping as ORM;

/**
 * Order.
 *
 * @ORM\Table(name="cs_trading_order")
 * @ORM\Entity(repositoryClass="Gpupo\CommonSchema\ORM\Repository\Trading\Order\OrderRepository")
 */
class Order extends \Gpupo\CommonSchema\AbstractORMEntity
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
     * @ORM\Column(name="order_number", type="string", unique=false)
     */
    private $order_number;

    /**
     * @var string
     *
     * @ORM\Column(name="order_status", type="string", unique=false)
     */
    private $order_status;

    /**
     * @var string
     *
     * @ORM\Column(name="order_type", type="string", unique=false)
     */
    private $order_type;

    /**
     * @var \DateTime
     * @ORM\Column(name="date_created", type="datetime")
     */
    private $date_created;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_closed", type="datetime")
     */
    private $date_closed;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_agreed", type="datetime")
     */
    private $date_agreed;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_last_modified", type="datetime")
     */
    private $date_last_modified;

    /**
     * @var string
     *
     * @ORM\Column(name="origin_business_unit", type="string", unique=false)
     */
    private $origin_business_unit;

    /**
     * @var string
     *
     * @ORM\Column(name="origin_number", type="string", unique=false)
     */
    private $origin_number;

    /**
     * @var string
     *
     * @ORM\Column(name="origin_site", type="string", unique=false)
     */
    private $origin_site;

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
     * @var bool
     *
     * @ORM\Column(name="requested_devolution", type="boolean")
     */
    private $requested_devolution;

    /**
     * @var bool
     *
     * @ORM\Column(name="requested_exchange", type="boolean")
     */
    private $requested_exchange;

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
     * @var \Gpupo\CommonSchema\ORM\Entity\Trading\Order\OrderStatusDetail
     *
     * @ORM\OneToOne(targetEntity="Gpupo\CommonSchema\ORM\Entity\Trading\Order\OrderStatusDetail")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="order_status_detail_id", referencedColumnName="id", unique=true)
     * })
     */
    private $order_status_detail;

    /**
     * @var \Gpupo\CommonSchema\ORM\Entity\Trading\Order\Customer\Customer
     *
     * @ORM\OneToOne(targetEntity="Gpupo\CommonSchema\ORM\Entity\Trading\Order\Customer\Customer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="customer_id", referencedColumnName="id", unique=true)
     * })
     */
    private $customer;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Gpupo\CommonSchema\ORM\Entity\Trading\Order\Shippings\Shipping", mappedBy="order")
     */
    private $shippings;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Gpupo\CommonSchema\ORM\Entity\Trading\Payment\Payment", mappedBy="order")
     */
    private $payments;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Gpupo\CommonSchema\ORM\Entity\Trading\Order\Shippings\Feedback\Item", mappedBy="order")
     */
    private $feedbacks;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->shippings = new \Doctrine\Common\Collections\ArrayCollection();
        $this->payments = new \Doctrine\Common\Collections\ArrayCollection();
        $this->feedbacks = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set orderNumber.
     *
     * @param string $orderNumber
     *
     * @return Order
     */
    public function setOrderNumber($orderNumber)
    {
        $this->order_number = $orderNumber;

        return $this;
    }

    /**
     * Get orderNumber.
     *
     * @return string
     */
    public function getOrderNumber()
    {
        return $this->order_number;
    }

    /**
     * Set orderStatus.
     *
     * @param string $orderStatus
     *
     * @return Order
     */
    public function setOrderStatus($orderStatus)
    {
        $this->order_status = $orderStatus;

        return $this;
    }

    /**
     * Get orderStatus.
     *
     * @return string
     */
    public function getOrderStatus()
    {
        return $this->order_status;
    }

    /**
     * Set orderType.
     *
     * @param string $orderType
     *
     * @return Order
     */
    public function setOrderType($orderType)
    {
        $this->order_type = $orderType;

        return $this;
    }

    /**
     * Get orderType.
     *
     * @return string
     */
    public function getOrderType()
    {
        return $this->order_type;
    }

    /**
     * Set dateCreated.
     *
     * @param \DateTime $dateCreated
     *
     * @return Order
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
     * Set dateClosed.
     *
     * @param \DateTime $dateClosed
     *
     * @return Order
     */
    public function setDateClosed($dateClosed)
    {
        $this->date_closed = $dateClosed;

        return $this;
    }

    /**
     * Get dateClosed.
     *
     * @return \DateTime
     */
    public function getDateClosed()
    {
        return $this->date_closed;
    }

    /**
     * Set dateAgreed.
     *
     * @param \DateTime $dateAgreed
     *
     * @return Order
     */
    public function setDateAgreed($dateAgreed)
    {
        $this->date_agreed = $dateAgreed;

        return $this;
    }

    /**
     * Get dateAgreed.
     *
     * @return \DateTime
     */
    public function getDateAgreed()
    {
        return $this->date_agreed;
    }

    /**
     * Set dateLastModified.
     *
     * @param \DateTime $dateLastModified
     *
     * @return Order
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
     * Set originBusinessUnit.
     *
     * @param string $originBusinessUnit
     *
     * @return Order
     */
    public function setOriginBusinessUnit($originBusinessUnit)
    {
        $this->origin_business_unit = $originBusinessUnit;

        return $this;
    }

    /**
     * Get originBusinessUnit.
     *
     * @return string
     */
    public function getOriginBusinessUnit()
    {
        return $this->origin_business_unit;
    }

    /**
     * Set originNumber.
     *
     * @param string $originNumber
     *
     * @return Order
     */
    public function setOriginNumber($originNumber)
    {
        $this->origin_number = $originNumber;

        return $this;
    }

    /**
     * Get originNumber.
     *
     * @return string
     */
    public function getOriginNumber()
    {
        return $this->origin_number;
    }

    /**
     * Set originSite.
     *
     * @param string $originSite
     *
     * @return Order
     */
    public function setOriginSite($originSite)
    {
        $this->origin_site = $originSite;

        return $this;
    }

    /**
     * Get originSite.
     *
     * @return string
     */
    public function getOriginSite()
    {
        return $this->origin_site;
    }

    /**
     * Set currencyId.
     *
     * @param string $currencyId
     *
     * @return Order
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
     * @return Order
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
     * @return Order
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
     * @return Order
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
     * @return Order
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
     * @return Order
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
     * @return Order
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
     * Set requestedDevolution.
     *
     * @param bool $requestedDevolution
     *
     * @return Order
     */
    public function setRequestedDevolution($requestedDevolution)
    {
        $this->requested_devolution = $requestedDevolution;

        return $this;
    }

    /**
     * Get requestedDevolution.
     *
     * @return bool
     */
    public function getRequestedDevolution()
    {
        return $this->requested_devolution;
    }

    /**
     * Set requestedExchange.
     *
     * @param bool $requestedExchange
     *
     * @return Order
     */
    public function setRequestedExchange($requestedExchange)
    {
        $this->requested_exchange = $requestedExchange;

        return $this;
    }

    /**
     * Get requestedExchange.
     *
     * @return bool
     */
    public function getRequestedExchange()
    {
        return $this->requested_exchange;
    }

    /**
     * Set tags.
     *
     * @param array $tags
     *
     * @return Order
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
     * @return Order
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
     * Set orderStatusDetail.
     *
     * @param null|\Gpupo\CommonSchema\ORM\Entity\Trading\Order\OrderStatusDetail $orderStatusDetail
     *
     * @return Order
     */
    public function setOrderStatusDetail(\Gpupo\CommonSchema\ORM\Entity\Trading\Order\OrderStatusDetail $orderStatusDetail = null)
    {
        $this->order_status_detail = $orderStatusDetail;

        return $this;
    }

    /**
     * Get orderStatusDetail.
     *
     * @return null|\Gpupo\CommonSchema\ORM\Entity\Trading\Order\OrderStatusDetail
     */
    public function getOrderStatusDetail()
    {
        return $this->order_status_detail;
    }

    /**
     * Set customer.
     *
     * @param null|\Gpupo\CommonSchema\ORM\Entity\Trading\Order\Customer\Customer $customer
     *
     * @return Order
     */
    public function setCustomer(\Gpupo\CommonSchema\ORM\Entity\Trading\Order\Customer\Customer $customer = null)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Get customer.
     *
     * @return null|\Gpupo\CommonSchema\ORM\Entity\Trading\Order\Customer\Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Add shipping.
     *
     * @param \Gpupo\CommonSchema\ORM\Entity\Trading\Order\Shippings\Shipping $shipping
     *
     * @return Order
     */
    public function addShipping(\Gpupo\CommonSchema\ORM\Entity\Trading\Order\Shippings\Shipping $shipping)
    {
        $this->shippings[] = $shipping;

        return $this;
    }

    /**
     * Remove shipping.
     *
     * @param \Gpupo\CommonSchema\ORM\Entity\Trading\Order\Shippings\Shipping $shipping
     *
     * @return bool TRUE if this collection contained the specified element, FALSE otherwise
     */
    public function removeShipping(\Gpupo\CommonSchema\ORM\Entity\Trading\Order\Shippings\Shipping $shipping)
    {
        return $this->shippings->removeElement($shipping);
    }

    /**
     * Get shipping.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getShippings()
    {
        return $this->shippings;
    }

    /**
     * Add payment.
     *
     * @param \Gpupo\CommonSchema\ORM\Entity\Trading\Payment\Payment $payment
     *
     * @return Order
     */
    public function addPayment(\Gpupo\CommonSchema\ORM\Entity\Trading\Payment\Payment $payment)
    {
        $this->payments[] = $payment;

        return $this;
    }

    /**
     * Remove payment.
     *
     * @param \Gpupo\CommonSchema\ORM\Entity\Trading\Payment\Payment $payment
     *
     * @return bool TRUE if this collection contained the specified element, FALSE otherwise
     */
    public function removePayment(\Gpupo\CommonSchema\ORM\Entity\Trading\Payment\Payment $payment)
    {
        return $this->payments->removeElement($payment);
    }

    /**
     * Get payment.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPayments()
    {
        return $this->payments;
    }

    /**
     * Add feedback.
     *
     * @param \Gpupo\CommonSchema\ORM\Entity\Trading\Order\Feedback\Item $feedback
     *
     * @return Order
     */
    public function addFeedback(\Gpupo\CommonSchema\ORM\Entity\Trading\Order\Feedback\Item $feedback)
    {
        $this->feedbacks[] = $feedback;

        return $this;
    }

    /**
     * Remove feedback.
     *
     * @param \Gpupo\CommonSchema\ORM\Entity\Trading\Order\Feedback\Item $feedback
     *
     * @return bool TRUE if this collection contained the specified element, FALSE otherwise
     */
    public function removeFeedback(\Gpupo\CommonSchema\ORM\Entity\Trading\Order\Feedback\Item $feedback)
    {
        return $this->feedbacks->removeElement($feedback);
    }

    /**
     * Get feedback.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFeedbacks()
    {
        return $this->feedbacks;
    }
}
