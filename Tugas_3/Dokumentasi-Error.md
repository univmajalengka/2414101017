1.  Pesan error : Access denied for user 'root'@'localhost' (using password: YES)
    Jenis error : Runtime
    Letak file dan baris: Di file Koneksi.php pada baris 8
    Penyebab : Password yang ditulis pada file tersebut tidak sesuai dengan password yang sebenarnya 
                    pada XAMPP, pada kode tersebut diisi password "12345" sehingga mysql menolak akses
    Cara memperbaiki : Mengganti passwordnya
        Sebelum: $password = "12345";
        Sesudah: $password = "";
2.  Pesan error : Parse error: syntax error, unexpected token "="
    Jenis error : Syntax error, Undefined variable
    Letak file dan baris : Di file proses-pendaftaran-2.php pada baris 13
    Penyebab : Pada baris tersebut variabelnya tidak diawali dengan simbol dollar, jadi php membaca itu sytax
               yang tidak valid, sehingga muncul error
    Cara memperbaiki : Menambahkan simbol dollar
        Sebelum: sekolah = $_POST['sekolah_asal'];
        Sesudah: $sekolah = $_POST['sekolah_asal'];