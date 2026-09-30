# 🌊 Nihongo Roulette

Aplikasi latihan kosakata bahasa Jepang (Minna no Nihongo) dengan sistem roulette. Dibuat menggunakan Laravel 10 + PostgreSQL.

## ✨ Fitur

- 📚 4 Bab kosakata (Bab 1-4, total 224 kata)
- 🎯 7 Mode latihan:
  - Lisan • Hiragana
  - Lisan • Kanji
  - Lisan • Indonesia
  - Tulis • Romaji
  - Ketik • Hiragana
  - Ketik • Kanji
  - Ketik • Romaji
- 🔄 Mode Rekap (50 kata acak dari semua bab)
- 📊 Riwayat latihan + detail per kata
- 🏆 Sistem penilaian otomatis (A/B/C/0)
- ⏱ Timer per mode
- 🌊 Tema biru laut

## 🛠️ Teknologi

- **PHP** ^8.1
- **Laravel** ^10.10
- **PostgreSQL** 13+
- **Composer** ^2.x
- **JavaScript** (vanilla)

## 📦 Instalasi

```bash
git clone https://github.com/RiezaOz/learning_nihongo_roulette.git
cd learning_nihongo_roulette
composer install
cp .env.example .env
php artisan key:generate
# Edit .env, sesuaikan DB_DATABASE (PostgreSQL)
php artisan migrate --seed
php artisan serve