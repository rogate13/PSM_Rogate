# 📘 PSM Wallet (PSM_Rogate)

## 1. Tentang Project
PSM Wallet adalah aplikasi:
- Topup saldo member
- Deduct saldo (donasi/pembelian)
- Manajemen transaksi
- Admin dan Member Dashboard
- API berbasis token
- Session login + Role protection
- Hooks untuk proteksi otomatis

## 2. Requirements
- PHP 7.2–8.1
- MySQL 5.7+
- XAMPP 7.4+
- CodeIgniter 3.1.x
- Composer (opsional)
- MongoDB (opsional)

## 3. Struktur Folder
```
htdocs/PSM_Rogate/
```

## 4. Instalasi
1. Copy project ke `htdocs`
2. Import database:
   - 01. awal_awal.sql
   - 02. tambahan tabel.sql
   - 03. tokenisasi.sql

## 5. Konfigurasi CI
Autoload:
```
$autoload['libraries'] = ['database','session'];
$autoload['helper'] = ['url','form'];
```

base_url:
```
$config['base_url']=((isset($_SERVER['HTTPS'])...
```

## 6. Login System
Controller:
```
controllers/Login.php
```

Session disimpan:
- auth_token
- user_id
- role
- member_id

## 7. Hooks
- AuthHook (API token)
- RedirectLogin (Session redirect)

Enable:
```
$config['enable_hooks'] = TRUE;
```

## 8. Routes
API dan View routing sudah lengkap sesuai project.

## 9. Testing API
Gunakan Postman.

Login:
POST `/api/auth/login`

Topup:
POST `/api/members/:id/topup`

Deduct:
POST `/api/members/:id/deduct`

## 10. View System
Folder:
```
views/login
views/admin
views/member
```

## 11. Balance Service
OOP terpusat di:
```
application/controllers/api/services/BalanceService.php
```

## 12. Troubleshooting
- 404 → cek .htaccess
- Hooks error → enable_hooks
- Model error → nama file harus benar
- Redirect loop → tambahkan ke public_routes
