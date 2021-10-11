<?php

/*
 * This file is part of the cblink/dispatch-meituan.
 *
 * (c) jinjun <757258777@qq.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Cblink\DispatchMeituan\Test;

use Cblink\DispatchMeituan\Kernel\BaseClient;

class Client extends BaseClient
{
    /**
     * 模拟接单.
     *
     * @see https://peisong.meituan.com/open/api/test/order/arrange
     * @param array $payload
     * @return array
     */
    public function testArrange(array $payload = [])
    {
        return $this->sendRequest('post','test/order/arrange', $payload);
    }

    /**
     * 模拟取货
     *
     * @see https://peisong.meituan.com/open/api/test/order/pickup
     * @param array $payload
     * @return array
     */
    public function testPickup(array $payload = [])
    {
        return $this->sendRequest('post','test/order/pickup', $payload);
    }

    /**
     * 模拟改派.
     *
     * @see https://peisong.meituan.com/open/api/test/order/rearrange
     * @param array $payload
     * @return array
     */
    public function testRearrange(array $payload = [])
    {
        return $this->sendRequest('post','test/order/rearrange', $payload);
    }

    /**
     * 模拟送达.
     *
     * @see https://peisong.meituan.com/open/api/test/order/deliver
     * @param array $payload
     * @return array
     */
    public function testDeliver(array $payload = [])
    {
        return $this->sendRequest('post','test/order/deliver', $payload);
    }

    /**
     * 模拟上传异常.
     *
     * @see https://peisong.meituan.com/open/api/test/order/reportException
     * @param array $payload
     * @return array
     */
    public function testReportException(array $payload = [])
    {
        return $this->sendRequest('post','test/order/reportException', $payload);
    }
}
