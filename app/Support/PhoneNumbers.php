<?php

namespace App\Support;

final class PhoneNumbers
{
    /** @return list<array{label: string, href: string}> */
    public static function parse(?string $value): array
    {
        $phones = [];
        // Split before normalizing so separate numbers can never be joined.
        foreach (preg_split('/[,;\r\n]+/u', $value ?? '', -1, PREG_SPLIT_NO_EMPTY) ?: [] as $part) {
            $label = trim($part);
            $digits = preg_replace('/[^0-9]/', '', $label);
            if ($digits === '' || preg_match('/[^0-9\s+().\-\x{2010}-\x{2015}\x{2212}]/u', $label)) {
                continue;
            }

            $number = (str_starts_with($label, '+') ? '+' : '').$digits;
            $phones[$number] ??= ['label' => $label, 'href' => 'tel:'.$number];
        }

        return array_values($phones);
    }
}
