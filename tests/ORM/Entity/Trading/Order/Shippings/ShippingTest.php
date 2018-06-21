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
namespace Gpupo\CommonSchema\Tests\ORM\Entity\Trading\Order\Shippings;

use Gpupo\CommonSchema\Tests\AbstractTestCase;
use Gpupo\CommonSchema\ORM\Entity\Trading\Order\Order;
use Gpupo\CommonSchema\ORM\Entity\Trading\Order\Shippings\Shipping;
use Gpupo\CommonSchema\ORM\Entity\Trading\Order\Shippings\Seller;
use Gpupo\CommonSchema\ORM\Entity\Trading\Order\Shippings\Products\Product;
use Gpupo\CommonSchema\ORM\Entity\Trading\Order\Shippings\Comments\Item as Comment;
use Gpupo\CommonSchema\ORM\Entity\Trading\Order\Shippings\Feedback\Item as Feedback;
use Gpupo\CommonSchema\ORM\Entity\Trading\Order\Shippings\Transport\Item as Transport;
use Gpupo\CommonSchema\ORM\Entity\Trading\Order\Shippings\Invoice\Item as Invoice;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @coversDefaultClass \Gpupo\CommonSchema\ORM\Entity\Trading\Order\Shippings\Shipping
 */
class ShippingTest extends AbstractTestCase
{

    public function dataProvider()
    {
        $expected = [
            'shipping_number' => 22,
            'fulfilled' => true,
            'hidden_for_seller' => true,
            'date_created' => new \DateTime('now'),
            'date_last_expiration' => new \DateTime('now'),
            'date_last_modified' => new \DateTime('now'),
            'currency_id' => 1,
            'total_commission' => 5.4,
            'total_discount' => 10.3,
            'total_freight' => 30.2,
            'total_gross' => 40.1,
            'total_net' => 50.6,
            'total_quantity' => 11,
            'seller' => new Seller(),
            'products' => new ArrayCollection(),
            'transports' => new ArrayCollection(),
            'invoices' => new ArrayCollection(),
            'comments' => new ArrayCollection(),
            'feedbacks' => new ArrayCollection(),
            'order' => new Order(),
            'tags' => [
                'foo' => 'bar'
            ],
            'expands' => [
                'foo' => 'bar'
            ]
        ];

        $shipping = new Shipping();

        return [[$shipping, $expected]];
    }

    /**
    * @dataProvider dataProvider
    * @testdox Cover method ``setShippingNumber()`` and ``getShippingNumber()``
    */
    public function testSetAndGetShippingNumber(Shipping $shipping, array $expected){
        $this->assertTrue(method_exists($shipping, 'setShippingNumber'),'Method setShippingNumber() non exists');
        $this->assertTrue(method_exists($shipping, 'getShippingNumber'),'Method getShippingNumber() non exists');

        $shipping->setShippingNumber($expected['shipping_number']);
        $this->assertSame($expected['shipping_number'], $shipping->getShippingNumber());
    }

    /**
    * @dataProvider dataProvider
    * @testdox Cover method ``setFulfilled()`` and ``getFulfilled()``
    */
    public function testSetAndGetFulfilled(Shipping $shipping, array $expected){
        $this->assertTrue(method_exists($shipping, 'setFulfilled'),'Method setFulfilled() non exists');
        $this->assertTrue(method_exists($shipping, 'getFulfilled'),'Method getFulfilled() non exists');

        $shipping->setFulfilled($expected['fulfilled']);
        $this->assertSame($expected['fulfilled'], $shipping->getFulfilled());

        $shipping->setFulfilled(false);
        $this->assertFalse($shipping->getFulfilled());

        $shipping->setFulfilled(true);
        $this->assertTrue($shipping->getFulfilled());
    }


