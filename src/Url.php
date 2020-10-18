<?php

namespace TH\UrlModify;

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

        // Parse the path
        if (strpos($url, '?') !== false) {
            list($path, $queryString) = explode('?', $url, 2);
            parse_str($queryString, $queryParams);
        }

        // Replace existing keys
        $queryParams = array_replace($queryParams, $params);

        // Remove any keys with null values
        $queryParams = array_filter($queryParams, function ($v) { return isset($v); });

        // Return the built url
        return $path . ($queryParams ? '?' . http_build_query($queryParams, '', '&', PHP_QUERY_RFC3986) : '');
    }
}
