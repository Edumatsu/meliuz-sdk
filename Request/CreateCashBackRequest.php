<?php

namespace App\Service\Meliuz\Request;

use App\Service\Meliuz\CashBack;
use App\Service\Meliuz\MeliuzCashBack;

/**
 * Class CreateCashBackRequest
 *
 */
class CreateCashBackRequest extends AbstractRequest
{

    private $environment;

    /**
     * CreateCashBackRequest constructor.
     *
     * @param MeliuzCashBack    $meliuz
     */
    public function __construct(MeliuzCashBack $meliuz)
    {
        parent::__construct($meliuz);
    }

    /**
     * @param $cashBack
     *
     * @return null
     * @throws \RuntimeException
     */
    public function execute($cashBack)
    {
        $url = $this->meliuz->getApiUrl() . '1/sales/';

        return $this->sendRequest('POST', $url, $cashBack);
    }

    /**
     * @param $json
     *
     * @return CashBack
     */
    protected function unserialize($json)
    {
        return CashBack::fromJson($json);
    }
}
