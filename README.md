
- create some modules in the "Website" system
1. product module
2. category module
3. order module
- in each module there are functions to create (except order), update, delete, display data, filter, import and export to csv.
- make the module reusable.

1. Product
- name
- stock
- price
- discount
- status
- sku
- seo_url
- image (multiple)
- category (from category module)

2. category (can add sub category)
- name
- sku
- status
- parent
- seo_url

3. order
- module for displaying order data from customers
- no need create
- just update. details, delete








1. membuat halaman frontend untuk pengguna
2. Membuat fungsi login, pendaftaran, dan lupa kata sandi untuk pengguna
3. halaman beranda
- berisi banner, header, footer, konten
- untuk konten yang sederhana saja
4. Halaman daftar produk
- menampilkan daftar produk dari modul produk yang ada di konsol
- Terdapat fitur pencarian
- Terdapat fitur filter kategori
- terdapat gambar produk, nama, deskripsi, jumlah, tombol beli/tambah ke grafik
5. Halaman detail produk
- url sesuai dengan seo_url
- terdapat gambar produk, nama, deskripsi, jumlah, tombol beli/tambah ke grafik
6. Membuat halaman profil untuk pengguna
- pengguna dapat mengedit identitas, alamat dll
- pengguna dapat melihat riwayat pesanan