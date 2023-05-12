<?php

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;

/**
 * Return a Carbon instance.
 */
function carbon(string $parseString = '', string $tz = null): Carbon
{
    return new Carbon($parseString, $tz);
}

/**
 * Return a formatted Carbon date.
 */
function humanize_date($date = null, string $format = null): string
{
    if (App::getLocale() == 'fa') {
        if ($format)
            return verta()->formatWord('l dS F');
        else
            return verta($date)->formatDifference();
    } else {
        return $date->format($format);
    }
}
