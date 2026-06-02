<?php

namespace App\Services;

use App\Models\Blog;
use App\Models\Service;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class SiteMapService
{
    public static function generate()
    {
        $locales = array_keys(config('laravellocalization.supportedLocales'));
        $sitemap = Sitemap::create();

        $staticRoutes = [
            'front.home'           => ['changeFreq' => Url::CHANGE_FREQUENCY_WEEKLY,  'priority' => 1.0],
            'front.about'          => ['changeFreq' => Url::CHANGE_FREQUENCY_MONTHLY, 'priority' => 0.8],
            'front.services.index' => ['changeFreq' => Url::CHANGE_FREQUENCY_WEEKLY,  'priority' => 0.9],
            'front.contact.index' => ['changeFreq' => Url::CHANGE_FREQUENCY_MONTHLY, 'priority' => 0.7],
            'front.blogs.index'    => ['changeFreq' => Url::CHANGE_FREQUENCY_DAILY,   'priority' => 0.9],
        ];

        foreach ($staticRoutes as $routeName => $meta) {
            foreach ($locales as $locale) {
                $url = Url::create(self::localizedRoute($routeName, [], $locale))
                    ->setChangeFrequency($meta['changeFreq'])
                    ->setPriority($meta['priority']);

                foreach ($locales as $altLocale) {
                    $url->addAlternate(self::localizedRoute($routeName, [], $altLocale), $altLocale);
                }

                $sitemap->add($url);
            }
        }

        Blog::chunk(100, function ($blogs) use (&$sitemap, $locales) {
            foreach ($blogs as $blog) {
                foreach ($locales as $locale) {
                    $url = Url::create(self::localizedRoute('front.blogs.show', [$blog->slug], $locale))
                        ->setLastModificationDate($blog->updated_at)
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                        ->setPriority(0.7);

                    foreach ($locales as $altLocale) {
                        $url->addAlternate(self::localizedRoute('front.blogs.show', [$blog->slug], $altLocale), $altLocale);
                    }

                    $sitemap->add($url);
                }
            }
        });

        Service::chunk(100, function ($services) use (&$sitemap, $locales) {
            foreach ($services as $service) {
                foreach ($locales as $locale) {
                    $url = Url::create(self::localizedRoute('front.services.show', [$service->slug], $locale))
                        ->setLastModificationDate($service->updated_at)
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                        ->setPriority(0.8);

                    foreach ($locales as $altLocale) {
                        $url->addAlternate(self::localizedRoute('front.services.show', [$service->slug], $altLocale), $altLocale);
                    }

                    $sitemap->add($url);
                }
            }
        });

        $sitemap->writeToFile(public_path('sitemap.xml'));
    }

    private static function localizedRoute(string $routeName, array $params = [], string $locale = 'en'): string
    {
        $baseUrl = config('app.url');
        $path = match ($routeName) {
            'front.home'           => "/{$locale}",
            'front.about'          => "/{$locale}/about",
            'front.services.index' => "/{$locale}/services",
            'front.services.show'  => "/{$locale}/services/" . ($params[0] ?? ''),
            'front.contact.index' => "/{$locale}/contact",
            'front.blogs.index'    => "/{$locale}/blogs",
            'front.blogs.show'     => "/{$locale}/blogs/" . ($params[0] ?? ''),
            default                => "/{$locale}",
        };

        return rtrim($baseUrl, '/') . $path;
    }
}
