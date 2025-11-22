# Member Balance Management API  
Sistem manajemen saldo member berbasis **CodeIgniter 3**, **MySQL**, dan **MongoDB**.  
Menyediakan API untuk pendaftaran member, topup, transaksi, riwayat, logging, dan audit trail.

Project ini dikembangkan menggunakan arsitektur **OOP**, **modular**, dan **production-ready**, sesuai standar technical test Fullstack Developer.

## 🔥 Fitur Utama

### ✅ Manajemen Member
- Create member  
- Update member  
- Delete member  
- Lihat detail member  
- Lihat semua member  

### ✅ Manajemen Saldo
- Topup saldo member  
- Deduct saldo member  
- Riwayat transaksi per member  
- Riwayat transaksi oleh admin  
- Riwayat transaksi user yang sedang login (MEMBER)

### ✅ Autentikasi
- Login menggunakan username + password (bcrypt)  
- Token authorization  
- Token expiry  
- Role-based access (ADMIN, STAFF, MEMBER)

### ✅ MongoDB NoSQL Integrasi (Nilai Tambah)
- Event Log (TOPUP, DEDUCT)  
- API Request Log  
- Daily Balance Snapshot  
- Event Sourcing (Riwayat perubahan saldo)

### 🛡 Keamanan
- Token-based auth  
- Role-based restriction  
- Hook-based authentication  
- Validasi request JSON  
- Foreign key constraints  

## 📁 Struktur Folder

```
application/
    controllers/
        api/
            MemberApi.php
            TransactionApi.php
            AuthApi.php
            services/
                BalanceService.php
    models/
        Member_model.php
        Transaction_model.php
        Transaction_type_model.php
        Transaction_log_model.php
        User_model.php
        User_token_model.php
    libraries/
        RoleLib.php
        Nosql/
            MongoClientCI.php
            MongoEventLogger.php
            MongoApiLogger.php
            MongoSnapshotService.php
            MongoEventSourcing.php
    hooks/
        AuthHook.php
```

## 🗄 Database MySQL

### members
```
id, member_code, full_name, email, phone,
status, current_balance, created_at, updated_at
```

### users (akun login)
```
id, username, password_hash, role, member_id
```

### transactions
```
id, member_id, transaction_type_id, amount,
balance_before, balance_after, channel, created_by
```

### transaction_log
```
id, transaction_id, member_id, before_balance, after_balance
```

### user_tokens
```
token, user_id, expired_at
```

## 🍃 MongoDB Collections

### 1. transaction_events
```
{
  event: "TOPUP",
  payload: { member_id, amount, before, after, trx_id },
  timestamp: ISODate()
}
```

### 2. api_logs
```
{
  endpoint, method, status, body, timestamp
}
```

### 3. balance_snapshots
```
{
  member_id, date, before, after, timestamp
}
```

### 4. event_sourcing
```
{
  event, payload, timestamp
}
```

## 🏗 Instalasi Project

### 1. Clone Repository
```
git clone https://github.com/rogate13/PSM_Rogate.git
cd member-balance-api
```

### 2. Install Composer (MongoDB Driver)
Masukkan ke folder:

```
application/third_party/vendor/
```

Install:
```
composer require mongodb/mongodb
```

### 3. Import MySQL Schema
Import file `.sql` yang sudah disediakan:

```
mysql -u root -p < database.sql
```

### 4. Setup MongoDB
Pastikan MongoDB berjalan:

```
sudo service mongod start
```

Default URL:
```
mongodb://localhost:27017
```

Database akan otomatis terbentuk:  
`member_app`

## ⚙ Konfigurasi CodeIgniter 3

### `config/config.php`
```
$config['enable_hooks'] = TRUE;
$config['base_url'] = 'http://localhost/ci3-api/';
```

### `config/hooks.php`
```
$hook['post_controller_constructor'][] = [
    'class'    => 'AuthHook',
    'function' => 'checkAuth',
    'filename' => 'AuthHook.php',
    'filepath' => 'hooks'
];
```

## 🔐 Autentikasi

Semua endpoint (kecuali login) menggunakan header:

```
Authorization: Bearer {token}
```

Token memiliki expired time (default: 1 jam).

## 📌 API Documentation

### 1. Login
#### POST `/api/auth/login`

Body:
```json
{
  "username": "admin",
  "password": "admin123"
}
```

Response:
```json
{
  "message": "Login success",
  "token": "{jwt-like-token}",
  "user": {
    "id": 1,
    "role": "ADMIN"
  }
}
```

### 2. Member
- GET `/api/members`
- GET `/api/members/{id}`
- POST `/api/members`
- PUT `/api/members/{id}`
- DELETE `/api/members/{id}`

### 3. Topup
POST `/api/members/{id}/topup`

Body:
```json
{
  "amount": 50000
}
```

### 4. Deduct
POST `/api/members/{id}/deduct`

### 5. Riwayat Transaksi
- GET `/api/members/{id}/transactions` (ADMIN/STAFF)
- GET `/api/my/transactions` (MEMBER)

## 🧠 MongoDB Automatic Logging

Setiap transaksi akan:
- Log event (MongoDB)
- Snapshot saldo harian
- Event sourcing

## 🧪 Testing

Gunakan Postman:
- Login
- Copy token
- Test endpoint lainnya

Cek MongoDB:
```
db.transaction_events.find()
db.api_logs.find()
db.balance_snapshots.find()
db.event_sourcing.find()
```

## 🏁 Kesimpulan

Project ini menggunakan:
- CodeIgniter 3  
- MySQL  
- MongoDB  
- OOP Services  
- Hook Authentication  
- Logging & Monitoring  

Siap untuk technical test & produksi sederhana.
