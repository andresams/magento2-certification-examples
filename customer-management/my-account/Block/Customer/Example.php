<?php
/**
 * Customer Example Block
 *
 * @category   Certification
 * @package    Certification_CustomerManagementMyAccount
 * @author     Andresa Martins <contact@andresa.dev>
 * @license    http://opensource.org/licenses/BSD-2-Clause Simplified BSD License
 */

namespace Certification\CustomerManagementMyAccount\Block\Customer;

/**
 * Customer Example Block
 */
class Example extends \Magento\Customer\Block\Account\Dashboard
{

    /**
     * Get Full Customer name. This values are set at
     * Certification\CustomerManagementMyAccount\Controller\Customer\Index
     *
     * @return string
     */
    public function getFullName()
    {
        return ($this->getFirstName() . ' ' . $this->getLastName());
    }
}
