<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
 
use App\tai_khoan;
use App\giang_vien;
use App\sinh_vien;

use Excel;


class dtbController extends Controller
{
    public function signin() {
      return view('signin');
    }

    public function checkSignin() {
      include "/var/www/html/web/resources/views/md5.php";
      $name = $_POST['name'];
      $tai_khoan = tai_khoan::where('name', $name)->first();

      if($tai_khoan == NULL) {
        return view('signin');
      }

      $password = encryptIt($_POST['password']);
      if($tai_khoan->password == $password) {
        session(['userid' => $tai_khoan->id]);
      } 

      return view('welcome');
    }

    public function logout() {
      session()->forget('userid');

      return view('welcome');
    }

    public function update() {
      $tai_khoan = tai_khoan::where('id', session('userid'))->first();
      $loai_tai_khoan = $tai_khoan->loai_tai_khoan;
      return view('update')->with("loai_tai_khoan", $loai_tai_khoan);
    }

    public function edit() {
      include "/var/www/html/web/resources/views/md5.php";
       $tai_khoan = tai_khoan::where('id', session('userid'))->first();
       $tai_khoan->name = $_POST['ma'];
       $tai_khoan->password = encryptIt($_POST['password']);
       $tai_khoan->email = $_POST['email'];

       $tai_khoan->save();

       if($accType == "giang_vien") {
          $giang_vien = giang_vien::where('id', '=', session('userid'))->first();

          $bo_mon = bo_mon::where('ten', '=', $_POST['don_vi'])->first();

          $giang_vien->ho_ten = $_POST['ho_ten'];
          $giang_vien->id_bo_mon = $bo_mon->id;
                                
          $giang_vien->save();
        }

        if($accType == "sinh_vien") {
          $giang_vien = khoa::where('id', '=', session('userid'))->first();

          $khoa = khoa::where('id', '=', $_POST['ctdt'])->first();

          $giang_vien->ho_ten = $_POST['ho_ten'];
          $giang_vien->khoa_hoc = $_POST['khoa_hoc'];
          $giang_vien->id_khoa = $khoa->id;
                                
          $giang_vien->save();
        }                                           


      return view('welcome');
    }

    public function upload()
    {
        $dulieu_tu_input = NULL;
        return view('upload');
    }

    public function create() {
        return view('create');
    }

    public function store(Request $request)
    {
        $dulieu_tu_input = $request->all();

        $tai_khoan = new tai_khoan;
        
        include "/var/www/html/web/resources/views/sendMail.php";
        $encryptedPass = encryptIt($dulieu_tu_input["password"]);

        $tai_khoan->name = $dulieu_tu_input["name"];
        $tai_khoan->password = $encryptedPass;
        $tai_khoan->email = $dulieu_tu_input["email"];
        $tai_khoan->loai_tai_khoan = $dulieu_tu_input["loai_tai_khoan"];
 
        $tai_khoan->save();

        sm($dulieu_tu_input["email"]);
 
        return view('create');
    }

    public function activation() {
        include "/var/www/html/web/resources/views/md5.php";

        $email = $_GET['email'];
        $email = str_replace(" ", "+", $email);
        $decryptedEmail = decryptIt($email);
        $msg = "";
        $tai_khoan = tai_khoan::where('email', $decryptedEmail)->first();

        if($tai_khoan == NULL) {
            $msg = "Mã kích hoạt sai!";
        }
        else if($tai_khoan->activated == 1) {
            $msg = "Tài khoản đã được kích hoạt";
        }
            else {
                $tai_khoan->activated = 1;
                $tai_khoan->save();

                $msg = "Kích hoạt tài khoản thành công!";
            }

        return view('activation')->with([
            'tai_khoan' => $tai_khoan,
            'msg' => $msg
        ]);
    }

    public function excelSend() {
      include "/var/www/html/web/resources/views/sendMail.php";
      
          if($_FILES['file']['name'] != NULL){ // Đã chọn file
               // Tiến hành code upload file
            if($_FILES['file']['type'] == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"){
               // là file excel
               // Tiến hành code upload
               if($_FILES['file']['size'] > 1048576){
                   echo "File không được lớn hơn 1mb";
               }else{
                   // file hợp lệ, tiến hành upload
                   $path = "/var/www/html/web/resources/views/fileUpload/"; // ảnh upload sẽ được lưu vào thư mục data
                   $tmp_name = $_FILES['file']['tmp_name'];
                   $name = $_FILES['file']['name'];
                   $type = $_FILES['file']['type']; 
                   $size = $_FILES['file']['size']; 
                   // Upload file
                   move_uploaded_file($tmp_name,$path.$name);
                   echo "File uploaded! <br />";
                   echo "Tên file : ".$name."<br />";
                   echo "Kiểu file : ".$type."<br />";
                   echo "File size : ".$size;

                   //đọc file
                    $accType = $_POST['loai_tai_khoan'];
                    Excel::load('resources/views/fileUpload/test.xlsx', function($reader) {
                        $reader->each(function($sheet) {
                          $sheet->each(function($row) {
                            //tạo tài khoản
                              $tai_khoan = new tai_khoan;
                              
                              $password = rand_string(8);
                              $encryptedPass = encryptIt($password);

                              $tai_khoan->name = $row["ma"];
                              $tai_khoan->password = $encryptedPass;
                              $tai_khoan->email = $row["vnu_email"];
                              $tai_khoan->loai_tai_khoan = $accType;
                        
                              $tai_khoan->save();

                              //gửi mail kích hoạt
                            sm($row["email"]);

                            //tạo thông tin
                            if($accType == "giang_vien") {
                              $giang_vien = new giang_vien;

                              $bo_mon = bo_mon::where('ten', '=', $row['don_vi'])->first();

                              $giang_vien->ho_ten = $row["ho_ten"];
                              $giang_vien->id_bo_mon = $bo_mon->id;
                              
                              $giang_vien->save();
                            }

                            if($accType == "sinh_vien") {
                              $sinh_vien = new sinh_vien;

                              $khoa = khoa::where('ten', '=', $row['chuong_trinh_dao_tao'])->first();

                              $sinh_vien->ho_ten = $row["ho_ten"];
                              $sinh_vien->khoa_hoc = $row["khoa_hoc"];
                              $sinh_vien->id_khoa = $khoa->id;
                              
                              $sinh_vien->save();
                            }
                          });
                        }); 
                    });

                    //xóa file sau khi lấy dữ liệu xong
                    unlink($path.$name);
               }
             }else{
               // không phải file excel
               echo "Kiểu file không hợp lệ";
             }
          }else{
               echo "Vui lòng chọn file";
          }
          
      
      return view('upload');
    }

}
