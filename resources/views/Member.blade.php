@extends('Index')

@section('Member')

<?php

$email = "";
$nama_lengkap = "";

$message = array(); // Inisialisasi $message sebagai array kosong

if(isset($_POST['simpan'])){
    $nama_lengkap = $_POST['nama_lengkap'];
    $nama_lengkap = filter_var($nama_lengkap, FILTER_SANITIZE_STRING);
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);
    $password = md5($_POST['password']);
    $password = filter_var($password, FILTER_SANITIZE_STRING);
    $cpass = md5($_POST['konfirmasi_password']);
    $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

    // Periksa apakah email sudah ada sebelumnya
    $select = $conn->prepare("SELECT * FROM `member` WHERE email = ?");
    $select->bind_param("s", $email);
    $select->execute();
    $select->store_result();
    $rowCount = $select->num_rows;

    if($rowCount > 0){
        $message[] = 'User email already exists!';
    } else {
        // Lanjutkan proses pendaftaran jika email belum ada
        if($password != $cpass){
            $message[] = 'Confirm password not matched!';
        } else {
            // Jumlah tanda tanya (?) harus sesuai dengan jumlah kolom yang ingin dimasukkan
            $insert = $conn->prepare("INSERT INTO `member` (nama_lengkap, email, password, user_type) VALUES (?, ?, ?, 'user')");
            $insert->bind_param("sss", $nama_lengkap, $email, $password);
            $insert->execute();


            if($insert) {
                $message[] = 'Registered successfully!';
            } else {
                $message[] = 'Registration failed!';
            }
        }
    }
}
?>

<div class="bodyReg">
    <div class="wrapperReg">
        <!-- Tampilkan pesan di sini -->
        <?php
        if(isset($message) && !empty($message)){
            foreach($message as $message){
                // Tentukan kelas untuk warna latar belakang sesuai dengan jenis pesan
                $class = (strpos($message, 'successfully') !== false) ? 'sukses' : 'error';
                echo '
                    <div class="message '.$class.'">
                        <span>'.$message.'</span>
                        <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
                    </div>
                ';
            }
        }
        ?>

        <h1>Register</h1>
        <form method="POST" action="/simpan">
            @csrf
            <div class="input-box">
                <input type="text" placeholder="Nama Lengkap" id="nama_lengkap" name="name" value="<?php echo $nama_lengkap ?>"/>
                <i class='bx bxs-user'></i>
            </div>
            @error('name')
                            <span class="error-message">{{ $message }}</span>
            @enderror
            <div class="input-box">
                <input type="text" placeholder="Email" id="email" name="email" value="<?php echo $email ?>"/>
                <i class='bx bxl-gmail'></i>
            </div>
            @error('email')
            <span class="error-message">{{ $message }}</span>
            @enderror
            <div class="input-box">
                <input type="password" placeholder="Password"  id="password" name="password" placeholder="Password"/>
                <i class='bx bxs-lock-alt' id="togglePassword"></i>
            </div>
            @error('password')
            <span class="error-message">{{ $message }}</span>
            @enderror
            <div class="input-box">
                <input type="password" placeholder="Konfirmasi Password"  id="password" name="konfirmasi_password"/>
                <i class='bx bxs-lock-alt' id="togglePassword"></i> 
            </div>
            @error('password')
            <span class="error-message">{{ $message }}</span>
            @enderror
            <button type="submit" class="btn" name="simpan" value="simpan" >Simpan</button>
        </form>
    </div>
</div>
@endsection
