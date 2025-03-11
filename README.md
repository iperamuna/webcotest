# Webco SSE Laravel and Filament Test

This repository demonstrates the implementation of Laravel Filament, showcasing technical abilities with a clean and effective setup.

## Installation Steps

Follow the steps below to set up the project:

1. **Clone the Repository**  
   Clone this repository to your local machine.

   ```bash
   git clone <repository-url>
   ```

2. **Checkout the Develop Branch**  
   After cloning, switch to the `develop` branch:

   ```bash
   git checkout develop
   ```

3. **Install Dependencies**  
   Navigate to the project directory and run the following commands:

   ```bash
   cd <project-directory>
   composer install
   php artisan migrate
   npm install
   npm run build
   ```

4. **Configure Environment Variables**  
   Update the `.env` file with the required variables:

   ```env
   ASMORPHIC_EXTRANET_API_EMAIL=<your-email>
   ASMORPHIC_EXTRANET_API_PASSWORD=<your-password>
   ASMORPHIC_EXTRANET_API_COMPANY_ID=<your-company-id>
   ```

5. **Serve the Application**  
   Start the Laravel development server with vite with queues:

   ```bash
   composer dev
   ```