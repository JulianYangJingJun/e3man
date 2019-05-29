<?php
namespace e3man;

use e3man\E3;

class E3stock extends E3 implements E3Transport
{
    public $sku;
    public $wareHouseCode;
    public $serviceType = 'stock.list.get';
    /**
     * 数据值
     * 
     * @return dict
     */
    public function toJson()
    {
        $FilterTime = $this->generateFilterTime();        
        $res = [
            'sku' => $this->sku,
            'warehouseCode' => $this->wareHouseCode,
            'startModified' => $FilterTime[0],
            'endModified' => $FilterTime[1],
            'pageNo' => 1,
            'pageSize' => 10,
        ];        
        return json_encode($res);
    }
}

class E3OrderGet extends E3 implements Transport
{
    public $sd_code;
    public $orderSn;
    public $serviceType = 'order.detail.get';
    /**
     * 数据值
     * 
     * @return dict
     */
    public function toJson()
    {
        $FilterTime = $this->generateFilterTime();
        $res = [
            'sd_code' => $this->sd_code,
            'orderSn' => $this->orderSn,
            'startModified' => $FilterTime[0],
            'endModified' => $FilterTime[1],
            'pageNo' => 1,
            'pageSize' => 10,
        ];        
        return json_encode($res);
    }
}

class E3OrderCancel extends E3 implements Transport
{
    public $serviceType = 'order.cancel.delivery';
    public $deal_code;
    public $ly_type;
    /**
     * 数据值
     * 
     * @return dict
     */
    public function toJson()
    {
        $res = [
            'deal_code' => $this->deal_code,
            'ly_type' => $this->ly_type,
        ];
        return json_encode($res);
    }
}

class E3Factory
{
    public static function factory($transport)
    {
        switch ($transport) {
            case 'E3stock':
                return new E3stock();
                break;
            case 'E3OrderGet':
                return new E3OrderGet();
                break;
            case 'E3OrderCancel':
                return new E3OrderCancel();
                break;
        }
    }
}


interface E3Transport
{
    public function test();
}
