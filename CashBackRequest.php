<?php

namespace App\Service\Meliuz;

/**
 * Class CashBackRequest
 *
 * Transatcion Example:
 * 
 * {
 *       "transactions": [{
 *           "transaction_id": "201610131313135443701700013011293001",
 *           "currency": "BRL",
 *           "discount_value": 2.00,
 *           "extra_value": 1.00,
 *           "value": 100.00,
 *           "commission_value": 1.0099,
 *           "origin": "real-time",
 *           "status": "approved",
 *           "created_at": "2016-10-13T13:13:13Z",
 *           "affiliate": {
 *               "order_id": "1293001",
 *               "partner_id": "11233451000102",
 *               "branch_id": "54437017000130",
 *               "employee_id": "11",
 *               "terminal_id": "1"
 *           },
 *           "customer": {
 *               "phone_number": "37999220000"
 *           },
 *           "payments": [{
 *                   "method": "debit",
 *                   "installments": 0,
 *                   "value": 91,
 *                   "authorization_code": "131313",
 *                   "bin": "491612"
 *               },
 *               {
 *                   "method": "money",
 *                   "value": 9,
 *                   "installments": 0,
 *                   "paid_value": 10,
 *                   "change_value": 1
 *               }
 *           ],
 *           "products": [{
 *                   "ean_id": "1234567890921",
 *                   "sku_id": "78910",
 *                   "name": "Nome do produto 1",
 *                   "industry": {
 *                       "company_name": "Razão social",
 *                       "cnpj": "44563451000102"
 *                   },
 *                   "categories": [{
 *                       "category_id": "10",
 *                       "category_name": "Bebidas"
 *                   }],
 *                   "quantity": 1,
 *                   "unit_value": 55.00,
 *                   "total_discount_value": 4.01,
 *                   "total_extra_value": 0.01,
 *                   "total_value": 51.00,
 *                   "total_commission_value": 0.5099,
 *                   "status": "confirmed"
 *               },
 *               {
 *                   "ean_id": "9876587645321",
 *                   "sku_id": "43210",
 *                   "name": "Nome do produto 2",
 *                   "industry": {
 *                       "company_name": "Razão social",
 *                       "cnpj": "44563451000102"
 *                   },
 *                   "categories": [{
 *                           "category_id": "1",
 *                           "category_name": "Vestuário"
 *                       },
 *                       {
 *                           "category_id": "2",
 *                           "category_name": "Bermuda"
 *                       },
 *                       {
 *                           "category_id": "3",
 *                           "category_name": "Jeans"
 *                       }
 *                   ],
 *                   "quantity": 2,
 *                   "unit_value": 25.00,
 *                   "total_discount_value": 0.00,
 *                   "total_extra_value": 0.00,
 *                   "total_value": 50.00,
 *                   "total_commission_value": 0.5000,
 *                   "status": "confirmed"
 *               }
 *           ]
 *       }]
 *   }
 * 
 * @package App\Service\Meliuz
 */
class CashBackRequest implements \JsonSerializable
{
    private $transaction_id;
    private $currency = "BRL";
    private $discount_value;
    private $extra_value;
    private $value;
    private $commission_value;
    private $origin;
    private $status;
    private $created_at;

    private $affiliate;
    
    private $customer;
    
    private $payments;

    private $products;

    /**
     * @param $json
     *
     * @return Payment
     */
    public static function fromJson($json)
    {
        $payment = new Payment();
        $payment->populate(json_decode($json));

        return $payment;
    }

    /**
     * @param \stdClass $data
     */
    public function populate(\stdClass $data)
    {
        $this->transaction_id = isset($data->transaction_id) ? $data->transaction_id : null;
        $this->currency = isset($data->currency) ? $data->currency : "BRL";
        $this->discount_value = isset($data->discount_value) ? $data->discount_value : 0;
        $this->extra_value = isset($data->extra_value) ? $data->extra_value : 0;
        $this->value = isset($data->value) ? $data->value : 0;
        $this->commission_value = isset($data->commission_value) ? $data->commission_value : null;
        $this->origin = isset($data->origin) ? $data->origin : "real-time";
        $this->status = isset($data->status) ? $data->status : "pending";
        $this->created_at = isset($data->created_at) ? $data->created_at : date("Y-m-d H:i:s");

        if (isset($data->Affiliate)) {
            $this->affiliate = new Affiliate(false);
            $this->affiliate->populate($data->Affiliate);
        }

        if (isset($data->Customer)) {
            $this->customer = new Customer();
            $this->customer->populate($data->Customer);
        }

        if (isset($data->Payments)) {
            $this->payments = new Payments();
            $this->payments->populate($data->Payments);
        }

        if (isset($data->Products)) {
            $this->products = new Products();
            $this->products->populate($data->Products);
        }
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

}
