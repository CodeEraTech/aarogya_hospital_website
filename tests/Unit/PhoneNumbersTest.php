<?php

namespace Tests\Unit;

use App\Support\PhoneNumbers;
use PHPUnit\Framework\TestCase;

class PhoneNumbersTest extends TestCase
{
    public function test_comma_separated_numbers_keep_their_own_dial_targets(): void
    {
        $this->assertSame([
            ['label' => '01662-245450', 'href' => 'tel:01662245450'],
            ['label' => '8222049007', 'href' => 'tel:8222049007'],
            ['label' => '8222049008', 'href' => 'tel:8222049008'],
        ], PhoneNumbers::parse('01662-245450, 8222049007, 8222049008'));
    }

    public function test_formatting_international_prefixes_and_duplicate_entries(): void
    {
        $this->assertSame([
            ['label' => '+91 (82220) 49007', 'href' => 'tel:+918222049007'],
            ['label' => '01662–245450', 'href' => 'tel:01662245450'],
        ], PhoneNumbers::parse(" , +91 (82220) 49007; +918222049007\n01662–245450,01662-245450, "));
    }

    public function test_missing_or_non_phone_content_never_produces_a_call_link(): void
    {
        $this->assertSame([], PhoneNumbers::parse(null));
        $this->assertSame([], PhoneNumbers::parse(' , ; '));
        $this->assertSame([], PhoneNumbers::parse('not configured, <script>123</script>'));
    }
}
