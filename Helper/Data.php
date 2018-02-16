<?php
namespace Dangs\Preventtocart\Helper;

use Magento\Framework\App\Helper\AbstractHelper;

/**
 * Created by Carl Owens (carl@partfire.co.uk)
 * Company: PartFire Ltd (www.partfire.co.uk)
 **/
class Data extends AbstractHelper
{
    /**
     * @var \Magento\Framework\App\Http\Context
     */
    private $_httpContext;

    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Framework\App\Http\Context $httpContext
    ) {
        parent::__construct($context);
        $this->_httpContext = $httpContext;
    }

    public function isLoggedIn()
    {
        $isLoggedIn = $this->_httpContext->getValue(\Magento\Customer\Model\Context::CONTEXT_AUTH);
        return $isLoggedIn;
    }

    public function getStatus(){
        return $this->scopeConfig->getValue('dangs_preventtocart/general/enabled', 
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }

    public function getWording(){
        return $this->scopeConfig->getValue('dangs_preventtocart/general/wording_preventtocart', 
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }

    public function getRedirectLink(){
        return $this->scopeConfig->getValue('dangs_preventtocart/general/url_redirect', 
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }

}
