<?php

namespace Tests\Feature;

use Tests\TestCase;

class PublicPagesTest extends TestCase
{
    public function test_patient_information_pages_render(): void
    {
        $this->get('/patient-resources/empanelled-corporate')->assertOk()->assertSee('Insurance & Empanelment');
        $this->get('/patient-resources/opd-schedule')->assertOk()->assertSee('OPD Schedule');
        $this->get('/doctors')->assertOk()->assertSee('Doctors Who Listen');
        $this->get('/about')->assertOk()->assertSee('Dr. Amit Bhutani')->assertSee('Dr. Puja Bhutani');
        $this->get('/gallery')->assertOk()->assertSee('Aarogya Hospital Gallery');
    }

    public function test_homepage_links_to_the_standalone_patient_pages(): void
    {
        $this->get('/')
            ->assertSee(route('opd-schedule'))
            ->assertSee(route('gallery'))
            ->assertSee(route('empanelled-corporate'));
    }
}
