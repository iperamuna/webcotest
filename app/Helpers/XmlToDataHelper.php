<?php

declare(strict_types=1);

if (! function_exists('XmlToDataHelper')) {
    function XmlToDataHelper(string $xmlString): array
    {
        $xml = simplexml_load_string($xmlString);
        $formattedData = [];

        foreach ($xml->children() as $key => $value) {
            // Add space before capital letters (except the first letter)
            $formattedKey = preg_replace('/([a-z])([A-Z])/', '$1 $2', $key);

            // Store as key-value pair
            $formattedData[$formattedKey] = (string) $value;
        }

        return $formattedData;
    }
}
