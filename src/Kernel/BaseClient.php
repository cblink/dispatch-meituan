<?php

/*
 * This file is part of the cblink/dispatch-meituan.
 *
 * (c) jinjun <757258777@qq.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Cblink\DispatchMeituan\Kernel;

use Cblink\DispatchMeituan\Kernel\Traits\HasHttpRequest;

/**
 * Class BaseClient.
 */
class BaseClient
{
    use HasHttpRequest;

    /**
     * @var ServiceContainer
     */
    protected $app;

    /**
     * BaseClient constructor.
     * @param ServiceContainer $app
     */
    public function __construct(ServiceContainer $app)
    {
        $this->app = $app;
    }

    /**
     * 发送请求
     *
     * @param $method
     * @param $uri
     * @param array $data
     *
     * @return mixed
     */
    public function sendRequest($method, $uri, $data = [])
    {
        $data = array_merge($data, [
            'appkey' => $this->app->config('appKey'),
            'timestamp' => time(),
            'version' => '1.0',
        ]);

        $data['sign'] = $this->getSign($data);

        return $this->$method($this->url($uri), $data);
    }

    /**
     * url
     *
     * @param string $uri
     * @return string
     */
    protected function url($uri = ''): string
    {
        return rtrim($this->app->baseUrl(), '/').'/'.ltrim($uri, '/');
    }

    /**
     * 设置获取签名
     *
     * @param $params
     *
     * @return string
     */
    protected function getSign($params)
    {
        ksort($params);

        $waitSign = '';
        foreach ($params as $key => $item) {
            if ($item || $item === 0) {
                $waitSign .= $key.$item;
            }
        }

        return strtolower(sha1($this->app->config('secret').$waitSign));
    }
}
