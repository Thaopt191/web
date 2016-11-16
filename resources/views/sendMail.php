<?php
    //goi thu vien
    include('PHPmailer/class.smtp.php');
    include "PHPmailer/class.phpmailer.php"; 
    include "function.php";
    include "md5.php";

    function sm($mail) {
        $encrypted = encryptIt( $mail );

        $title = 'Email verification';
        $content = 'Hi, <br/> <br/> We need to make sure you are human. Please verify your email and get started using your Website account. <br/> <br/>
                    <a href= "http://localhost/web/public/activation?email='.$encrypted.'" >
                    http://localhost/web/public/activation?email='.$encrypted.'</a>';
       
        $nTo = 'PhuongTuan';
        $mTo = 'ngophuongtuan@gmail.com';
        $diachicc = '';
        //test gui mail
        $mail = sendMail($title, $content, $nTo, $mTo,$diachicc='');
        if($mail==1)
        echo 'mail của bạn đã được gửi đi hãy kiếm tra hộp thư đến để xem kết quả. ';
        else echo 'Co loi!';
    }    
?>

