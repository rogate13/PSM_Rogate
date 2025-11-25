# 📘 PSM_Rogate

## 1. Tentang Project
PSM Rogate adalah aplikasi:
- Topup saldo member
- Deduct saldo (donasi)
- Manajemen transaksi
- Admin dan Member Dashboard
- API berbasis token
- Session login + Role protection
- Hooks untuk proteksi otomatis

## 2. Requirements
- PHP 7.4
- MySQL 5.7+
- XAMPP 7.4+
- CodeIgniter 3.1.1
- MongoDB

## 3. Struktur Folder
```
htdocs/PSM_Rogate/
```

## 4. Instalasi
1. Copy project ke `htdocs`
2. Import database:
   - psm_rogate.sql

## 5. Login System
Controller:
```
controllers/Login.php
```

Session disimpan:
- auth_token
- user_id
- role
- member_id

## 6. Hooks
- AuthHook (API token)
- RedirectLogin (Session redirect)

Enable:
```
$config['enable_hooks'] = TRUE;
```

## 7. Testing API
# 1. DESKRIPSI API
Seluruh API menggunakan pola **RESTful**, berbasis **JSON**, dan menggunakan **Bearer Token Authentication**.

Base URL (local):
```
http://localhost/PSM_Rogate/api/
```

# 2. Authentication API

## 🔐 2.1 Login
**POST** `/auth/login`

### Request Body
```json
{
  "username": "admin@admin.com",
  "password": "admin123"
}
```

### Response
```json
{
  "token": "xxxxx",
  "expired_at": "2025-01-01 12:00:00",
  "role": "ADMIN",
  "user_id": 1
}
```

### Catatan
- Token berlaku **1 jam** (default).
- Disimpan di tabel: `user_tokens`.

---

# 3. Member API

## 👤 3.1 List Semua Member (ADMIN)
**GET** `/members`

### Response
```json
[
  {
    "id": 1,
    "member_code": "MBR001",
    "full_name": "John Doe",
    "current_balance": 100000
  }
]
```

---

## 👤 3.2 Create Member
**POST** `/members`

### Body
```json
{
  "full_name": "Budi",
  "email": "budi@mail.com",
  "phone": "081234",
  "member_code": "AUTO"
}
```

---

## 👤 3.3 Show Member
**GET** `/members/{id}`

---

## 👤 3.4 Update Member
**PUT/PATCH** `/members/{id}`

---

## ❌ 3.5 Delete Member
**DELETE** `/members/{id}`

---

# 4. Balance API (Topup & Deduct)

Semua operasi saldo dilakukan melalui:
```
application/controllers/api/services/BalanceService.php
```

---

## 💰 4.1 Topup Saldo
**POST** `/members/{id}/topup`

### Body
```json
{ "amount": 50000 }
```

### Response
```json
{
  "message": "Topup success",
  "new_balance": 150000
}
```

---

## 💸 4.2 Deduct Saldo
**POST** `/members/{id}/deduct`

### Body
```json
{ "amount": 20000 }
```

### Response
```json
{
  "message": "Deduct success",
  "new_balance": 80000
}
```

---

# 5. Transaction API

## 📄 5.1 Riwayat Transaksi Member
**GET** `/members/{id}/transactions`

---

## 📄 5.2 Semua Transaksi (ADMIN)
**GET** `/transactions`

---

## 📄 5.3 Riwayat Transaksi Saya (USER MEMBER)
**GET** `/my/transactions`

---

# 6. Data Format Penjelasan

## Tabel `transactions`
Setiap transaksi menghasilkan:

| Field | Penjelasan |
|-------|------------|
| id | ID transaksi |
| member_id | Member terkait |
| transaction_type_id | TOPUP / PURCHASE |
| amount | Nominal |
| balance_before | Saldo sebelum |
| balance_after | Saldo sesudah |
| channel | API/WEB |
| created_by | Admin/User ID |
| created_at | Timestamp |

---

# 7. Authentication & Token Flow

1. Login → Generate Token  
2. Token disimpan di database  
3. API menerima header:

```
Authorization: Bearer <token>
```

4. Token dicek via Hook `AuthHook`
5. Jika token invalid → return 401

---

# 8. Complete API List

| Endpoint | Method | Role | Fungsi |
|----------|--------|-------|--------|
| /auth/login | POST | ALL | Login pengguna |
| /members | GET | ADMIN | List member |
| /members | POST | ADMIN | Tambah member |
| /members/:id | GET | ADMIN/STAFF | Detail member |
| /members/:id | PUT/PATCH | ADMIN/STAFF | Update member |
| /members/:id | DELETE | ADMIN | Hapus member |
| /members/:id/topup | POST | ADMIN/STAFF | Topup saldo |
| /members/:id/deduct | POST | ADMIN/STAFF | Pembelian/donasi |
| /members/:id/transactions | GET | ADMIN/STAFF | Riwayat member tertentu |
| /transactions | GET | ADMIN | Semua transaksi |
| /my/transactions | GET | MEMBER | Riwayat transaksi sendiri |

---

# 9. Security Notes

✔ Token hanya valid 1 jam  
✔ Semua perubahan saldo otomatis tercatat (MySQL + MongoDB)  
✔ Transaksi tidak boleh minus  
✔ Setiap API dicek role (ADMIN/STAFF/MEMBER)

---

# 10. Cara Menjalankan
1. Jalankan Apache + MySQL  
2. Import SQL  
3. Pastikan `enable_hooks` aktif  
4. Akses login:

```
http://localhost/PSM_Rogate/login
```

5. Gunakan Postman untuk test API  

---


