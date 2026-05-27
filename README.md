# OfficinaMeccanica

Sistema di gestione per officina meccanica.

## Requisiti

- PHP >= 8.3
- Composer
- Node.js e NPM
- SQLite (incluso)

## Installazione

1. Clona il repository

2. Installa le dipendenze PHP:
```bash
composer install
```

3. Installa le dipendenze JavaScript:
```bash
npm install
```

4. Copia il file di configurazione dell'ambiente:
```bash
cp .env.example .env
```

5. Genera la chiave dell'applicazione:
```bash
php artisan key:generate
```

6. Esegui le migrazioni del database:
```bash
php artisan migrate
```

7. Popola il database con dati di esempio:
```bash
php artisan db:seed
```

8. Compila gli asset frontend:
```bash
npm run build
```

## Avvio

### Server di sviluppo

Avvia il server Laravel in locale :
```bash
php artisan serve
```

L'applicazione sarà disponibile all'indirizzo: `http://localhost:8000`

### Pannello di amministrazione Filament

Accedi al pannello admin all'indirizzo: `http://localhost:8000/admin`

## Credenziali di accesso

### Utente Admin

- **Email**: `admin@officina.test`
- **Password**: `password`

## Struttura del database

Il progetto gestisce tre entità principali:

### Clienti
- Nome
- Telefono
- Email
- Indirizzo

### Veicoli
- Cliente (relazione)
- Marca
- Modello
- Anno
- Targa

### Servizi
- Veicolo (relazione)
- Descrizione
- Costo
- Data

## Relazioni

- Un cliente può avere molti veicoli
- Un veicolo appartiene a un cliente
- Un veicolo può avere molti servizi
- Un servizio appartiene a un veicolo

## Widget Dashboard

Il pannello admin include:

- **Statistiche generali**: Clienti, Veicoli, Servizi, Ricavi totali
- **Grafico ricavi mensili**: Andamento dei ricavi degli ultimi 6 mesi
- **Ultimi servizi**: Tabella con gli ultimi 10 interventi

## Tecnologie utilizzate

- **Laravel 13.7**: Framework PHP
- **FilamentPHP 5.6**: Pannello di amministrazione
- **SQLite**: Database
- **Livewire 4**: Framework per interattività frontend
- **TailwindCSS**: Styling


## Comandi utili

### Eseguire i test
```bash
php artisan test
```

### Pulire la cache
```bash
php artisan optimize:clear
```

### Reset del database
```bash
php artisan migrate:fresh --seed
```

### Creare una nuova risorsa Filament
```bash
php artisan make:filament-resource NomeModello --generate
```

## Licenza

MIT

---

# English Version

# OfficinaMeccanica

Management system for mechanical workshops.

## Requirements

- PHP >= 8.3
- Composer
- Node.js and NPM
- SQLite (included)

## Installation

1. Clone the repository

2. Install PHP dependencies:
```bash
composer install
```

3. Install JavaScript dependencies:
```bash
npm install
```

4. Copy environment configuration file:
```bash
cp .env.example .env
```

5. Generate application key:
```bash
php artisan key:generate
```

6. Run database migrations:
```bash
php artisan migrate
```

7. Populate database with sample data:
```bash
php artisan db:seed
```

8. Build frontend assets:
```bash
npm run build
```

## Getting Started

### Development Server

Start Laravel local server:
```bash
php artisan serve
```

The application will be available at: `http://localhost:8000`

### Filament Admin Panel

Access the admin panel at: `http://localhost:8000/admin`

## Login Credentials

### Admin User

- **Email**: `admin@officina.test`
- **Password**: `password`

## Database Structure

The project manages three main entities:

### Clients
- Name
- Phone
- Email
- Address

### Vehicles
- Client (relation)
- Brand
- Model
- Year
- License plate

### Services
- Vehicle (relation)
- Description
- Cost
- Date     

## Relationships

- A client can have many vehicles
- A vehicle belongs to a client
- A vehicle can have many services
- A service belongs to a vehicle

## Dashboard Widgets

The admin panel includes:

- **General statistics**: Clients, Vehicles, Services, Total revenue
- **Monthly revenue chart**: Revenue trend for the last 6 months
- **Recent services**: Table with the last 10 interventions

## Technologies Used

- **Laravel 13.7**: PHP Framework
- **FilamentPHP 5.6**: Admin panel
- **SQLite**: Database
- **Livewire 4**: Frontend interactivity framework
- **TailwindCSS**: Styling

## Useful Commands

### Run tests
```bash
php artisan test
```

### Clear cache
```bash
php artisan optimize:clear
```

### Reset database
```bash
php artisan migrate:fresh --seed
```

### Create a new Filament resource
```bash
php artisan make:filament-resource ModelName --generate
```

## License

MIT
