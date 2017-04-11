<?php
namespace Homepage\Category\Block;

class Categoryproduct1 extends \Magento\Framework\View\Element\Template
{
	
     protected $_productCollectionFactory;
    protected $_categoryFactory;

    public function __construct(
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
        \Magento\Catalog\Model\CategoryFactory $categoryFactory,
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Catalog\Block\Product\ProductList\Item\AddTo\Compare $compare,
        \Magento\Wishlist\Block\Catalog\Product\ProductList\Item\AddTo\Wishlist $wishlist,
        \Magento\Catalog\Block\Product\ListProduct $addtocart
    ) {
        $this->_categoryFactory = $categoryFactory;
        $this->_productCollectionFactory = $productCollectionFactory;
        $this->_compare = $compare;
        $this->_wishlist = $wishlist;
        $this->_addToCart = $addtocart;
         
        parent::__construct($context);
    }

    public function getCategoryProduct($categoryId)
    {
        $categoryId = $categoryId;
        $category = $this->_categoryFactory->create()->load($categoryId);
        $collection = $this->_productCollectionFactory->create();
        $collection->addAttributeToSelect('*');
        $collection->addCategoryFilter($category);
        $collection->addAttributeToFilter('visibility', \Magento\Catalog\Model\Product\Visibility::VISIBILITY_BOTH);
        $collection->addAttributeToFilter('status',\Magento\Catalog\Model\Product\Attribute\Source\Status::STATUS_ENABLED);      
        $collection->getSelect()->orderRand();
        return $collection;
    }

    public function getAddToCompare($product)
    {
        return $this->_compare->getCompareHelper()->getPostDataParams($product);
    }

    public function getAddToWishlist($product)
    {
        return $this->_wishlist->getAddToWishlistParams($product);
    }

    public  function getCategory($categoryId)
    {
            $category = $this->_categoryFactory->create()->load($categoryId);
        $categoryName = $category->getName();
        return $categoryName;
    }
    
    public function getAddToCart($product)
    {
        return $this->_addToCart->getAddToCartPostParams($product);
    }

    public function getProductPriceHtml(
        \Magento\Catalog\Model\Product $product,
        $priceType = null,
        $renderZone = \Magento\Framework\Pricing\Render::ZONE_ITEM_LIST,
        array $arguments = []
    ) {
        if (!isset($arguments['zone'])) {
            $arguments['zone'] = $renderZone;
        }
        $arguments['zone'] = isset($arguments['zone'])
            ? $arguments['zone']
            : $renderZone;
        $arguments['price_id'] = isset($arguments['price_id'])
            ? $arguments['price_id']
            : 'old-price-' . $product->getId() . '-' . $priceType;
        $arguments['include_container'] = isset($arguments['include_container'])
            ? $arguments['include_container']
            : true;
        $arguments['display_minimal_price'] = isset($arguments['display_minimal_price'])
            ? $arguments['display_minimal_price']
            : true;

            /** @var \Magento\Framework\Pricing\Render $priceRender */
        $priceRender = $this->getLayout()->getBlock('product.price.render.default');

        $price = '';
        if ($priceRender) {
            $price = $priceRender->render(
                \Magento\Catalog\Pricing\Price\FinalPrice::PRICE_CODE,
                $product,
                $arguments
            );
        }
        return $price;
    }
}