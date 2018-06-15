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

namespace Gpupo\CommonSchema\ORM\Entity\Trading\Payment;

use Doctrine\ORM\Mapping as ORM;

/**
 * Payment.
 *
 * @ORM\Table(name="cs_trading_payment")
 * @ORM\Entity(repositoryClass="Gpupo\CommonSchema\ORM\Repository\Trading\Payment\PaymentRepository")
 */
class Payment extends \Gpupo\CommonSchema\AbstractORMEntity
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
     * @ORM\Column(name="payment_number", type="bigint")
     */
    private $payment_number;

    /**
     * @var string
     *
     * @ORM\Column(name="currency_id", type="string", unique=false)
     */
    private $currency_id;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", unique=false)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="status_code", type="string", unique=false)
     */
    private $status_code;

    /**
     * @var string
     *
     * @ORM\Column(name="status_detail", type="string", unique=false)
     */
    private $status_detail;

    /**
     * @var string
     *
     * @ORM\Column(name="transaction_amount", type="decimal", precision=10, scale=2)
     */
    private $transaction_amount;

    /**
     * @var string
     *
     * @ORM\Column(name="shipping_cost", type="decimal", precision=10, scale=2)
     */
    private $shipping_cost;

    /**
     * @var string
     *
     * @ORM\Column(name="overpaid_amount", type="decimal", precision=10, scale=2)
     */
    private $overpaid_amount;

    /**
     * @var string
     *
     * @ORM\Column(name="total_paid_amount", type="decimal", precision=10, scale=2)
     */
    private $total_paid_amount;

    /**
     * @var string
     *
     * @ORM\Column(name="marketplace_fee", type="decimal", precision=10, scale=2)
     */
    private $marketplace_fee;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_amount", type="decimal", precision=10, scale=2)
     */
    private $coupon_amount;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_created", type="datetime")
     */
    private $date_created;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_last_modified", type="datetime")
     */
    private $date_last_modified;

    /**
     * @var string
     *
     * @ORM\Column(name="card_id", type="string", unique=false)
     */
    private $card_id;

    /**
     * @var string
     *
     * @ORM\Column(name="reason", type="string", unique=false)
     */
    private $reason;

    /**
     * @var string
     *
     * @ORM\Column(name="activation_uri", type="string", unique=false)
     */
    private $activation_uri;

    /**
     * @var string
     *
     * @ORM\Column(name="payment_method_id", type="string", unique=false)
     */
    private $payment_method_id;

    /**
     * @var int
     *
     * @ORM\Column(name="installments", type="bigint")
     */
    private $installments;

    /**
     * @var int
     *
     * @ORM\Column(name="issuer_id", type="bigint")
     */
    private $issuer_id;

    /**
     * @var string
     *
     * @ORM\Column(name="coupon_id", type="string", unique=false)
     */
    private $coupon_id;

    /**
     * @var string
     *
     * @ORM\Column(name="operation_type", type="string", unique=false)
     */
    private $operation_type;

    /**
     * @var string
     *
     * @ORM\Column(name="payment_type", type="string", unique=false)
     */
    private $payment_type;

    /**
     * @var array
     *
     * @ORM\Column(name="available_actions", type="array")
     */
    private $available_actions;

    /**
     * @var string
     *
     * @ORM\Column(name="installment_amount", type="decimal", precision=10, scale=2)
     */
    private $installment_amount;

    /**
     * @var string
     *
     * @ORM\Column(name="deferred_period", type="string", unique=false)
     */
    private $deferred_period;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_approved", type="datetime")
     */
    private $date_approved;

    /**
     * @var string
     *
     * @ORM\Column(name="authorization_code", type="string", unique=false)
     */
    private $authorization_code;

    /**
     * @var string
     *
     * @ORM\Column(name="transaction_order_id", type="string", unique=false)
     */
    private $transaction_order_id;

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
     * @var \Gpupo\CommonSchema\ORM\Entity\Trading\Payment\Collector\Collector
     *
     * @ORM\OneToOne(targetEntity="Gpupo\CommonSchema\ORM\Entity\Trading\Payment\Collector\Collector")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="collector_id", referencedColumnName="id", unique=true)
     * })
     */
    private $collector;

    /**
     * @var \Gpupo\CommonSchema\ORM\Entity\Trading\Payment\AtmTransferReference
     *
     * @ORM\OneToOne(targetEntity="Gpupo\CommonSchema\ORM\Entity\Trading\Payment\AtmTransferReference")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="atm_transfer_reference_id", referencedColumnName="id", unique=true)
     * })
     */
    private $atm_transfer_reference;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToOne(targetEntity="Gpupo\CommonSchema\ORM\Entity\Trading\Order\Order", inversedBy="payments")
     */
    private $order;

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
     * Set paymentNumber.
     *
     * @param int $paymentNumber
     *
     * @return Payment
     */
    public function setPaymentNumber($paymentNumber)
    {
        $this->payment_number = $paymentNumber;

        return $this;
    }

    /**
     * Get paymentNumber.
     *
     * @return int
     */
    public function getPaymentNumber()
    {
        return $this->payment_number;
    }

    /**
     * Set currencyId.
     *
     * @param string $currencyId
     *
     * @return Payment
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
     * Set status.
     *
     * @param string $status
     *
     * @return Payment
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set statusCode.
     *
     * @param string $statusCode
     *
     * @return Payment
     */
    public function setStatusCode($statusCode)
    {
        $this->status_code = $statusCode;

        return $this;
    }

    /**
     * Get statusCode.
     *
     * @return string
     */
    public function getStatusCode()
    {
        return $this->status_code;
    }

    /**
     * Set statusDetail.
     *
     * @param string $statusDetail
     *
     * @return Payment
     */
    public function setStatusDetail($statusDetail)
    {
        $this->status_detail = $statusDetail;

        return $this;
    }

    /**
     * Get statusDetail.
     *
     * @return string
     */
    public function getStatusDetail()
    {
        return $this->status_detail;
    }

    /**
     * Set transactionAmount.
     *
     * @param string $transactionAmount
     *
     * @return Payment
     */
    public function setTransactionAmount($transactionAmount)
    {
        $this->transaction_amount = $transactionAmount;

        return $this;
    }

    /**
     * Get transactionAmount.
     *
     * @return string
     */
    public function getTransactionAmount()
    {
        return $this->transaction_amount;
    }

    /**
     * Set shippingCost.
     *
     * @param string $shippingCost
     *
     * @return Payment
     */
    public function setShippingCost($shippingCost)
    {
        $this->shipping_cost = $shippingCost;

        return $this;
    }

    /**
     * Get shippingCost.
     *
     * @return string
     */
    public function getShippingCost()
    {
        return $this->shipping_cost;
    }

    /**
     * Set overpaidAmount.
     *
     * @param string $overpaidAmount
     *
     * @return Payment
     */
    public function setOverpaidAmount($overpaidAmount)
    {
        $this->overpaid_amount = $overpaidAmount;

        return $this;
    }

    /**
     * Get overpaidAmount.
     *
     * @return string
     */
    public function getOverpaidAmount()
    {
        return $this->overpaid_amount;
    }

    /**
     * Set totalPaidAmount.
     *
     * @param string $totalPaidAmount
     *
     * @return Payment
     */
    public function setTotalPaidAmount($totalPaidAmount)
    {
        $this->total_paid_amount = $totalPaidAmount;

        return $this;
    }

    /**
     * Get totalPaidAmount.
     *
     * @return string
     */
    public function getTotalPaidAmount()
    {
        return $this->total_paid_amount;
    }

    /**
     * Set marketplaceFee.
     *
     * @param string $marketplaceFee
     *
     * @return Payment
     */
    public function setMarketplaceFee($marketplaceFee)
    {
        $this->marketplace_fee = $marketplaceFee;

        return $this;
    }

    /**
     * Get marketplaceFee.
     *
     * @return string
     */
    public function getMarketplaceFee()
    {
        return $this->marketplace_fee;
    }

    /**
     * Set couponAmount.
     *
     * @param string $couponAmount
     *
     * @return Payment
     */
    public function setCouponAmount($couponAmount)
    {
        $this->coupon_amount = $couponAmount;

        return $this;
    }

    /**
     * Get couponAmount.
     *
     * @return string
     */
    public function getCouponAmount()
    {
        return $this->coupon_amount;
    }

    /**
     * Set dateCreated.
     *
     * @param \DateTime $dateCreated
     *
     * @return Payment
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
     * Set dateLastModified.
     *
     * @param \DateTime $dateLastModified
     *
     * @return Payment
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
     * Set cardId.
     *
     * @param string $cardId
     *
     * @return Payment
     */
    public function setCardId($cardId)
    {
        $this->card_id = $cardId;

        return $this;
    }

    /**
     * Get cardId.
     *
     * @return string
     */
    public function getCardId()
    {
        return $this->card_id;
    }

    /**
     * Set reason.
     *
     * @param string $reason
     *
     * @return Payment
     */
    public function setReason($reason)
    {
        $this->reason = $reason;

        return $this;
    }

    /**
     * Get reason.
     *
     * @return string
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * Set activationUri.
     *
     * @param string $activationUri
     *
     * @return Payment
     */
    public function setActivationUri($activationUri)
    {
        $this->activation_uri = $activationUri;

        return $this;
    }

    /**
     * Get activationUri.
     *
     * @return string
     */
    public function getActivationUri()
    {
        return $this->activation_uri;
    }

    /**
     * Set paymentMethodId.
     *
     * @param string $paymentMethodId
     *
     * @return Payment
     */
    public function setPaymentMethodId($paymentMethodId)
    {
        $this->payment_method_id = $paymentMethodId;

        return $this;
    }

    /**
     * Get paymentMethodId.
     *
     * @return string
     */
    public function getPaymentMethodId()
    {
        return $this->payment_method_id;
    }

    /**
     * Set installments.
     *
     * @param int $installments
     *
     * @return Payment
     */
    public function setInstallments($installments)
    {
        $this->installments = $installments;

        return $this;
    }

    /**
     * Get installments.
     *
     * @return int
     */
    public function getInstallments()
    {
        return $this->installments;
    }

    /**
     * Set issuerId.
     *
     * @param int $issuerId
     *
     * @return Payment
     */
    public function setIssuerId($issuerId)
    {
        $this->issuer_id = $issuerId;

        return $this;
    }

    /**
     * Get issuerId.
     *
     * @return int
     */
    public function getIssuerId()
    {
        return $this->issuer_id;
    }

    /**
     * Set couponId.
     *
     * @param string $couponId
     *
     * @return Payment
     */
    public function setCouponId($couponId)
    {
        $this->coupon_id = $couponId;

        return $this;
    }

    /**
     * Get couponId.
     *
     * @return string
     */
    public function getCouponId()
    {
        return $this->coupon_id;
    }

    /**
     * Set operationType.
     *
     * @param string $operationType
     *
     * @return Payment
     */
    public function setOperationType($operationType)
    {
        $this->operation_type = $operationType;

        return $this;
    }

    /**
     * Get operationType.
     *
     * @return string
     */
    public function getOperationType()
    {
        return $this->operation_type;
    }

    /**
     * Set paymentType.
     *
     * @param string $paymentType
     *
     * @return Payment
     */
    public function setPaymentType($paymentType)
    {
        $this->payment_type = $paymentType;

        return $this;
    }

    /**
     * Get paymentType.
     *
     * @return string
     */
    public function getPaymentType()
    {
        return $this->payment_type;
    }

    /**
     * Set availableActions.
     *
     * @param array $availableActions
     *
     * @return Payment
     */
    public function setAvailableActions($availableActions)
    {
        $this->available_actions = $availableActions;

        return $this;
    }

    /**
     * Get availableActions.
     *
     * @return array
     */
    public function getAvailableActions()
    {
        return $this->available_actions;
    }

    /**
     * Set installmentAmount.
     *
     * @param string $installmentAmount
     *
     * @return Payment
     */
    public function setInstallmentAmount($installmentAmount)
    {
        $this->installment_amount = $installmentAmount;

        return $this;
    }

    /**
     * Get installmentAmount.
     *
     * @return string
     */
    public function getInstallmentAmount()
    {
        return $this->installment_amount;
    }

    /**
     * Set deferredPeriod.
     *
     * @param string $deferredPeriod
     *
     * @return Payment
     */
    public function setDeferredPeriod($deferredPeriod)
    {
        $this->deferred_period = $deferredPeriod;

        return $this;
    }

    /**
     * Get deferredPeriod.
     *
     * @return string
     */
    public function getDeferredPeriod()
    {
        return $this->deferred_period;
    }

    /**
     * Set dateApproved.
     *
     * @param \DateTime $dateApproved
     *
     * @return Payment
     */
    public function setDateApproved($dateApproved)
    {
        $this->date_approved = $dateApproved;

        return $this;
    }

    /**
     * Get dateApproved.
     *
     * @return \DateTime
     */
    public function getDateApproved()
    {
        return $this->date_approved;
    }

    /**
     * Set authorizationCode.
     *
     * @param string $authorizationCode
     *
     * @return Payment
     */
    public function setAuthorizationCode($authorizationCode)
    {
        $this->authorization_code = $authorizationCode;

        return $this;
    }

    /**
     * Get authorizationCode.
     *
     * @return string
     */
    public function getAuthorizationCode()
    {
        return $this->authorization_code;
    }

    /**
     * Set transactionOrderId.
     *
     * @param string $transactionOrderId
     *
     * @return Payment
     */
    public function setTransactionOrderId($transactionOrderId)
    {
        $this->transaction_order_id = $transactionOrderId;

        return $this;
    }

    /**
     * Get transactionOrderId.
     *
     * @return string
     */
    public function getTransactionOrderId()
    {
        return $this->transaction_order_id;
    }

    /**
     * Set tags.
     *
     * @param array $tags
     *
     * @return Payment
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
     * @return Payment
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
     * Set collector.
     *
     * @param null|\Gpupo\CommonSchema\ORM\Entity\Trading\Payment\Collector\Collector $collector
     *
     * @return Payment
     */
    public function setCollector(\Gpupo\CommonSchema\ORM\Entity\Trading\Payment\Collector\Collector $collector = null)
    {
        $this->collector = $collector;

        return $this;
    }

    /**
     * Get collector.
     *
     * @return null|\Gpupo\CommonSchema\ORM\Entity\Trading\Payment\Collector\Collector
     */
    public function getCollector()
    {
        return $this->collector;
    }

    /**
     * Set atmTransferReference.
     *
     * @param null|\Gpupo\CommonSchema\ORM\Entity\Trading\Payment\AtmTransferReference $atmTransferReference
     *
     * @return Payment
     */
    public function setAtmTransferReference(\Gpupo\CommonSchema\ORM\Entity\Trading\Payment\AtmTransferReference $atmTransferReference = null)
    {
        $this->atm_transfer_reference = $atmTransferReference;

        return $this;
    }

    /**
     * Get atmTransferReference.
     *
     * @return null|\Gpupo\CommonSchema\ORM\Entity\Trading\Payment\AtmTransferReference
     */
    public function getAtmTransferReference()
    {
        return $this->atm_transfer_reference;
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
     * @return Payment
     */
    public function setOrder(\Gpupo\CommonSchema\ORM\Entity\Trading\Order\Order $order)
    {
        $this->order = $order;
        return $this;
    }
}
