<?php
namespace Dangs\Preventtocart\Observer;
 
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Message\ManagerInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Controller\ResultFactory;

class addToCart implements ObserverInterface  
{
    /**
     * @var ObjectManagerInterface
     */
    protected $_helper;
    protected $_messageManager;
    protected $_resultRedirect;
    
    /**
     * @param \Magento\Framework\ObjectManagerInterface $objectManager
     */
    public function __construct(
        \Dangs\Preventtocart\Helper\Data $helper,
        \Magento\Framework\Message\ManagerInterface $messageManager
    ) {
        $this->_helper = $helper;
        $this->_messageManager = $messageManager;
    }
 
    /**
     * customer register event handler
     *
     * @param \Magento\Framework\Event\Observer $observer
     * @return void
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        try{
            $cancelCartStatus = $this->_helper->getStatus();
            $cancelCartTmp = true;

            if($cancelCartStatus && !$this->_helper->isLoggedIn()){
                $cancelCartTmp = false;
            }
            if(!$cancelCartTmp){
                $wording = $this->_helper->getWording();
                $redirect = $this->_helper->getRedirectLink();
                $this->_messageManager->addErrorMessage($wording);
                $isAjax = $this->isAjax();
                if($isAjax){
                    $result['backUrl'] = $redirect;
                    echo json_encode($result);
                    exit;
                }else{
                    echo '<script>window.location.href = "'.$redirect.'";</script>';
                    exit;
                }
            }
        }catch(Exception $e){
            throw new LocalizedException(__('Could not add Product to Cart'));
        }
    }

    public function isAjax() {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';
    }
}