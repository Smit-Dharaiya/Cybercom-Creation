<?php

namespace Block\Admin\Order;

\Mage::loadFileByClassName("Block\Core\Grid");

class Grid extends \Block\Core\Grid
{

    protected $products = [];

    public function __construct()
    {
        parent::__construct();
        $this->setTemplate('./View/Admin/Order/grid.php');
    }

    public function prepareCollection()
    {
        $order = \Mage::getModel("Model\Order\Item");
        if ($this->getFilterObject()->getFilters()) {
            $collection = $order->fetchAll($this->buildFilterQuery('orderitem'));
        } else {
            $collection = $order->getOrder($this->getActiveCustomerId())->getItems();
            echo '<pre>';
            print_r($collection);
            die();
        }
        $this->setCollection($collection);
        return $this;
    }

    public function prepareColumns()
    {
        $this->addColumns('id', [
            'field' => 'id',
            'label' => 'Id',
            'type' => 'number',
            'filter' => $this->getFilterObject()->getFilters('id'),
        ]);
        $this->addColumns('customerId', [
            'field' => 'customerId',
            'label' => 'Customer Id',
            'type' => 'number',
            'filter' => $this->getFilterObject()->getFilters('cartId'),
        ]);
        $this->addColumns('firstName', [
            'field' => 'firstName',
            'label' => 'First Name',
            'type' => 'number',
            'filter' => $this->getFilterObject()->getFilters('productId'),
        ]);
        $this->addColumns('lastName', [
            'field' => 'lastName',
            'label' => 'Last Name',
            'type' => 'text',
            'filter' => $this->getFilterObject()->getFilters('productId'),
        ]);
        $this->addColumns('email', [
            'field' => 'email',
            'label' => 'email',
            'type' => 'date',
            'filter' => $this->getFilterObject()->getFilters('createdDate'),
        ]);
        $this->addColumns('contactNo', [
            'field' => 'contactNo',
            'label' => 'Contact No',
            'type' => 'number',
            'filter' => $this->getFilterObject()->getFilters('quantity'),
        ]);
        $this->addColumns('total', [
            'field' => 'total',
            'label' => 'Total',
            'type' => 'number',
            'filter' => $this->getFilterObject()->getFilters('price'),
        ]);
        $this->addColumns('discount', [
            'field' => 'discount',
            'label' => 'Discount',
            'type' => 'number',
            'filter' => $this->getFilterObject()->getFilters('discount'),
        ]);
        $this->addColumns('paymentMethodId', [
            'field' => 'paymentMethodId',
            'label' => 'PaymentMethod Id',
            'type' => 'number',
            'filter' => $this->getFilterObject()->getFilters('changedPrice'),
        ]);
        $this->addColumns('paymentName', [
            'field' => 'paymentName',
            'label' => 'Payment Name',
            'type' => 'number',
            'filter' => $this->getFilterObject()->getFilters('changedPrice'),
        ]);
        $this->addColumns('paymentCode', [
            'field' => 'paymentCode',
            'label' => 'Payment Code',
            'type' => 'number',
            'filter' => $this->getFilterObject()->getFilters('totalPrice'),
        ]);
        $this->addColumns('shippingMethodId', [
            'field' => 'shippingMethodId',
            'label' => 'shippingMethod Id',
            'type' => 'number',
            'filter' => $this->getFilterObject()->getFilters('totalPrice'),
        ]);
        $this->addColumns('shippingName', [
            'field' => 'shippingName',
            'label' => 'Shipping Name',
            'type' => 'number',
            'filter' => $this->getFilterObject()->getFilters('totalPrice'),
        ]);
        $this->addColumns('shippingCode', [
            'field' => 'shippingCode',
            'label' => 'Shipping Code',
            'type' => 'number',
            'filter' => $this->getFilterObject()->getFilters('totalPrice'),
        ]);
        $this->addColumns('shippingAmount', [
            'field' => 'shippingAmount',
            'label' => 'Shipping Amount',
            'type' => 'number',
            'filter' => $this->getFilterObject()->getFilters('totalPrice'),
        ]);
        $this->addColumns('status', [
            'field' => 'status',
            'label' => 'status',
            'type' => 'number',
            'filter' => $this->getFilterObject()->getFilters('totalPrice'),
        ]);

        return $this;
    }

