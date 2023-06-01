<?php

if (!function_exists('activeClass')) {
    /**
     * Return active class if current route is equal to given route
     * 
     * @param array $classes
     * @param string $class
     * @return string
     */
    function activeClass($routes = [], $class = 'active', $queries = [])
    {
        if (is_string($routes)) {
            $routes = [$routes];
        }

        foreach ($routes as $key => $value) {
            if (request()->routeIs($value)) {
                // If current route is equal to given route, return active class
                return $class;
            }
        }

        if (count($queries) > 0) {
            foreach ($queries as $key => $value) {
                if (request()->query($key) == $value) {
                    return $class;
                }
            }
        }
    }
}

if (!function_exists('getAvatar')) {
    /**
     * Return avatar url
     * 
     * Get avatar from https://ui-avatars.com/ by name
     * 
     * @param string $name
     * @return string
     */
    function getAvatar($name = ''): string
    {
        $name = trim($name);
        $name = str_replace(' ', '+', $name);
        $url = "https://ui-avatars.com/api/?name=$name&size=256&background=0D8ABC&color=fff";

        return $url;
    }
}