    /**
    * @dataProvider dataProvider
    * @testdox Cover method ``setHiddenForSeller()`` and ``getHiddenForSeller()``
    */
    public function testSetAndGetHiddenForSeller(Shipping $shipping, array $expected){
        $this->assertTrue(method_exists($shipping, 'setHiddenForSeller'),'Method setHiddenForSeller() non exists');
        $this->assertTrue(method_exists($shipping, 'getHiddenForSeller'),'Method getHiddenForSeller() non exists');

        $shipping->setHiddenForSeller($expected['hidden_for_seller']);
        $this->assertSame($expected['hidden_for_seller'], $shipping->getHiddenForSeller());

        $shipping->setHiddenForSeller(false);
        $this->assertFalse($shipping->getHiddenForSeller());

        $shipping->setHiddenForSeller(true);
        $this->assertTrue($shipping->getHiddenForSeller());
    }

    /**
    * @dataProvider dataProvider
    * @testdox Cover method ``setDateCreated()`` and ``getDateCreated()``
    */
    public function testSetAndGetDateCreated(Shipping $shipping, array $expected){
        $this->assertTrue(method_exists($shipping, 'setDateCreated'),'Method setDateCreated() non exists');
        $this->assertTrue(method_exists($shipping, 'getDateCreated'),'Method getDateCreated() non exists');

        $shipping->setDateCreated($expected['date_created']);
        $this->assertSame($expected['date_created'], $shipping->getDateCreated());
    }

    /**
    * @dataProvider dataProvider
    * @testdox Cover method ``setDateLastExpiration()`` and ``getDateLastExpiration()``
    */
    public function testSetAndGetDateLastExpiration(Shipping $shipping, array $expected){
        $this->assertTrue(method_exists($shipping, 'setDateLastExpiration'),'Method setDateLastExpiration() non exists');
        $this->assertTrue(method_exists($shipping, 'getDateLastExpiration'),'Method getDateLastExpiration() non exists');

        $shipping->setDateLastExpiration($expected['date_last_expiration']);
        $this->assertSame($expected['date_last_expiration'], $shipping->getDateLastExpiration());
    }

    /**
    * @dataProvider dataProvider
    * @testdox Cover method ``setDateLastModified()`` and ``getDateLastModified()``
    */
    public function testSetAndGetDateLastModified(Shipping $shipping, array $expected){
        $this->assertTrue(method_exists($shipping, 'setDateLastModified'),'Method setDateLastModified() non exists');
        $this->assertTrue(method_exists($shipping, 'getDateLastModified'),'Method getDateLastModified() non exists');

        $shipping->setDateLastModified($expected['date_last_modified']);
        $this->assertSame($expected['date_last_modified'], $shipping->getDateLastModified());
    }

    /**
    * @dataProvider dataProvider
    * @testdox Cover method ``setCurrencyId()`` and ``getCurrencyId()``
    */
    public function testSetAndGetCurrencyId(Shipping $shipping, array $expected){
        $this->assertTrue(method_exists($shipping, 'setCurrencyId'),'Method setCurrencyId() non exists');
        $this->assertTrue(method_exists($shipping, 'getCurrencyId'),'Method getCurrencyId() non exists');

        $shipping->setCurrencyId($expected['currency_id']);
        $this->assertSame($expected['currency_id'], $shipping->getCurrencyId());
    }

    /**
    * @dataProvider dataProvider
    * @testdox Cover method ``setTotalCommission()`` and ``getTotalCommission()``
    */
    public function testSetAndGetTotalCommission(Shipping $shipping, array $expected){
        $this->assertTrue(method_exists($shipping, 'setTotalCommission'),'Method setTotalCommission() non exists');
        $this->assertTrue(method_exists($shipping, 'getTotalCommission'),'Method getTotalCommission() non exists');

        $shipping->setTotalCommission($expected['total_commission']);
        $this->assertSame($expected['total_commission'], $shipping->getTotalCommission());
    }

    /**
    * @dataProvider dataProvider
    * @testdox Cover method ``setTotalDiscount()`` and ``getTotalDiscount()``
    */
    public function testSetAndGetTotalDiscount(Shipping $shipping, array $expected){
        $this->assertTrue(method_exists($shipping, 'setTotalDiscount'),'Method setTotalDiscount() non exists');
        $this->assertTrue(method_exists($shipping, 'getTotalDiscount'),'Method getTotalDiscount() non exists');

        $shipping->setTotalDiscount($expected['total_discount']);
        $this->assertSame($expected['total_discount'], $shipping->getTotalDiscount());
    }

