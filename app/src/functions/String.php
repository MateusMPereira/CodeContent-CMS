<?php

function removeChar($inputString, $charToRemove)
{
    $outputString = str_replace($charToRemove, '', $inputString);
    return $outputString;
}

function removeEndingChar(string $String)
{
    if (!empty($String)) {
        return substr($String, 0, -1);
    }
    return $String;
}

function removeStartingChar(string $String)
{
    if (!empty($String)) {
        return substr($String, 1);
    }
    return $String;
}

function matchRoute(string $route, string $incomingRoute)
{
    $normalizedRoute         = trim($route, '/');
    $normalizedIncomingRoute = trim($incomingRoute, '/');

    return $normalizedRoute === $normalizedIncomingRoute;
}
