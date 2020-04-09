<?php

namespace TH\Url;

class Url
{
    /**
     * @param string $url
     * @param array $params
     * @return string
     */
    public static function modifyQuery(string $url, array $params): string
    {
        $path = $url;
        $queryParams = [];
        if (strpos($url, '?') !== false) {
            list($path, $queryString) = explode('?', $url, 2);
            parse_str($queryString, $queryParams);
        }

        // Replace existing keys
        $queryParams = array_replace($queryParams, $params);

        // Remove any keys with null values
        $queryParams = array_filter($queryParams, function ($v) {
            return isset($v);
        });

        // Build the query string like http_build_str would
        $query = [];
        foreach ($queryParams as $k => $v) {
            $query[] = rawurlencode($k) . '=' . rawurlencode($v);
        }

        return $path . ($query ? '?' . implode('&', $query) : '');
    }
}