    public function getTitle()
    {
        $this->getTitle = 'Manage Order';
        return $this->getTitle;
    }

    // -----> Manage button actions ------

    public function prepareActions()
    {
        $this->addActions('delete', [
            'label' => '<i class="fas fa-trash-alt"></i>',
            'method' => 'getDeleteUrl',
            'ajax' => false
        ]);
        return $this;
    }

    public function getDeleteUrl($row)
    {
        return $this->getUrlObject()->getUrl('delete', null, ['id' => $row->id], true);
    }

    public function getUpdateCartUrl($row)
    {
        return $this->getUrlObject()->getUrl('save', null, ['id' => $row->cartId], true);
    }

    public function getCheckoutUrl($row)
    {
        return $this->getUrlObject()->getUrl('checkout', 'cart\Checkout', ['id' => $row->id], true);
    }

    public function getCustomerList()
    {
        $customerList = \Mage::getModel('Model\Customer')->fetchAll();
        if (!$customerList) {
            $this->getMessage()->getFailute("Ooops !! no customer found...");
            return null;
        }
        return $customerList->getData();
    }

    // -----> Manage buttons ------

    public function prepareButtons()
    {
        $this->addButtons('addnew', [
            'label' => '<i class="fas fa-plus"></i> Add New',
            'method' => 'AddNewUrl',
            'ajax' => false,
        ]);
        $this->addButtons('updateCart', [
            'label' => '<i class="fas fa-cart-arrow-down"></i> Update Cart',
            'method' => 'getUpdateCartUrl',
            'ajax' => false,
        ]);
        $this->addButtons('applyFilter', [
            'label' => '<i class="fas fa-filter"></i> Apply Filter',
            'method' => 'getFilterAction',
            'ajax' => false,
        ]);
        $this->addButtons('checkout', [
            'label' => '<i class="fas fa-credit-card"></i> Proceed to checkout',
            'method' => 'getCheckoutUrl',
            'ajax' => false,
        ]);
        if ($this->getFilterObject()->getFilters() != null) {
            $this->addButtons('clearFilter', [
                'label' => '<i class="fas fa-times-circle"></i> Clear Filters',
                'method' => 'getClearFilterAction',
                'ajax' => false,
            ]);
            return $this;
        }
    }

    public function getActiveCustomerActionUrl()
    {
        return $this->getUrlObject()->getUrl('setActiveCustomerCart', 'cart', null, true);
    }

    public function getActiveCustomerId()
    {
        $activeCustomerId = \Mage::getModel('Model\Admin\Session')->activeCustomerId;
        if ($activeCustomerId) {
            return $activeCustomerId;
        }
        return null;
    }

    public function buildFilterQuery($tableName)
    {
        $filters = $this->getFilterObject()->getFilters();
        $query = "SELECT * FROM `{$tableName}`";
        if ($filters) {
            $query .= " WHERE ";
            foreach ($filters as $key => $value) {
                if ($value) {
                    $query .= "`" . $key . "` LIKE '%" . $value . "%' AND ";
                }
            }
        }
        $query = rtrim($query, ' AND ') . ";";
        return $query;
    }

    public function getProduct()
    {
        $cartItem = \Mage::getModel('Model\Cart')->getCart()->getItems();
        if ($cartItem) {
            foreach ($cartItem->getData() as $key => $value) {
                $product = \Mage::getModel('Model\Product')->load($value->productId)->getOriginalData();
                $this->products[$key] = $product;
            }
            return $this->products;
        }
        return null;
    }

    // public function getCustomer()
    // {
    //     $customer = \Mage::getModel('Model\Cart')->getCart()->getCustomer()->getData();
    //     return $customer;
    // }
}
