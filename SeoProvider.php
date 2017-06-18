<?php

namespace Cmi\Seo;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class SeoProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        $seoProvider = new SeoMeta();
//        $seoProvider->setTitle();
//        $seoProvider->setDescription();
//        $seoProvider->setKeywords();

        $app['seo.meta'] = $seoProvider;

        if (isset($app['twig'])) {
            $app->extend('twig', function ($twig, $app) {
                $twig->addGlobal('seo', $app['seo.meta']);

                return $twig;
            });
        }
    }
}