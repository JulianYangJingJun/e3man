<?php
require_once './vendor/autoload.php'; // 加载自动加载文件

// use e3man\E3stock;
// $a = new E3stock;

// echo $a->test();

use e3man\E3Factory;


// $s = E3Factory::factory('E3stock');
// $s->sku = 'VSC83141S61146';
// $s->wareHouseCode = '11003005';
// echo $s->getBody();


// $n = E3Factory::factory('E3OrderGet');
// $n->sd_code = '005';
// $n->orderSn = '19052872665939';
// echo $n->getBody();


// $c = E3Factory::factory('E3OrderCancel');
// $c->deal_code = '222';
// $c->ly_type = '111';
// echo $c->getBody();


// $b = E3Factory::factory('E3OrderAdd');
// $b->deal_code = 'elite-55555-I57A8Y';
// $b->items = [[
//     'deal_code'   => '55555-I57A8Y',
//     'shop_price'  => 10.00,
//     'goods_number' => 1,
//     'goods_price' => 10.00,
//     'sku'         => 'BBU93012U30052',
//     'order_sn'    => '55555-I57A8Y'
// ], [
//     'deal_code'   => '55555-I57A8Y',
//     'shop_price'  => 10.00,
//     'goods_number' => 1,
//     'goods_price' => 10.00,
//     'sku'         => 'BSV93001U20054',
//     'order_sn'    => '55555-I57A8Y'
// ]];
// echo $b->getBody();

// $a = E3Factory::factory('E3OrderReturnAdd');
// echo $a->getBody();
