<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'services' => $this->getServices(),
            'technologies' => $this->getTechnologies(),
        ]);
    }

    private function getServices(): array
    {
        return [
            [
                'icon' => '📋',
                'title' => 'Project Management & Organization',
                'description' => 'Professional project management with Scrum methodology, sprint planning, and requirements gathering to ensure successful delivery.',
                'features' => ['Scrum & Agile', 'Sprint Planning', 'Requirements Analysis', 'Team Coordination']
            ],
            [
                'icon' => '💻',
                'title' => 'Full-Stack Development',
                'description' => 'Expert development services covering both backend and frontend technologies with modern frameworks and best practices.',
                'features' => ['PHP & Symfony', 'JavaScript & TypeScript', 'Angular & React', 'RESTful APIs']
            ],
            [
                'icon' => '🗄️',
                'title' => 'Database Solutions',
                'description' => 'Robust database design and implementation with various database technologies tailored to your needs.',
                'features' => ['MySQL / MariaDB', 'PostgreSQL', 'Elasticsearch', 'Redis Cache']
            ],
            [
                'icon' => '🔄',
                'title' => 'Message Queue & Integration',
                'description' => 'Asynchronous processing and system integration using modern message queue technologies.',
                'features' => ['RabbitMQ', 'Event-Driven Architecture', 'Microservices', 'API Integration']
            ],
            [
                'icon' => '🎨',
                'title' => 'Modern UI/UX Design',
                'description' => 'Beautiful, responsive interfaces built with the latest frontend technologies and design principles.',
                'features' => ['Responsive Design', 'Bootstrap & Tailwind', 'Interactive Components', 'Accessibility']
            ],
            [
                'icon' => '☁️',
                'title' => 'DevOps & Cloud Hosting',
                'description' => 'Complete DevOps solutions from containerization to cloud deployment and orchestration.',
                'features' => ['Docker & Compose', 'Kubernetes', 'Cloud Platforms', 'CI/CD Pipelines']
            ],
        ];
    }

    private function getTechnologies(): array
    {
        return [
            'Backend' => [
                'PHP', 'Symfony', 'Doctrine ORM', 'PHPUnit', 'API Platform'
            ],
            'Frontend' => [
                'JavaScript', 'TypeScript', 'Angular', 'React', 'HTML5', 'CSS3'
            ],
            'Styling' => [
                'Tailwind CSS', 'Bootstrap', 'Sass', 'PostCSS'
            ],
            'Databases' => [
                'MySQL', 'MariaDB', 'PostgreSQL', 'Elasticsearch', 'Redis'
            ],
            'Message Queues' => [
                'RabbitMQ', 'Symfony Messenger'
            ],
            'DevOps & Tools' => [
                'Docker', 'Docker Compose', 'Kubernetes', 'Git', 'CI/CD'
            ],
            'Cloud & Hosting' => [
                'AWS', 'Azure', 'Google Cloud', 'DigitalOcean', 'Dedicated Servers'
            ],
            'Methodologies' => [
                'Scrum', 'Agile', 'TDD', 'Code Review', 'Best Practices'
            ],
        ];
    }
}
