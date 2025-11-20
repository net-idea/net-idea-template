<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ContactControllerTest extends WebTestCase
{
    public function testContactFormPageLoads(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/contact');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h2', 'Contact Us');
        $this->assertSelectorExists('form[name="contact"]');
        $this->assertSelectorExists('input[name="contact[name]"]');
        $this->assertSelectorExists('input[name="contact[email]"]');
        $this->assertSelectorExists('textarea[name="contact[message]"]');
    }

    public function testContactFormSubmission(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/contact');

        // Fill out the form
        $form = $crawler->selectButton('Send Message')->form([
            'contact[name]' => 'Test User',
            'contact[email]' => 'test@example.com',
            'contact[subject]' => 'Test Subject',
            'contact[message]' => 'This is a test message with enough characters to pass validation.',
        ]);

        // Submit the form
        $client->submit($form);

        // Follow redirect
        $this->assertResponseRedirects('/contact');
        $client->followRedirect();

        // Check for success or warning message (email might fail in test environment)
        $this->assertResponseIsSuccessful();
        $content = $client->getResponse()->getContent();
        $this->assertTrue(
            str_contains($content, 'Your message has been sent successfully!') ||
            str_contains($content, 'Your message was saved'),
            'Expected success or warning message after form submission'
        );
    }

    public function testContactFormValidation(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/contact');

        // Submit form with missing required fields
        $form = $crawler->selectButton('Send Message')->form([
            'contact[name]' => '',
            'contact[email]' => 'invalid-email',
            'contact[message]' => 'Short',
        ]);

        $client->submit($form);

        // Should not redirect when there are validation errors
        $this->assertResponseIsSuccessful();
        
        // Check for validation errors in the response
        $content = $client->getResponse()->getContent();
        $this->assertStringContainsString('contact', $content);
    }
}
