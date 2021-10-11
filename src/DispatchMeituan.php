<?php

/*
 * This file is part of the cblink/dispatch-meituan.
 *
 * (c) jinjun <757258777@qq.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Cblink\DispatchMeituan;

use Cblink\DispatchMeituan\Kernel\ServiceContainer;

/**
 * Class DispatchMeituan.
 *
 * @property Order\Client $order
 * @property Shop\Client $shop
 * @property Test\Client $test
 */
class DispatchMeituan extends ServiceContainer
{
    /**
     * @var string
     */
    protected $base_url = 'https://peisongopen.meituan.com/api/';

    /**
     * {@inheritdoc}
     */
    protected function getCustomProviders(): array
    {
        return [
            Order\ServiceProvider::class,
            Shop\ServiceProvider::class,
            Test\ServiceProvider::class,
        ];
    }
}
