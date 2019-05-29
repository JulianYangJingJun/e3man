<?php
namespace e3man;

use GuzzleHttp\Client;
/*
 * Copyright (c) 2019 Julian Yang
 * 
 */

define('E3_QYERY_URL', "http://121.41.163.189/e3test/webopm/web/?app_act=api/ec&app_mode=func");
define('E3_APP_KEY', "BAISON_E3_BSWMS");
define('E3_APP_SECRET', "770e253089a257a8070f984d5505aee2");
define('E3_WARE_HOUSE', " 11003005");

class E3
{
    /**
     * 方法名
     */
    public $serviceType;
    /**
     * 店铺代码
     */
    public $sd_code = '006';

    /**
     * 测试
     *
     * @return void
     */
    public function getBody()
    {
        $body = $this->request2QueryString();
        $client = new Client(
            ['timeout' => 5.0]
        );
        $response = $client->request('POST', E3_QYERY_URL, [
            'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded',
            ],
            'body' => $body
        ]);
        return $response->getBody();
    }

    /**
     * 生成签名
     *
     * @return strint
     */
    public function generateSign()
    {
        return md5($this->generateSpliceString());
    }
    /**
     * 签名数据
     *
     * @return strint
     */
    public function generateSpliceString()
    {
        $res = "key=" . E3_APP_KEY . "&requestTime=" . $this->generateNowTime() .
            "&secret=" . E3_APP_SECRET . "&version=0.1&serviceType=" . $this->serviceType .
            "&data=" . $this->toJson();
        return $res;
    }
    /**
     * 迭代数据传输值
     *
     * @return string
     */
    public function request2QueryString()
    {
        $res = $this->generateSpliceString() . "&sign=" . $this->generateSign();
        return $res;
    }
    /**
     * 生成当前时间
     *
     * @return string
     */
    public function generateNowTime()
    {
        return date('YmdHis', strtotime('-1 Minute', time()));
    }

    /**
     * 构建查询时间
     * 
     * @return []
     */
    public function generateFilterTime()
    {
        $NowTime = date('Y:m:d H:i:s', time());
        $startModified = date("Y-m-d H:i:s", strtotime("-10 Years", strtotime($NowTime)));
        $endModified = date("Y-m-d H:i:s", strtotime("+10 Years", strtotime($NowTime)));
        return [$startModified, $endModified];
    }

    /**
     * 数据值
     * 
     * @return dict
     */
    public function toJson()
    {
        return null;
    }
    /**
     * 数据值
     * 
     * @return xml
     */
    public function toXml()
    {
        return null;
    }
}
