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

namespace Gpupo\Tests\CommonSchema\ArrayCollection\Trading\Payment\Transactions;

use Gpupo\CommonSchema\ArrayCollection\Trading\Order\Customer\Customer;
use Gpupo\CommonSchema\ArrayCollection\Trading\Order\Order;
use Gpupo\CommonSchema\ArrayCollection\Trading\Order\Shippings\Seller;
use Gpupo\CommonSchema\ArrayCollection\Trading\Payment\Payment;
use Gpupo\CommonSchema\ArrayCollection\Trading\Payment\Transactions\Transaction;
use Gpupo\CommonSdk\Traits\ResourcesTrait;
use Gpupo\Tests\CommonSchema\AbstractTestCase;

/**
 * @coversDefaultClass \Gpupo\CommonSchema\ArrayCollection\Trading\Payment\Transactions\Transaction
 */
class TransactionTest extends AbstractTestCase
{
    use ResourcesTrait;

    /**
     * @return \Gpupo\CommonSchema\ArrayCollection\Trading\Payment\Transactions\Transaction
     */
    public function dataProviderTransaction()
    {
        $data = $this->getResourceJson('/fixtures/trading/payment/transactions/transaction.json');
        $data['order'] = new Order($data['order']);
        $data['payment'] = new Payment($data['payment']);
        $data['seller'] = new Seller($data['seller']);
        $data['customer'] = new Customer($data['customer']);

        return [[new Transaction($data), $data]];
    }

    /**
     * @testdox Cover method ``getSchema()``
     * @dataProvider dataProviderTransaction
     */
    public function testSetAndGetSchema(Transaction $transaction)
    {
        $this->assertInternalType('array', $transaction->getSchema());
    }

    /**
     * @testdox Cover methods ``setTransactionNumber`` and ``getTransactionNumber``
     * @dataProvider dataProviderTransaction
     */
    public function testSetAndGetTransactionNumber(Transaction $transaction, array $expected)
    {
        $transaction->setTransactionNumber($expected['transaction_number']);
        $this->assertSame($expected['transaction_number'], $transaction->getTransactionNumber());
    }

    /**
     * @testdox Cover methods ``setDescription`` and ``getDescription``
     * @dataProvider dataProviderTransaction
     */
    public function testSetAndGetDescription(Transaction $transaction, array $expected)
    {
        $transaction->setDescription($expected['description']);
        $this->assertSame($expected['description'], $transaction->getDescription());
    }

    /**
     * @testdox Cover methods ``setAmount`` and ``getAmount``
     * @dataProvider dataProviderTransaction
     */
    public function testSetAndGetAmount(Transaction $transaction, array $expected)
    {
        $transaction->setAmount($expected['amount']);
        $this->assertSame($expected['amount'], $transaction->getAmount());
    }

    /**
     * @testdox Cover methods ``setFinancialInstitution`` and ``getFinancialInstitution``
     * @dataProvider dataProviderTransaction
     */
    public function testSetAndGetFinancialInstitution(Transaction $transaction, array $expected)
    {
        $transaction->setFinancialInstitution($expected['financial_institution']);
        $this->assertSame($expected['financial_institution'], $transaction->getFinancialInstitution());
    }

    /**
     * @testdox Cover methods ``setOrder`` and ``getOrder``
     * @dataProvider dataProviderTransaction
     */
    public function testSetAndGetOrder(Transaction $transaction, array $expected)
    {
        $transaction->setOrder($expected['order']);
        $this->assertInstanceOf(Order::class, $transaction->getOrder());
    }

    /**
     * @testdox Cover methods ``setPayment`` and ``getPayment``
     * @dataProvider dataProviderTransaction
     */
    public function testSetAndGetPayment(Transaction $transaction, array $expected)
    {
        $transaction->setPayment($expected['payment']);
        $this->assertInstanceOf(Payment::class, $transaction->getPayment());
    }

    /**
     * @testdox Cover methods ``setCustomer`` and ``getCustomer``
     * @dataProvider dataProviderTransaction
     */
    public function testSetAndGetCustomer(Transaction $transaction, array $expected)
    {
        $transaction->setCustomer($expected['customer']);
        $this->assertInstanceOf(Customer::class, $transaction->getCustomer());
    }

    /**
     * @testdox Cover methods ``setSeller`` and ``getSeller``
     * @dataProvider dataProviderTransaction
     */
    public function testSetAndGetSeller(Transaction $transaction, array $expected)
    {
        $transaction->setSeller($expected['seller']);
        $this->assertInstanceOf(Seller::class, $transaction->getSeller());
    }

    /**
     * @testdox Cover methods ``setDateCreated`` and ``getDateCreated``
     * @dataProvider dataProviderTransaction
     */
    public function testSetAndGetDateCreated(Transaction $transaction, array $expected)
    {
        $transaction->setDateCreated($expected['date_created']);
        $this->assertSame($expected['date_created'], $transaction->getDateCreated());
    }

    /**
     * @testdox Cover methods ``setDateLastModified`` and ``getDateLastModified``
     * @dataProvider dataProviderTransaction
     */
    public function testSetAndGetDateLastModified(Transaction $transaction, array $expected)
    {
        $transaction->setDateLastModified($expected['date_last_modified']);
        $this->assertSame($expected['date_last_modified'], $transaction->getDateLastModified());
    }
}
