<?php

namespace Block\Admin\CmsPage;

\Mage::loadFileByClassName("Block\Core\Template");

class Grid extends \Block\Core\Template {
	protected $cmsPages = [];

	public function __construct() {
		$this->setTemplate('./View/Admin/CmsPage/grid.php');
	}

	public function setCmsPages($cmsPages = NULL) {
		if (!$cmsPages) {
			$cmsPage = \Mage::getModel("Model\CmsPage");
			$cmsPages = $cmsPage->fetchAll();
		}
		$this->cmsPages = $cmsPages;
		return $this;
	}

	public function getCmsPages() {
		if (!$this->cmsPages) {
			$this->setCmsPages();
		}
		return $this->cmsPages;
	}

	public function getTitle() {
		$this->getTitle = 'Manage CMS Pages';
		return $this->getTitle;
	}

}