    /**
    * @dataProvider dataProvider
    * @testdox Cover method ``setTotalFreight()`` and ``getTotalFreight()``
    */
    public function testSetAndGetTotalFreight(Shipping $shipping, array $expected){
        $this->assertTrue(method_exists($shipping, 'setTotalFreight'),'Method setTotalFreight() non exists');
        $this->assertTrue(method_exists($shipping, 'getTotalFreight'),'Method getTotalFreight() non exists');

        $shipping->setTotalFreight($expected['total_freight']);
        $this->assertSame($expected['total_freight'], $shipping->getTotalFreight());
    }


    /**
    * @dataProvider dataProvider
    * @testdox Cover method ``setTotalGross()`` and ``getTotalGross()``
    */
    public function testSetAndGetTotalGross(Shipping $shipping, array $expected){
        $this->assertTrue(method_exists($shipping, 'setTotalGross'),'Method setTotalGross() non exists');
        $this->assertTrue(method_exists($shipping, 'getTotalGross'),'Method getTotalGross() non exists');

        $shipping->setTotalGross($expected['total_gross']);
        $this->assertSame($expected['total_gross'], $shipping->getTotalGross());
    }

    /**
    * @dataProvider dataProvider
    * @testdox Cover method ``setTotalNet()`` and ``getTotalNet()``
    */
    public function testSetAndGetTotalNet(Shipping $shipping, array $expected){
        $this->assertTrue(method_exists($shipping, 'setTotalNet'),'Method setTotalNet() non exists');
        $this->assertTrue(method_exists($shipping, 'getTotalNet'),'Method getTotalNet() non exists');

        $shipping->setTotalNet($expected['total_net']);
        $this->assertSame($expected['total_net'], $shipping->getTotalNet());
    }

    /**
    * @dataProvider dataProvider
    * @testdox Cover method ``setTotalQuantity()`` and ``getTotalQuantity()``
    */
    public function testSetAndGetTotalQuantity(Shipping $shipping, array $expected){
        $this->assertTrue(method_exists($shipping, 'setTotalQuantity'),'Method setTotalQuantity() non exists');
        $this->assertTrue(method_exists($shipping, 'getTotalQuantity'),'Method getTotalQuantity() non exists');

        $shipping->setTotalQuantity($expected['total_quantity']);
        $this->assertSame($expected['total_quantity'], $shipping->getTotalQuantity());
    }

    /**
    * @dataProvider dataProvider
    * @testdox Cover method ``setOrder()`` and ``getOrder()``
    */
    public function testSetAndGetOrder(Shipping $shipping, array $expected){
        $this->assertTrue(method_exists($shipping, 'setOrder'),'Method setOrder() non exists');
        $this->assertTrue(method_exists($shipping, 'getOrder'),'Method getOrder() non exists');

        $shipping->setOrder($expected['order']);
        $this->assertInstanceOf(Order::class, $shipping->getOrder());
    }

    /**
    * @dataProvider dataProvider
    * @testdox Cover method ``setSeller()`` and ``getSeller()``
    */
    public function testSetAndGetSeller(Shipping $shipping, array $expected){
        $this->assertTrue(method_exists($shipping, 'setSeller'),'Method setOrder() non exists');
        $this->assertTrue(method_exists($shipping, 'getSeller'),'Method getOrder() non exists');

        $shipping->setSeller($expected['seller']);
        $this->assertInstanceOf(Seller::class, $shipping->getSeller());
    }

    /**
    * @dataProvider dataProvider
    * @testdox Cover method ``getProducts()``
    */
    public function testGetProducts(Shipping $shipping){
        $this->assertTrue(method_exists($shipping, 'getProducts'),'Method getProducts() non exists');
        $this->assertInstanceOf(ArrayCollection::class, $shipping->getProducts());
    }

