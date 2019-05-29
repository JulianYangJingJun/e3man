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

class E3OrderGet extends E3 implements E3Transport
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

class E3OrderCancel extends E3 implements E3Transport
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

class E3OrderAdd extends E3 implements E3Transport
{
    public $serviceType = 'order.add';
    // public $add_time = '2019-01-01 11:11:11'; //添加时间
    // public $sd_code = '006'; // 店铺代码
    // public $order_status = 0; // 订单状态(0,未确认;1,已确认;2,已取消;3,无效;4,退货;5,锁定;6,解锁;7,完成;8,拒收;9,已合并;10,已拆分;)
    // public $pay_status = 0; // 付款状态(0,未付款;1,付款中 2,已付款;3,已结算)
    // public $consignee = '李嘉霖'; // 收货人
    // public $province_name = '浙江省'; // 省
    // public $city_name = '杭州市'; // 市
    // public $district_name = '西湖区'; //
    // public $address = '江城路'; // 详细地址
    // public $user_name = 'snaqktvtkd'; // 会员名
    // public $email = 'snaqktvtkd@21cn.com'; // 电子邮件
    // public $mobile = '13858787110'; // 手机号码
    // public $tel = null; // 电话号码
    // public $zipcode = '325805'; // 邮政编码
    // public $pos_code = null; // O2O 门店代码
    // public $saleShopCode = null; // 下单门店代码
    // public $salerEmployeeNo = null; // 下单店员编号
    // public $pay_code = 'alipay'; // 支付方式代码
    // public $vip_no = '123231'; // 会员编号
    // public $shipping_code = 'EMS'; // 快递公司代码
    // public $shipping_fee = '12'; // 运费
    // public $order_amount = 100; // 买家应付金额
    // // item
    // public $sku_sn  = 'test10010001001'; // Sku String 64
    // public $market_price  = 1000; // 商品单价(折前) String 64
    // public $goods_price  = 100; // 商品单价(折后) String 64
    // public $discount  = 1; // 折扣 String 64
    // public $goods_number  = 1; // 数量 Int 11
    // public $is_gift  = 0; // 是否礼品 Int 11

    /**
     * 数据值
     * 
     * @return dict
     */
    public function toJson()
    {
        $res = [
            'total' => '580',
            'data' => [
                'line' => '1',
                'add_time' => '2019-05-22 16:11:39',
                'order_sn' => 'Julian_test_92929292110121212',
                'sd_code' => '006',
                'order_status' => 2,
                'pay_status' => 1,
                'consignee' => '李嘉霖',
                'province_name' => '浙江省',
                'city_name' => '杭州市',
                'district_name' => '西湖区',
                'address' => '江城路',
                'user_name' => '5053407',
                'email' => 'xxxx@gmail.com',
                'mobile' => '13010101010',
                'tel' => '057788888888',
                'zipcode' => '325805',
                'pos_code' => '1',
                'saleShopCode' => '',
                'salerEmployeeNo' => '',
                'pay_code' => 'alipay',
                'vip_no' => '123231',
                'shipping_code' => 'EMS',
                'shipping_fee' => '12',
                'order_amount' => '122',
                'items' => [
                    'sku_sn' => 'ABSZH03CH06NV46',
                    'market_price' => '3599.00',
                    'goods_price' => '3599.00',
                    'discount' => '0',
                    'goods_number' => '1',
                    'is_gift' => '0',
                ]
            ],
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
        }
    }
}


interface E3Transport
{
    public function getBody();
}
