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

class TestOrder extends TestCase
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
     * 创建订单.
     */
    public function testCreateOrShop()
    {
        $goods[] = [
            'goodCount' => '',
            'goodName' => '',
        ];

        $data = [
            'delivery_id' => '',
            'order_id' => '',
            'poi_seq' => '', // 美团的流水号加4为前缀
            'shop_id' => '',
            'delivery_service_code' => '',
            'receiver_name' => '',
            'receiver_address' => '',
            'receiver_phone' => '',
            'receiver_lng' => '',
            'receiver_lat' => '',
            'goods_value' => '',
            'goods_weight' => '',
            'goods_detail' => json_encode(['goods' => $goods]),
        ];
            // 1633772379321001463
        $result = $this->dispatch->order->createByShop($data);

        $this->assertArrayHasKey('data', $result);
    }

    /**
     * 取消订单.
     */
    public function testDelete()
    {
        $result = $this->dispatch->order->cancel([
            'mt_peisong_id' => '',
            'delivery_id' => '',
            'cancel_reason_id' => '',   // 取消原因类别，默认为接入方原因
            'cancel_reason' => '',  // 详细取消原因，最长不超过256个字符
        ]);

        $this->assertArrayHasKey('data', $result);
    }

    /**
     * 查询订单状态
     */
    public function testQueryStatus()
    {
        $result = $this->dispatch->order->statusQuery([
            'mt_peisong_id' => '',
            'delivery_id' => '',
        ]);


        $this->assertArrayHasKey('data', $result);
    }

    /**
     * 预下单
     */
    public function testPreCreateByShop()
    {
        $goods[] = [
            'goodCount' => '',
            'goodName' => '',
        ];

        $data = [
            'delivery_id' => '',
            'order_id' => '',
            'poi_seq' => '', // 美团的流水号加4为前缀
            'shop_id' => '',
            'delivery_service_code' => '',
            'receiver_name' => '',
            'receiver_address' => '中国',
            'receiver_phone' => '',
            'receiver_lng' => '',
            'receiver_lat' => '',
            'goods_value' => '',
            'goods_weight' => '',
            'goods_detail' => json_encode(['goods' => $goods]),
            'pay_type_code' => '',
        ];

        $result = $this->dispatch->order->preCreateByShop($data);

        $this->assertArrayHasKey('data', $result);
    }

    /**
     * 获取配送码
     */
    public function testCreateDeliveryCode()
    {
        $result = $this->dispatch->order->createDeliveryCode([
            'shop_id' => '',
            'order_id' => '',
        ]);

        $this->assertArrayHasKey('data', $result);
    }

    /**
     * 评价骑手.
     */
    public function testEvaluate()
    {
        $result = $this->dispatch->order->evaluate([
            'mt_peisong_id' => '',
            'delivery_id' => '',
            'score' => '', // 评分（5分制）
            'comment_content' => '', // 评论内容（评论的字符长度需小于1024）
        ]);

        $this->assertArrayHasKey('data', $result);
    }

    /**
     * 配送能力校验.
     */
    public function testCheck()
    {
        $result = $this->dispatch->order->orderCheck([
            'shop_id' => '',
            'delivery_service_code' => '',  // 配送服务代码
            'receiver_address' => '', // 收件人地址，最长不超过 512 个字符
            'receiver_lng' => '', // 收件人经度
            'receiver_lat' => '',  // 收件人纬度
            'coordinate_type' => '',    // 坐标类型
            'check_type' => '', // 预留字段，方便以后扩充校验规则，check_type = 1
            'mock_order_time' => time(),    // 模拟发单时间，时区为 GMT+8，当前距离 Epoch（1970年1月1日) 以秒计算的时间
        ]);

        $this->assertArrayHasKey('data', $result);
    }

    /**
     * 获取骑手当前位置.
     */
    public function testLocation()
    {
        $result = $this->dispatch->order->location([
            'delivery_id' => '',
            'mt_peisong_id' => '', // 美团配送内部订单 id
        ]);

        $this->assertArrayHasKey('data', $result);
    }

    /**
     * 模拟接单
     */
    public function testArrange()
    {
        $result = $this->dispatch->test->testArrange([
            'delivery_id' => '',
            'mt_peisong_id' => '',  // 美团配送内部订单 id
        ]);

        $this->assertTrue(true);
    }

    /**
     * 模拟取货
     */
    public function testPickup()
    {
        $result = $this->dispatch->test->testPickup([
            'delivery_id' =>'',
            'mt_peisong_id' => '',  // 美团配送内部订单 id
        ]);

        $this->assertTrue(true);
    }

    /**
     * 模拟送达
     */
    public function testDeliver()
    {
        $result = $this->dispatch->test->testDeliver([
            'delivery_id' => '',
            'mt_peisong_id' => '',  // 美团配送内部订单 id
        ]);

        $this->assertTrue(true);
    }

    /**
     * 模拟改派
     */
    public function testRearrange()
    {
        $result = $this->dispatch->test->testRearrange([
            'delivery_id' => '',
            'mt_peisong_id' => '',  // 美团配送内部订单 id
        ]);

        $this->assertArrayHasKey('data', $result);
    }

    /**
     * 模拟上传异常
     */
    public function testReportException()
    {
        $result = $this->dispatch->test->testReportException([
            'delivery_id' => '',
            'mt_peisong_id' => '',  // 美团配送内部订单 id
        ]);

        $this->assertArrayHasKey('data', $result);
    }

}
