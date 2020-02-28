<?php
/**
 * Event
 * @package site-menu
 * @version 0.1.0
 */

namespace SiteMenu\Library;


class Event
{
    static function clear(object $menu): void{
        \Mim::$app->cache->remove('site-menu');
    }
}