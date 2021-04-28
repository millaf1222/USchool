1. Halaman Login

Pada halaman login, user akan diminta untuk menginput username dan
password, apabila password/username salah, maka akan ada error message
yang dibuat dengan cara men-set $_SESSION['errors']

selain itu, SQL injection juga sudah ditangani dengan menggunakan
PDO prepared statement.

Validasi login digunakan dengan javascript, apabila ada field yang kosong
maka alert akan muncul

Dari segi backend, variabel $_SESSION['role'] juga di-set guna membedakan
priviledge yang dimiliki masing-masing role, lebih lengkap akan dibahas di
home.

3. Home

Halaman home bergantung pada $_SESSION['role']
apabila role sebagai admin maka tombol add student akan di echo, selain itu tidak.

apabila role sebagai admin maka tombol delete (untuk delete data) tidak akan di echo
data yang terpilih akan dihapus dari database.

pada navbar ada 3 tombol, home (yang akan me redirect pada home), profile, dan logout

tombol profile jika diklik akan mengeluarkan modal yang menampilkan Coder's Profile
tombol logout apabila diklik akan menanyakan konfirmasi logout, jika ya maka akan logout(session_destroy())

5. Edit

Untuk mengedit/mengganti data   

6. Add User

Mirip seperti edit, namun menampilkan form kosong,untuk memasukan data(data siswa) baru.

7. Update
untuk memperbaharui data siswa,nilai siswa.
