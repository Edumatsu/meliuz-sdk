<?php

namespace App\Service\Meliuz;

use App\Service\Meliuz\Request\CreateSaleRequest;
use App\Service\Meliuz\Request\QueryRecurrentPaymentRequest;
use App\Service\Meliuz\Request\QuerySaleRequest;
use App\Service\Meliuz\Request\TokenizeCardRequest;
use App\Service\Meliuz\Request\UpdateSaleRequest;

/**
 * The Meliuz SDK front-end;
 */
class MeliuzCashBack
{
    private $token;

    private $affiliateId;

    private $apiType;

    private $urlRequest;

    /**
     * @param $token
     * @param $affiliateId
     * @param $apiType = 'test' or 'production'
     */
    public function __construct($token, $affiliateId, $apiType = 'production')
    {
        $this->token = $token;
        $this->affiliateId = $affiliateId;
        $this->apiType = $apiType;

        $this->urlRequest = "https://integration.meliuz.com.br";

        if ($this->apiType == 'test') {
            $this->urlRequest = "https://integration-staging.meliuz.com.br";
        } 
    }

    /**
     * Envia transação para o Meliuz
     *
     */
    public function sendCashBackRequest(CashBack $cashBack)
    {
        $createSaleRequest = new CreateCashBackRequest($this);

        return $createSaleRequest->execute($cashBack);
    }

    public function getApiUrl()
    {
        return $this->urlRequest;
    }
}
