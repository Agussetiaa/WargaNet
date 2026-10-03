# WargaNet - Vercel

Project ini sudah disiapkan untuk PHP runtime di Vercel.

## Deploy
1. Push seluruh project ke GitHub.
2. Import repository ke Vercel.
3. Pastikan Root Directory adalah folder yang berisi `vercel.json` dan `index.php`.
4. Deploy ulang.

## Database
Aplikasi tetap membutuhkan MySQL online. Isi Environment Variables di Vercel:
- DB_HOST
- DB_USER
- DB_PASSWORD
- DB_NAME
- DB_PORT (opsional, default 3306)

Import `database.sql` ke MySQL online terlebih dahulu.
