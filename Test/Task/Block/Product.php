<?php
namespace Test\Task\Block;
use Magento\Backend\Block\Template\Context;
use Magento\Catalog\Model\ProductRepository;
use Magento\Catalog\Model\ResourceModel\Category\Collection;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
use Magento\Checkout\Helper\Cart;
use Magento\Framework\App\ObjectManager;
use Magento\Framework\Controller\Result\RedirectFactory;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Registry;
use Magento\Framework\View\Element\Template;
use Magento2\Helpers\PHPCSUtils\BackCompat\Helper;

class Product extends Template
{
    protected $_categoryCollectionFactory;
    protected $_productRepository;
    protected $_registry;
    /**
     * @var RedirectFactory
     */
    private $resultRedirectFactory;
    /**
     * @var Cart
     */
    private $cartHelper;

    public function __construct(
        Context $context,
        \Magento\Catalog\Model\ResourceModel\Category\CollectionFactory $categoryCollectionFactory,
        ProductRepository $productRepository,
        Registry $registry,
        RedirectFactory $resultRedirectFactory,
        Cart $cartHelper,
        array $data = []
    )
    {
        $this->_categoryCollectionFactory = $categoryCollectionFactory;
        $this->_productRepository = $productRepository;
        $this->_registry = $registry;
        parent::__construct($context, $data);
        $this->resultRedirectFactory = $resultRedirectFactory;
        $this->cartHelper = $cartHelper;
    }

    /**
     * Get category collection
     *
     * @param bool $isActive
     * @param bool|int $level
     * @param bool|string $sortBy
     * @param bool|int $pageSize
     * @return Collection or array
     * @throws LocalizedException
     */
    public function getCategoryCollection($isActive = true, $level = false, $sortBy = false, $pageSize = false)
    {
        $collection = $this->_categoryCollectionFactory->create();
        $collection->addAttributeToSelect('*');

        // select only active categories
        if ($isActive) {
            $collection->addIsActiveFilter();
        }

        // select categories of certain level
        if ($level) {
            $collection->addLevelFilter($level);
        }

        // sort categories by some value
        if ($sortBy) {
            $collection->addOrderField($sortBy);
        }

        // select certain number of categories
        if ($pageSize) {
            $collection->setPageSize($pageSize);
        }

        return $collection;
    }

    public function getProductById($id)
    {
        return $this->_productRepository->getById($id);
    }

    public function getCurrentProduct()
    {
        return $this->_registry->registry('current_product');
    }
    public function getCountProduct()
    {
        $collection2 = $this->_categoryCollectionFactory->create();
        $collection2->addAttributeToSelect('*');
        return count($collection2->getData());

    }

    public function makeCartNew($getId,$product_name)
    {
        $argument = ['id' => $getId, '_current' => true];
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('checkout/cart',$argument);
        return $resultRedirect->setUrl($product_name)['redirect'];
    }

    public function MakeCartNew2($product)
    {
        $NewHelper = $this->cartHelper->getAddUrl($product);
        return $NewHelper;

    }



}
