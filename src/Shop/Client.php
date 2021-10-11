<?php

/*
 * This file is part of the cblink/dispatch-meituan.
 *
 * (c) jinjun <757258777@qq.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Cblink\DispatchMeituan\Shop;

use Cblink\DispatchMeituan\Kernel\BaseClient;

class Client extends BaseClient
{
    /**
     * 创建门店.
     *
     * @see https://peisong.meituan.com/open/api/shop/create
     * @param array $payload
     * @return array
     */
    public function createShop(array $payload = [])
    {
        return $this->sendRequest('post', 'shop/create', $payload);
    }

    /**
     * 门店修改.
     *
     * @see https://peisong.meituan.com/open/api/shop/update
     * @param array $payload
     * @return array
     */
    public function updateShop(array $payload = [])
    {
        return $this->sendRequest('post', 'shop/update', $payload);
    }

    /**
     * 查询门店信息.
     *
     * @see https://peisong.meituan.com/open/api/shop/query
     * @param array $payload
     * @return array
     */
    public function queryShop(array $payload = [])
    {
        return $this->sendRequest('post', 'shop/query', $payload);
    }

    /**
     * 查询门店配送范围.
     *
     * @see https://peisong.meituan.com/open/api/shop/area/query
     * @param array $payload
     * @return array
     */
    public function areaQuery(array $payload = [])
    {
        return $this->sendRequest('post', 'shop/area/query', $payload);
    }
}
