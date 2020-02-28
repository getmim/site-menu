<?php
/**
 * SiteMenu
 * @package site-menu
 * @version 0.0.1
 */

namespace SiteMenu\Library;

use SiteMenu\Model\SiteMenu as SMenu;

class SiteMenu
{
    private static $menus;
    private static $uri;
    private static $url;

    private static function prepare(): void{
        if(!is_null(self::$menus))
            return;

        self::$uri = \Mim::$app->req->path;
        self::$url = \Mim::$app->req->url;
        
        $menus = \Mim::$app->cache->get('site-menu') ?? [];
        if(!$menus){
            $db_menus = SMenu::get([]);
            foreach($db_menus as $menu){
                $menu->content = json_decode($menu->content);
                $menus[$menu->name] = $menu;
            }
            \Mim::$app->cache->add('site-menu', $menus, (60*60*24*7));
        }

        foreach($menus as &$menu)
            self::processMenus($menu->content);
        self::$menus = $menus;
    }

    private static function processMenus(array &$menus): void{
        foreach($menus as &$menu){
            $menu->active = false;
            if(!isset($menu->link))
                continue;
            $menu->active = $menu->link == self::$uri || $menu->link == self::$url;

            if(isset($menu->children))
                self::processMenus($menu->children);
        }
        unset($menu);
    }

    static function get(string $name): array{
        self::prepare();
        if(isset(self::$menus[$name]))
            return self::$menus[$name]->content;
        return [];
    }
}