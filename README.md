# net-idea Web Agency Website

Modern, professional website template for net-idea web agency built with **Symfony 6.4**, **Webpack Encore**, and **Tailwind CSS**.

## 🚀 Features

- **Modern Design**: Clean, responsive design inspired by Forma Modern Digital Agency template
- **Full Technology Stack Showcase**: Displays comprehensive portfolio of technologies and services
- **Built with Best Practices**: 
  - Symfony 6.4 framework
  - Webpack Encore for asset management
  - Tailwind CSS for modern styling
  - Responsive mobile-first design
  - SEO-friendly structure

## 📋 Services Highlighted

The website showcases net-idea's comprehensive service portfolio:

- **Project Management & Organization**: Scrum, Agile, sprint planning, requirements gathering
- **Full-Stack Development**: PHP, Symfony, JavaScript, TypeScript, Angular, React
- **Database Solutions**: MySQL, MariaDB, PostgreSQL, Elasticsearch, Redis
- **Message Queue & Integration**: RabbitMQ, event-driven architecture, microservices
- **Modern UI/UX Design**: Bootstrap, Tailwind, responsive design
- **DevOps & Cloud**: Docker, Kubernetes, CI/CD, cloud platforms

## 🛠️ Technology Stack

### Backend
- PHP 8.1+
- Symfony 6.4
- Doctrine ORM
- Twig templating

### Frontend
- Webpack Encore
- Tailwind CSS 3.3
- PostCSS
- JavaScript ES6+

### Development Tools
- Composer for PHP dependencies
- npm for JavaScript dependencies

## 📦 Installation

### Prerequisites

- PHP 8.1 or higher
- Composer
- Node.js 16+ and npm

### Setup Steps

1. **Clone the repository**
   ```bash
   git clone https://github.com/net-idea/net-idea-template.git
   cd net-idea-template
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install JavaScript dependencies**
   ```bash
   npm install
   ```

4. **Build assets**
   ```bash
   npm run build
   ```
   
   For development with watch mode:
   ```bash
   npm run watch
   ```

5. **Start the development server**
   ```bash
   php -S localhost:8000 -t public/
   ```
   
   Or use Symfony CLI:
   ```bash
   symfony server:start
   ```

6. **Open in browser**
   Navigate to `http://localhost:8000`

## 🎨 Customization

### Colors

Edit `tailwind.config.js` to customize the color scheme:

```javascript
theme: {
  extend: {
    colors: {
      primary: { ... },
      secondary: { ... }
    }
  }
}
```

### Content

- **Services**: Edit `src/Controller/HomeController.php` → `getServices()` method
- **Technologies**: Edit `src/Controller/HomeController.php` → `getTechnologies()` method
- **Templates**: Modify Twig templates in `templates/` directory

### Styling

- Global styles: `assets/styles/app.css`
- Tailwind configuration: `tailwind.config.js`
- Custom components: Add to `@layer components` in `app.css`

## 📁 Project Structure

```
.
├── assets/                 # Frontend assets
│   ├── styles/            # CSS files
│   └── app.js             # Main JavaScript entry
├── config/                # Symfony configuration
│   ├── packages/          # Bundle configs
│   └── routes.yaml        # Routing configuration
├── public/                # Web root
│   ├── build/             # Built assets (generated)
│   └── index.php          # Front controller
├── src/
│   ├── Controller/        # Controllers
│   └── Kernel.php         # Application kernel
├── templates/             # Twig templates
│   ├── base.html.twig     # Base layout
│   └── home/              # Home page templates
├── var/                   # Cache and logs
├── composer.json          # PHP dependencies
├── package.json           # JavaScript dependencies
├── tailwind.config.js     # Tailwind configuration
└── webpack.config.js      # Webpack Encore configuration
```

## 🚀 Deployment

### Production Build

```bash
npm run build
```

This creates optimized, minified assets in `public/build/`.

### Environment Configuration

Copy `.env` to `.env.local` and adjust settings for production:

```bash
APP_ENV=prod
APP_SECRET=your-secret-key
```

## 📝 License

This project is licensed under the MIT License - see the LICENSE file for details.

## 🤝 Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## 📧 Contact

For inquiries about web development services:
- Email: info@net-idea.com
- Website: [net-idea.com](https://net-idea.com)

---

Built with ❤️ by net-idea team
