<?php

/*
 * This file is part of the cblink/dispatch-meituan.
 *
 * (c) jinjun <757258777@qq.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Cblink\DispatchMeituan\Tests;

use Cblink\DispatchMeituan\DispatchMeituan;
use PHPUnit\Framework\TestCase;

class TestShop extends TestCase
{
    protected $dispatch;

    protected function setUp(): void
    {
        parent::setUp();

        $config = require 'testConfig.php';
        $appKey = $config['app_key'];
        $secret = $config['secret'];

        $this->dispatch = new DispatchMeituan([
            'appKey' => $appKey,
            'secret' => $secret,
            'debug' => false, ]
        );
    }

    /**
     * 测试门店配送范围
     */
    public function testAreaQuery()
    {
        $result = $this->dispatch->shop->areaQuery([
            'delivery_service_code' => '',
            'shop_id' => '',  // 美团配送内部订单 id
        ]);

        $this->assertArrayHasKey('data', $result);
    }

    /**
     * 门店信息
     */
    public function testQuery()
    {
        $result = $this->dispatch->shop->queryShop([
            'shop_id' => '',  // 美团配送内部订单 id
        ]);

        $this->assertArrayHasKey('data', $result);
    }

    /**
     * 创建门店
     */
    public function testCreate()
    {
        $businessHours = json_encode([["beginTime"=>"00:00","endTime"=>"24:00"]]);
        $data = [
            'shop_id' => '',
            'shop_name' => '',
            'category' => '',
            'second_category' => '',
            'contact_name' => '',
            'contact_phone' => '',
            'shop_address' => '',
            'shop_lng' => '',
            'shop_lat' => '',
            'coordinate_type' => '',
            'delivery_service_codes' => '',
            'business_hours' => $businessHours,
        ];

        $result = $this->dispatch->shop->createShop($data);

        $this->assertArrayHasKey('data', $result);
    }

}