    /**
    * @dataProvider dataProvider
    * @testdox Cover method ``addProduct()``
    */
    public function testAddProduct(Shipping $shipping){
        $this->assertTrue(method_exists($shipping, 'addProduct'),'Method addProduct() non exists');

        $product = new Product();
        $shipping->addProduct($product);
        $this->assertSame(1, $shipping->getProducts()->count());

        $product = new Product();
        $shipping->addProduct($product);
        $this->assertSame(2, $shipping->getProducts()->count());
    }

    /**
    * @dataProvider dataProvider
    * @testdox Cover method ``removeProduct()``
    */
    public function testRemoveProduct(Shipping $shipping){
        $this->assertTrue(method_exists($shipping, 'removeProduct'),'Method removeProduct() non exists');

        $product = new Product();
        $shipping->addProduct($product);

        $product = new Product();
        $shipping->addProduct($product);

        $product = new Product();
        $shipping->addProduct($product);

        $shipping->removeProduct($product);
        $this->assertSame(2, $shipping->getProducts()->count());
    }

    /**
    * @dataProvider dataProvider
    * @testdox Cover method ``getTransports()``
    */
    public function testGetTransports(Shipping $shipping){
        $this->assertTrue(method_exists($shipping, 'getTransports'),'Method getTransports() non exists');
        $this->assertInstanceOf(ArrayCollection::class, $shipping->getTransports());
    }

    /**
    * @dataProvider dataProvider
    * @testdox Cover method ``AddTransport()``
    */
    public function testAddTransport(Shipping $shipping){
        $this->assertTrue(method_exists($shipping, 'AddTransport'),'Method AddTransport() non exists');

        $transport = new Transport();
        $shipping->AddTransport($transport);
        $this->assertSame(1, $shipping->getTransports()->count());

        $transport = new Transport();
        $shipping->AddTransport($transport);
        $this->assertSame(2, $shipping->getTransports()->count());
    }

    /**
    * @dataProvider dataProvider
    * @testdox Cover method ``removeTransport()``
    */
    public function testRemoveTransport(Shipping $shipping){
        $this->assertTrue(method_exists($shipping, 'removeTransport'),'Method removeTransport() non exists');

        $transport = new Transport();
        $shipping->AddTransport($transport);

        $transport = new Transport();
        $shipping->AddTransport($transport);

        $transport = new Transport();
        $shipping->AddTransport($transport);

        $shipping->removeTransport($transport);
        $this->assertSame(2, $shipping->getTransports()->count());
    }

    /**
    * @dataProvider dataProvider
    * @testdox Cover method ``getInvoices()``
    */
    public function testGetInvoices(Shipping $shipping){
        $this->assertTrue(method_exists($shipping, 'getInvoices'),'Method getInvoices() non exists');
        $this->assertInstanceOf(ArrayCollection::class, $shipping->getInvoices());
    }

    /**
    * @dataProvider dataProvider
    * @testdox Cover method ``addInvoice()``
    */
    public function testAddInvoice(Shipping $shipping){
        $this->assertTrue(method_exists($shipping, 'addInvoice'),'Method addInvoice() non exists');

        $invoice = new Invoice();
        $shipping->addInvoice($invoice);
        $this->assertSame(1, $shipping->getInvoices()->count());

        $invoice = new Invoice();
        $shipping->addInvoice($invoice);
        $this->assertSame(2, $shipping->getInvoices()->count());
    }

    /**
    * @dataProvider dataProvider
    * @testdox Cover method ``removeInvoice()``
    */
    public function testRemoveInvoice(Shipping $shipping){
        $this->assertTrue(method_exists($shipping, 'removeInvoice'),'Method removeInvoice() non exists');

        $invoice = new Invoice();
        $shipping->addInvoice($invoice);

        $invoice = new Invoice();
        $shipping->addInvoice($invoice);

        $invoice = new Invoice();
        $shipping->addInvoice($invoice);

        $shipping->removeInvoice($invoice);
        $this->assertSame(2, $shipping->getInvoices()->count());
    }

