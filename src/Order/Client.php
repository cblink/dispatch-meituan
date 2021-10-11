<?php

/*
 * This file is part of the cblinkservice//meituan-dispatch-service.
 *
 * (c) jinjun <757258777@qq.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Cblink\DispatchMeituan\Order;


use Cblink\DispatchMeituan\Kernel\BaseClient;

class Client extends BaseClient
{
    /**
     * 创建门店关联订单.
     *
     * @see https://peisong.meituan.com/open/api/order/create-shop
     *
     * @param array $payload
     * @return array
     */
    public function createByShop(array $payload = [])
    {
        return $this->sendRequest('post', 'order/createByShop', $payload);
    }

    /**
     * 取消订单.
     *
     * @see https://peisong.meituan.com/open/api/order/destroy
     * @param array $payload
     * @return array
     */
    public function cancel(array $payload = [])
    {
        return $this->sendRequest('post', 'order/delete', $payload);
    }

    /**
     * 查询订单状态
     *
     * @see https://peisong.meituan.com/open/api/order/status/query
     * @param array $payload
     * @return array
     */
    public function statusQuery(array $payload = [])
    {
        return $this->sendRequest('post', 'order/status/query', $payload);
    }

    /**
     * 预发单接口
     *
     * @see https://peisong.meituan.com/open/api/order/preCreateByShop
     * @param array $payload
     * @return array
     */
    public function preCreateByShop(array $payload = [])
    {
        return $this->sendRequest('post', 'order/preCreateByShop', $payload);
    }

    /**
     * 获取配送码
     *
     * @see https://peisong.meituan.com/open/api/order/createDeliveryCode
     * @param array $payload
     * @return array
     */
    public function createDeliveryCode(array $payload = [])
    {
        return $this->sendRequest('post', 'order/createDeliveryCode', $payload);
    }

    /**
     * 评价骑手
     *
     * @see https://peisong.meituan.com/open/api/order/evaluate
     * @param array $payload
     * @return array
     */
    public function evaluate(array $payload = [])
    {
        return $this->sendRequest('post', 'order/evaluate', $payload);
    }

    /**
     * 订单配送校验
     *
     * @see https://peisong.meituan.com/open/api/order/check
     * @param array $payload
     * @return array
     */
    public function orderCheck(array $payload = [])
    {
        return $this->sendRequest('post', 'order/check', $payload);
    }

    /**
     * 骑手位置
     *
     * @see https://peisong.meituan.com/open/api/order/location
     * @param array $payload
     * @return array
     */
    public function location(array $payload = [])
    {
        return $this->sendRequest('post', 'order/rider/location', $payload);
    }

    /**
     * 骑手位置H5
     *
     * @see https://peisong.meituan.com/open/api/order/rider/location/h5url
     * @param array $payload
     * @return array
     */
    public function riderLocation(array $payload = [])
    {
        return $this->sendRequest('post', 'order/rider/location/h5url', $payload);
    }

    /**
     * 增加小费接口
     *
     * @see https://peisong.meituan.com/open/api/order/addTip
     * @param array $payload
     * @return array
     */
    public function orderAddTip(array $payload = [])
    {
        return $this->sendRequest('post', 'order/addTip', $payload);
    }
}
