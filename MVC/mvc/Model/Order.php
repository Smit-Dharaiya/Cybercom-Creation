<?php

namespace Model;

\Mage::loadFileByClassName("Model\Core\Table");

class Order extends Core\Table
{

    protected $cart = null;
    protected $customer = null;
    protected $items = null;
    protected $billingAddress = null;
    protected $shippingAddress = null;


    public function __construct()
    {
        $this->setTableName('order');
        $this->setPrimaryKey('id');
    }

    public function getCustomer()
    {
        if ($this->customer) {
            return $this->customer;
        }
        if (!$this->customerId) {
            return false;
        }
        $customer = \Mage::getModel('Model\Customer')->load($this->customerId);
        $this->setCustomer($customer);
        return $this->customer;
    }

    public function setCustomer(\Model\Customer $customer)
    {
        $this->customer = $customer;
        return $this;
    }

    public function getItems()
    {
        if (!$this->id) {
            return false;
        }
        $query = "SELECT * FROM `cartitem` WHERE `cartId` = '{$this->id}'";
        $items = \Mage::getModel('Model\Cart\Item')->fetchAll($query);
        $this->setItems($items);
        return $this->items;
    }

    public function setItems($items = null)
    {
        $this->items = $items;
        return $this;
    }

    public function getBillingAddress()
    {
        if (!$this->id) {
            return false;
        }
        $query = "SELECT * FROM `cartaddress` WHERE `cartId` = '{$this->id}' AND `addressType` = 'billing'";

        $billingAddress = \Mage::getModel('Model\Cart\Address')->fetchRow($query);

        if ($billingAddress) {
            $this->setBillingAddress($billingAddress);
        }
        return $this->billingAddress;
    }

    public function setBillingAddress(\Model\Cart\Address $billingAddress)
    {
        $this->billingAddress = $billingAddress;
        return $this;
    }

    public function getShippingAddress()
    {
        if (!$this->id) {
            return false;
        }
        $query = "SELECT * FROM `cartaddress` WHERE `cartId` = '{$this->id}' AND `addressType` = 'shipping'";
        $shippingAddress = \Mage::getModel('Model\Cart\Address')->fetchRow($query);

        if ($shippingAddress) {
            $this->setShippingAddress($shippingAddress);
        }
        return $this->shippingAddress;
    }

    public function setShippingAddress(\Model\Cart\Address $shippingAddress)
    {
        $this->shippingAddress = $shippingAddress;
        return $this;
    }

    public function addItem($product, $quantity = 1)
    {
        $query = "SELECT * 
            FROM `cartitem` 
            WHERE `cartId` = '{$this->id}' 
                AND `productId` = '{$product->id}'";
        $cartItem = \Mage::getModel('Model\Cart\Item')->fetchRow($query);
        if ($cartItem) {
            $cartItem->quantity += $quantity;
        } else {
            unset($cartItem);
            $cartItem = \Mage::getModel('Model\Cart\Item');
            $cartItem->quantity = $quantity;
        }
        $cartItem->cartId = $this->id;
        $cartItem->productId = $product->id;
        $cartItem->price = $product->price;
        $cartItem->discount = $product->discount;

        if (!$cartItem->save()) {
            echo 'error';
        }
        return $this;
    }

    public function getOrder($customerId = null)
    {
        $session = \Mage::getModel('Model\Admin\Session');
        $order = \Mage::getModel('Model\Order');
        $customerId = $session->activeCustomerId;
        if ($customerId) {

            $session->activeCustomerId = $customerId;
            $query = "SELECT * 
                FROM `order`
                WHERE `customerId` = '{$session->activeCustomerId}'";
            $order = $order->fetchRow($query);
            if ($order) {
                return $order;
            }
        }
        $order = \Mage::getModel('Model\order');
        $order->customerId = $session->activeCustomerId;
        if (!$id = $order->save()) {
            echo "error";
        }
        $order->load($id);
        return $order;
    }

    public function getActiveCustomerId()
    {
        $session = \Mage::getModel('Model\Admin\Session');
        $activeCustomerId = $session->activeCustomerId;
        if ($activeCustomerId) {
            return $activeCustomerId;
        }
        return null;
    }
}
