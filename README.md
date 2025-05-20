# Laravel Product Admin Paneli

Laravel tabanlı, kategoriler, ürünler, alt kategoriler, süreçler ve kullanıcı yorumlarının yönetilebildiği, **gelişmiş yetkilendirme sistemine sahip** dinamik bir  admin paneli projesi.

---

## 🚀 Özellikler

- 👤 Gelişmiş admin paneli
- 🗂️ Kategori ve alt kategori yönetimi
- 📦 Ürün ekleme, düzenleme, silme
- 💬 Kullanıcı yorumlarını kontrol etme
- 🔐 **Yetki ve Rol Yönetimi (Role & Permission)**
  - Farklı roller tanımlama
  - Her role özel erişim izinleri belirleme
  - Laravel Spatie Permission paketi ile esnek yapı

---

## 🛠️ Kullanılan Teknolojiler

- Laravel 10+
- Spatie Laravel Permission
- MySQL
- Bootstrap

---

## 📸 Ekran Görüntüleri

### 🔐 Admin Paneli

![Admin Panel - 1](https://github.com/user-attachments/assets/2a73075c-40b8-495d-8813-5312b3d2abce)
![Admin Panel - 2](https://github.com/user-attachments/assets/b7bfbf90-2c9a-4165-b7de-bb733535e9ed)
![Admin Panel - 3](https://github.com/user-attachments/assets/5c982a72-be06-453c-b34b-09c167e8e3af)
![Admin Panel - 4](https://github.com/user-attachments/assets/d8273e53-2a04-4de9-8810-55ee178c9847)

---

### 🌐 Arayüz

![Arayüz - 1](https://github.com/user-attachments/assets/dea16f6f-6719-4a9e-9fa3-2cbee15901ca)
![Arayüz - 2](https://github.com/user-attachments/assets/6bce9f37-0a4c-40ce-a426-7ad33681790c)
![Arayüz - 3](https://github.com/user-attachments/assets/40a24c4c-2be7-41f4-8cd5-48401b5bdd81)

## ⚙️ Kurulum

```bash
# Projeyi klonlayın
git clone https://github.com/kullanici-adin/laravel_product_dashboard.git

# Bağımlılıkları yükleyin
composer install
npm install && npm run dev

# Ortam dosyasını oluşturun
cp .env.example .env
php artisan key:generate

# Veritabanı ayarlarını .env dosyasından yapın

# Veritabanını migrate ve seed edin
php artisan migrate --seed

# Sunucuyu başlatın
php artisan serve
