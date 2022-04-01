Import database resep.sql file ada di dalam folder databasesql

Install Laravel

Buka Terminal
ketik

-   composer install
-   npm install
-   npm run dev
-   cp .env.example .env
-   php artisan key:generate

Buka file env isi DB_DATABASE menjadi nama database yang sudah dibuat (resep)

Terdapat dua autentikasi ada user dan admin

Role admin

-   Datapat melakukan Create, Read, Update, Delete pada data obat
-   Datapat melakukan Create, Read, Update, Delete pada data signa

user = admin@admin.com
pass = f1a7i1z0

Role user

-   Datapat melakukan Create, Read, Update, Delete pada data nonresep
-   Datapat melakukan Create, Read, Update, Delete pada data resep

user = user@user.com
pass = f1a7i1z0

Klik username yang ada di pojok kanan atas navigasi untuk melakukan logout
