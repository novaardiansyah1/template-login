# Template-Login
Apakah kamu sedang mencari cara membuat fitur login serta registrasi di CodeIgniter 4? tetapi kamu adalah orang yang gak mau ribet!, jadi bagaimana cara kamu membuat fitur tersebut tanpa perlu ribet?

Caranya adalah dengan menggunakan bantuan _Template-Login_, kamu hanya perlu melakukan sedikit konfigurasi maka fitur login&registrasi yang kamu inginkan sudah siap untuk digunakan.

_Template-Login_ adalah sebuah fitur login dan registrasi yang sudah siap pakai, yang perlu kamu lakukan hanya menyesuaikan field-field apa saja yang kamu gunakan.

Secara default _Template-Login_ hanya menggunakan username dan password untuk login, tetapi bila kamu ingin menggantinya dengan email atau yang lainnya itu bisa kamu lakukan dengan mudah.

## Installasi
ikuti langkah-langkah Installasi berikut:

- download source code _Template-Login_
- buat database baru dengan nama _template-login_.
- lakukan konfigurasi database melalui file _.env_ (rename file _env_ menjadi _.env_ sebelum melakukan konfigurasi)
- lakukan migrasi untuk tabel-tabel dasar _Template-Login_.

  `php spark migrate -all`

- lakukan seeding untuk mengisi data di tabel _level_

  `php spark db:seed level`

- buka browser dan arahkan ke alamat App kamu:
  
  `http://localhost:8080/template-login`

- jika sudah tampil halaman login, itu artinya proses Installasi telah berhasil, dan fitur _Template-Login_ sudah bisa kamu gunakan.

__note:__ _saya menganggap kamu sudah paham mengenai dasar-dasar konfigurasi CodeIgniter 4, jadi seharusnya kamu bisa melakukan konfigurasi diatas dengan mudah._

_untuk database kamu juga bisa menggunakan database milikmu sendiri tanpa harus membuat database baru, tinggal disesuaikan saja._

_jika kamu ingin melakukan konfigurasi lebih lanjut, silahkan buka file controller **Auth.php** dan silahkan lakukan konfigurasi sesuai keinginan kamu._

## Pengembangan
- CodeIgniter versi 4
- PHP versi 7.4.3
- MySQL versi 5.6.38
- AdminLte versi 3.0.5

## Fitur
- login multilevel (admin dan user)
- registrasi
- captcha dibagian registrasi

## Sosial Media
- Github [Nova Ardiansyah](https://github.com/novaardiansyah1)
- Facebook [Nova Ardiansyah](https://facebook.com/nova981)
- LinkedIn [Nova Ardiansyah](https://linkedin.com/mwlite/in/novaardiansyah)
- Instagram [@Novaardiansyah._](https://www.instagram.com/novaardiansyah._)

## Lisensi
- open source (_tidak untuk diperjual belikan_)

## Status
- Tahap Pengembangan.