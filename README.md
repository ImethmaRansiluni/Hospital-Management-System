# Hospital-Management-System
A complete hospital management system for patients, doctors, and administrators

## Features

### 👨‍⚕️ Doctor Portal
- View patient reports
- Add medications and prescriptions
- Generate medical reports

### 🏥 Patient Portal
- Book and manage appointments
- View medical history
- Access billing information

### 👔 Admin Portal
- Manage all user accounts
- Oversee appointments
- Process payments

## Technology Stack
- **Frontend**: HTML5, CSS3, JavaScript, Bootstrap
- **Backend**: PHP
- **Database**: MySQL
- **Server**: WampServer

## Installation

1. Clone this repository to your WampServer `www` folder:
   ```bash
   git clone https://github.com/ImethmaRansiluni/Hospital-Management-System.git
   ```

2. Import the database (if available):
   - Use the provided SQL file in `database/` folder
   - Import via phpMyAdmin

3. Access the application:
   ```
   http://localhost/Hospital-Management-System/MainViewPages/HomePage.php
   ```

## User Access

| User Type  | Default Credentials       | Access Features                 |
|------------|---------------------------|----------------------------------|
| Patient    | Email: patient@test.com   | Appointments, Bills, History     |
|            | Password: patient123      |                                  |
| Doctor     | Email: doctor@test.com    | Reports, Medications, Schedules  |
|            | Password: doctor123       |                                  |
| Admin      | Email: admin@test.com     | User Management, System Config   |
|            | Password: admin123        |                                  |

## Project Structure

```
CareCompass-HMS/
├── MainViewPages/       # Main interface pages
│   ├── hHomePage.php    # Home page
│   ├── login/           # Login pages
│   └── appointments/    # Appointment system
├── patient-portal/      # Patient-specific features
├── doctor-portal/       # Doctor-specific features
├── admin-portal/        # Admin-specific features
├── assets/              # CSS, JS, images
└── database/            # Database scripts
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first.

## License
[MIT](https://choosealicense.com/licenses/mit/)