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
