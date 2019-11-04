<?php
/**
 * Customer Example Controller. Displays a new page on the customer dashboard
 *
 * @category   Certification
 * @package    Certification_CustomerManagementMyAccount
 * @author     Andresa Martins <contact@andresa.dev>
 * @license    http://opensource.org/licenses/BSD-2-Clause Simplified BSD License
 */
namespace Certification\CustomerManagementMyAccount\Controller\Customer;

use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Customer\Model\Session;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface as HttpGetActionInterface;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Customer\Controller\AbstractAccount implements HttpGetActionInterface
{
    /**
     * @var \Magento\Customer\Api\CustomerRepositoryInterface
     */
    protected $customerRepository;

    /**
     * @var Session
     */
    protected $session;

    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * @param Context $context
     * @param Session $customerSession
     * @param PageFactory $resultPageFactory
     * @param CustomerRepositoryInterface $customerRepository
     */
    public function __construct(
        Context $context,
        Session $customerSession,
        PageFactory $resultPageFactory,
        CustomerRepositoryInterface $customerRepository
    ) {
        $this->session = $customerSession;
        $this->resultPageFactory = $resultPageFactory;
        $this->customerRepository = $customerRepository;
        parent::__construct($context);
    }

    /**
     * Forgot customer account information page
     *
     * @return \Magento\Framework\View\Result\Page
     * @throws \Magento\Framework\Exception\LocalizedException
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function execute()
    {
        /** @var \Magento\Framework\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();

        $customerId = $this->session->getCustomerId();
        $customerDataObject = $this->customerRepository->getById($customerId);

        //Get block defined on view/frontend/layout/custom_myaccount_customer_index.xml
        $block = $resultPage->getLayout()->getBlock('customer_dashboard_example');

        //Adds new data to the block
        if ($block) {
            $block->setFirstName($customerDataObject->getFirstName());
            $block->setLastName($customerDataObject->getLastName());
            $block->setEmail($customerDataObject->getEmail());
        }

        /**
         * It is possible to set the page title inside of the controller. However, if the title
         * is also set in the Layout XML file, that title will take precedence and will be the
         * one to be displayed.
         *
         * Tip: Try to remove the title node from view/frontend/layout/custom_myaccount_customer_index.xml
         */
        $resultPage->getConfig()->getTitle()
            ->set(__('Example Custom Customer Dashboard Page (title set in the Controller)'));
        return $resultPage;
    }
}
