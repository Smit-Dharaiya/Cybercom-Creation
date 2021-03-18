<?php 

namespace Block\Admin\Customer\Edit\Tabs;

\Mage::loadFileByClassName("Block\Admin\Core\Template");

class Address extends \Block\Admin\Core\Template
{
	protected $address = null;
    protected $billing = null;
    protected $shipping = null;

	function __construct()
	{
		$this->setTemplate("./View/Admin/Customer/Edit/Tabs/address.php");
	}

	public function validCustomer()
    {
        $id = $this->getRequest()->getGet('id');
        $customer = \Mage::getModel("Model\Customer");
        $customer = $customer->load($id);
        if ($customer) {
            return true;
        }
        return false;
    }

    public function setCustomerAddress($address = null)
    {
        if($address){
            $this->address = $address;
            return $this;
        }
        $address = \Mage::getModel("Model\CustomerAddress");
        $this->billing = $address;
        $this->shipping = $address;
        if ($id = $this->getRequest()->getGet('id')) {
            $query = "SELECT * FROM {$address->getTableName()} WHERE `customerId` = {$id};";   
            $address = $address->fetchAll($query);
            $this->address = $address;
            if($address){
                foreach ($address->getData() as $value) {
                    $address = \Mage::getModel('Model\CustomerAddress');
                    if($value->addressType == 'billing'){
                        $this->billing = $value;
                    }
                    if($value->addressType == 'shipping'){
                        $this->shipping = $value;
                    }
                }
            }
        }
        return $this;
    }

    public function getBilling()
    {
        if (!$this->billing) {
            $this->setCustomerAddress();
        }
        return $this->billing;
    }

    public function getShipping()
    {
        if (!$this->shipping) {
            $this->setCustomerAddress();
        }
        return $this->shipping;
    }

    public function getCustomerAddress()
    {
        if(!$this->address){
            $this->setCustomerAddress();
        }
        return $this->address;
    }

    public function getbutton()
    {
        /*if($this->getCustomerAddress()){
            echo 'Update';
        }
        else{
        */echo 'Add';
        // }
    }
}

?>