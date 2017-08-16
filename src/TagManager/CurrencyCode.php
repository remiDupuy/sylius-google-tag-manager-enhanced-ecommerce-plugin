<?php

namespace GtmEnhancedEcommercePlugin\TagManager;

use Sylius\Component\Channel\Context\ChannelContextInterface;
use Sylius\Component\Core\Model\OrderInterface;
use Sylius\Component\Core\Model\OrderItemInterface;
use Sylius\Component\Currency\Context\CurrencyContextInterface;
use Xynnn\GoogleTagManagerBundle\Service\GoogleTagManager;
use Xynnn\GoogleTagManagerBundle\Service\GoogleTagManagerInterface;

/**
 * Class CurrencyCode
 * @package SyliusGoogleAnalyticsEnhancedEcommerceTrackingBundle\TagManager
 */
class CurrencyCode implements CurrencyCodeInterface
{
    /**
     * @var GoogleTagManagerInterface
     */
    private $googleTagManager;

    /**
     * @var CurrencyContextInterface
     */
    private $currencyContext;

    /**
     * AddTransaction constructor.
     * @param GoogleTagManagerInterface $googleTagManager
     * @param CurrencyContextInterface $currencyContext
     */
    public function __construct(
        GoogleTagManagerInterface $googleTagManager,
        CurrencyContextInterface $currencyContext
    ) {
        $this->googleTagManager = $googleTagManager;
        $this->currencyContext = $currencyContext;
    }

    /**
     * @param OrderInterface $order
     */
    public function addCurrencyCode(): void
    {
        $this->googleTagManager->addData('ecommerce', [
            'currencyCode' => $this->currencyContext->getCurrencyCode(),
        ]);
    }
}