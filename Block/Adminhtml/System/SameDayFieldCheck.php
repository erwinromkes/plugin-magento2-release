<?php

namespace DHLParcel\Shipping\Block\Adminhtml\System;

use DHLParcel\Shipping\Helper\Data;

class SameDayFieldCheck extends \Magento\Framework\Data\Form\Element\AbstractElement
{
    protected $helper;

    public function __construct(
        \Magento\Framework\Data\Form\Element\Factory $factoryElement,
        \Magento\Framework\Data\Form\Element\CollectionFactory $factoryCollection,
        \Magento\Framework\Escaper $escaper,
        Data $helper,
        array $data = []
    ) {
        parent::__construct($factoryElement, $factoryCollection, $escaper, $data);
        $this->helper = $helper;
    }

    public function getElementHtml()
    {
        $message = __('No shipping days have been set, for sameday to function this field is required');
        $shippingDays = $this->helper->getConfigData('delivery_times/shipping_days');
        $shippingDays = is_string($shippingDays) ? explode(',', $shippingDays) : [];
        $message = '<span class="dhlparcel-sameday-check valid-shipping-days">' . $message . '</span>';
        } else {
            $message = '<span class="dhlparcel-sameday-check">' . $message . '</span>';
        }
        return $message;
    }
}
