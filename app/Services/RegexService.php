<?php

namespace App\Services;


class RegexService {

    const REGEX_LATITUDE  = '/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/';
    const REGEX_LONGITUDE = '/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/';

    const REGEX_ALPHA_SPACES = '/^[\pL\s]+$/u';

    const REGEX_EMAIL = '/<[A-Za-z0-9_\+-]+(\.[A-Za-z0-9_\+-]+)*@[A-Za-z0-9-]+(\.[A-Za-z0-9-]+)*\.([A-Za-z]{2,4})>/';
    const REGEX_LINK  = '#\bhttps?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#';
}