    /**
    * @dataProvider dataProvider
    * @testdox Cover method ``getComments()``
    */
    public function testGetComments(Shipping $shipping){
        $this->assertTrue(method_exists($shipping, 'getComments'),'Method getComments() non exists');
        $this->assertInstanceOf(ArrayCollection::class, $shipping->getComments());
    }

    /**
    * @dataProvider dataProvider
    * @testdox Cover method ``addComment()``
    */
    public function testAddComment(Shipping $shipping){
        $this->assertTrue(method_exists($shipping, 'addComment'),'Method addComment() non exists');

        $comment = new Comment();
        $shipping->addComment($comment);
        $this->assertSame(1, $shipping->getComments()->count());

        $comment = new Comment();
        $shipping->addComment($comment);
        $this->assertSame(2, $shipping->getComments()->count());
    }

    /**
    * @dataProvider dataProvider
    * @testdox Cover method ``removeComment()``
    */
    public function testRemoveComment(Shipping $shipping){
        $this->assertTrue(method_exists($shipping, 'removeComment'),'Method removeComment() non exists');

        $comment = new Comment();
        $shipping->addComment($comment);

        $comment = new Comment();
        $shipping->addComment($comment);

        $comment = new Comment();
        $shipping->addComment($comment);

        $shipping->removeComment($comment);
        $this->assertSame(2, $shipping->getComments()->count());
    }

    /**
    * @dataProvider dataProvider
    * @testdox Cover method ``getComments()``
    */
    public function testGetFeedbacks(Shipping $shipping){
        $this->assertTrue(method_exists($shipping, 'getFeedbacks'),'Method getFeedbacks() non exists');
        $this->assertInstanceOf(ArrayCollection::class, $shipping->getFeedbacks());
    }

    /**
    * @dataProvider dataProvider
    * @testdox Cover method ``addFeedback()``
    */
    public function testAddFeedback(Shipping $shipping){
        $this->assertTrue(method_exists($shipping, 'addFeedback'),'Method addFeedback() non exists');

        $feedback = new Feedback();
        $shipping->addFeedback($feedback);
        $this->assertSame(1, $shipping->getFeedbacks()->count());

        $feedback = new Feedback();
        $shipping->addFeedback($feedback);
        $this->assertSame(2, $shipping->getFeedbacks()->count());
    }

    /**
    * @dataProvider dataProvider
    * @testdox Cover method ``removeFeedback()``
    */
    public function testRemoveFeedback(Shipping $shipping){
        $this->assertTrue(method_exists($shipping, 'removeFeedback'),'Method removeFeedback() non exists');

        $feedback = new Feedback();
        $shipping->addFeedback($feedback);

        $feedback = new Feedback();
        $shipping->addFeedback($feedback);

        $feedback = new Feedback();
        $shipping->addFeedback($feedback);

        $shipping->removeFeedback($feedback);
        $this->assertSame(2, $shipping->getFeedbacks()->count());
    }

    /**
    * @dataProvider dataProvider
    * @testdox Cover method ``setExpands()`` and ``getExpands()``
    */
    public function testSetAndGetExpands(Shipping $shipping, $expected){
        $this->assertTrue(method_exists($shipping, 'setExpands'),'Method setExpands() non exists');
        $this->assertTrue(method_exists($shipping, 'getExpands'),'Method getExpands() non exists');

        $shipping->setExpands($expected['expands']);
        $this->assertSame($expected['expands'], $shipping->getExpands());
        $this->assertTrue(is_array($shipping->getExpands()));
    }

    /**
    * @dataProvider dataProvider
    * @testdox Cover method ``setTags()`` and ``getTags()``
    */
    public function testSetAndGetTags(Shipping $shipping, $expected){
        $this->assertTrue(method_exists($shipping, 'setTags'),'Method setTags() non exists');
        $this->assertTrue(method_exists($shipping, 'getTags'),'Method getTags() non exists');

        $shipping->setTags($expected['tags']);
        $this->assertSame($expected['tags'], $shipping->getTags());
        $this->assertTrue(is_array($shipping->getTags()));
    }
}
