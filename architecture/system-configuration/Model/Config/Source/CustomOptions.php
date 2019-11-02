<?php
/**
 * Source Options for Select Inputs
 *
 * @category   Certification
 * @package    Certification_ArchitectureSystemConfiguration
 * @author     Andresa Martins <contact@andresa.dev>
 * @license    http://opensource.org/licenses/BSD-2-Clause Simplified BSD License
 */

namespace Certification\ArchitectureSystemConfiguration\Model\Config\Source;

class CustomOptions implements \Magento\Framework\Data\OptionSourceInterface
{
    /**
     * Grid display options.
     *
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => '-1', 'label' => __('-- Choose an Option')],
            ['value' => '0', 'label' =>  __('Custom Select Option 1')],
            ['value' => '1', 'label' =>  __('Custom Select Option 2')]
        ];
    }
}
