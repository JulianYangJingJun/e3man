<?php
namespace e3man;

use e3man\E3;

class E3stock extends E3 implements E3Transport
{
    /**
     * 商品 SKU
     */
    public $sku;

    /**
     * 仓库外部编码
     */
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

class E3OrderGet extends E3 implements E3Transport
{

    /**
     * 订单编号
     */
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

class E3OrderCancel extends E3 implements E3Transport
{
    public $serviceType = 'order.cancel.delivery';
    public $deal_code;
    public $ly_type;
    public $order_sn;
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
            'order_sn' => $this->order_sn
        ];
        return json_encode($res);
    }
}

class E3OrderAdd extends E3 implements E3Transport
{
    public $serviceType = 'order.add';
    public $deal_code = 'elite-2222222223333-I57A8Y';
    public $receiver_province = '北京';
    public $shipping_code = '';
    public $user_name = '祥哥';
    public $receiver_city = 0; //'北京市';
    public $pay_code = 'weixin';
    public $receiver_district = '东城区';
    public $lylx = 0;
    public $receiver_mobile = '17625345627';
    public $is_cod = 0;
    public $pay_time = '';
    public $shipping_fee = 0.00;
    public $add_time = '';
    public $shop_code = 0;
    public $guider_id = 0;
    public $vip_no = 0;

    public $pay_status = 1;
    public $order_amount = 10.00;
    public $receiver_name = '刘';
    public $payment = 10.00;
    public $receiver_country = '中国';
    public $receiver_addr = '北京北京市东城区哈哈哈';
    public $items = [[
        'deal_code'   => '2222222223333-I57A8Y',
        'shop_price'  => 10.00,
        'goods_number' => 1,
        'goods_price' => 10.00,
        'sku'         => 'BBS93020U30046',
        'order_sn'    => '2222222223333-I57A8Y'
    ]];
    public $order_sn = '';
    /**
     * 数据值
     * 
     * @return dict
     */
    public function toJson()
    {
        $res = [
            'sd_code'          => $this->sd_code,
            'deal_code'        => $this->deal_code,
            'receiver_province' => $this->receiver_province,
            'shipping_code'    => $this->shipping_code,
            'user_name'        => $this->user_name,
            'receiver_city'    => $this->receiver_city,
            'pay_code'         => $this->pay_code,
            'receiver_district' => $this->receiver_district,
            'lylx'             => $this->lylx,
            'receiver_mobile'  => $this->receiver_mobile,
            'is_cod'           => $this->is_cod,
            'pay_time'         => $this->pay_time,
            'add_time'         => $this->add_time,
            'shop_code'        => $this->shop_code,
            'guider_id'        => $this->guider_id,
            'vip_no'           => $this->vip_no,
            
            'shipping_fee'     => $this->shipping_fee,
            'pay_status'       => $this->pay_status,
            'order_amount'     => $this->order_amount,
            'receiver_name'    => $this->receiver_name,
            'payment'          => $this->payment,
            'receiver_country' => $this->receiver_country,
            'receiver_addr'    => $this->receiver_addr,
            'items' => $this->items,
            'order_sn' => $this->order_sn
        ];
        return json_encode($res);
    }
}

class E3OrderReturnAdd extends E3 implements E3Transport
{
    public $serviceType = 'order.return.add';
    public $order_sn = '19052972666713';
    public $return_ck_code = '11005016';
    public $return_kw_code = '000';
    public $return_type = 1;
    public $order_return_goods = [[
        'sku' => 'ABCHZK12B344WN39',
        'goods_number' => '1',
        'market_price' => '',
        'goods_price' => '',
        'discount' => ''
    ]];
    /**
     * 数据值
     * 
     * @return dict
     */
    public function toJson()
    {
        $res = [
            'sell_return_record' => [
                'order_sn' => $this->order_sn,
                'return_ck_code' => $this->return_ck_code,
                'return_kw_code' => $this->return_kw_code,
                'return_type' => $this->return_type,
                'order_return_goods' => $this->order_return_goods
            ]
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
            case 'E3OrderAdd':
                return new E3OrderAdd();
                break;
            case 'E3OrderReturnAdd':
                return new E3OrderReturnAdd();
                break;
        }
    }
}


interface E3Transport
{
    public function getBody();
}
