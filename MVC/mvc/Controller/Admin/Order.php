<?php

namespace Controller\Admin;

\Mage::loadFileByClassName('Controller\Core\Admin');

class Order extends \Controller\Core\Admin
{
    public function gridAction()
    {
        $layout = $this->getLayout();
        $grid = \Mage::getBlock('Block\Admin\Order\Grid');
        $content = $layout->getContent()->addChild($grid);
        $this->toHtmlLayout();
    }

    public function saveAction()
    {
        try {
            $order = \Mage::getModel('Model\Order');
            $cart = \Mage::getModel('Model\Cart');
            $payment = \Mage::getModel('Model\PaymentMethod');
            $shipping = \Mage::getModel('Model\shippingMethod');

            $cart = $cart->getCart();
            $customer =  $cart->getCustomer();
            if (!$customer || !$cart) {
                throw new \Exception("Error Processing Request", 1);
            }

            $order->customerId = $customer->id;
            $order->firstName = $customer->firstName;
            $order->lastName = $customer->lastName;
            $order->email = $customer->email;
            $order->contactNo = $customer->contactNo;

            $order->total = $cart->total;
            $order->discount = $cart->discount;
            $order->paymentMethodId = $cart->paymentMethodId;
            $order->shippingMethodId = $cart->shippingMethodId;

            $payment = $payment->load($order->paymentMethodId);
            $order->paymentName = $payment->name;
            $order->paymentCode = $payment->code;

            $shipping = $shipping->load($order->shippingMethodId);
            $order->shippingName = $shipping->name;
            $order->shippingCode = $shipping->code;
            $order->shippingAmount = $shipping->amount;

            if ($order->save()) {
                $this->getMessage()->setSuccess("Order Added Successfully");
            } else {
                $this->getMessage()->setSuccess("Unable to Add Order");
            }
        } catch (\Exception $e) {
            echo $this->getMessage()->setFailure($e->getMessage());
            $this->redirect('grid', 'Cart\Checkout');
        }
        $this->redirect('grid', 'order', null, false);
    }
}
