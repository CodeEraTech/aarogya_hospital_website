<?php

namespace Tests\Feature;

use App\Models\Doctor;
use App\Models\Setting;
use Tests\Support\PublicPhoneDatabase;
use Tests\TestCase;

class SitePhoneLinksTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        PublicPhoneDatabase::create();
    }

    private function savePhone(?string $value): void
    {
        Setting::updateOrCreate(['key' => 'site_phone'], ['value' => $value, 'group' => 'Contact']);
        Setting::updateOrCreate(['key' => 'whatsapp_number'], ['value' => '918222049007', 'group' => 'Contact']);
    }

    public function test_every_phone_section_links_each_saved_number_separately(): void
    {
        $this->savePhone('01662-245450, 8222049007, 8222049008');
        $doctor = Doctor::create(['name' => 'Dr. Phone Example', 'slug' => 'phone-example', 'designation' => 'Consultant', 'status' => 'Active']);
        $expected = ['tel:01662245450', 'tel:8222049007', 'tel:8222049008'];

        foreach (['/', '/contact', '/patient-resources/feedback', '/patient-resources/opd-schedule', '/doctors/'.$doctor->slug] as $url) {
            $response = $this->get($url)->assertOk();
            $document = new \DOMDocument();
            @$document->loadHTML($response->getContent());
            $xpath = new \DOMXPath($document);

            foreach (['//main', '//footer[@id="contact"]', '//details[@data-phone-menu]'] as $section) {
                $nodes = $xpath->query($section.'//a[starts-with(@href, "tel:")]');
                $targets = array_map(fn ($node) => $node->getAttribute('href'), iterator_to_array($nodes));
                $this->assertSame($expected, $targets, $url.' '.$section);
            }
        }
    }

    public function test_single_and_empty_settings_do_not_create_a_chooser_or_broken_links(): void
    {
        $this->savePhone('+91 82220 49007');
        $this->get('/contact')->assertOk()->assertSee('href="tel:+918222049007"', false)->assertDontSee('data-phone-menu', false);

        $this->savePhone(null);
        $this->get('/contact')->assertOk()->assertDontSee('href="tel:', false)->assertDontSee('data-phone-menu', false);
    }

    public function test_footer_data_has_separate_dial_targets_for_multiple_numbers(): void
    {
        $this->savePhone('01662-245450, 8222049007, 8222049008');
        $this->getJson('/site-footer')->assertOk()
            ->assertJsonPath('phone', '01662-245450')
            ->assertJsonCount(3, 'phones')
            ->assertJsonPath('phones.1.href', 'tel:8222049007');
    }
}
