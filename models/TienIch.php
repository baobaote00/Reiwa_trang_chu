<?php
class TienIch
{
    //bỏ dấu và chuyển khoảng trắng thành _ trong tiếng việt
    public static function vn_to_str($str)
    {

        $unicode = array(

            'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',

            'd' => 'đ',

            'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',

            'i' => 'í|ì|ỉ|ĩ|ị',

            'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',

            'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',

            'y' => 'ý|ỳ|ỷ|ỹ|ỵ',

            'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',

            'D' => 'Đ',

            'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',

            'I' => 'Í|Ì|Ỉ|Ĩ|Ị',

            'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',

            'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',

            'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ',

        );

        foreach ($unicode as $nonUnicode => $uni) {

            $str = preg_replace("/($uni)/i", $nonUnicode, $str);
        }
        $str = str_replace(' ', '-', $str);

        return $str;
    }
    //bỏ dấu và khoảng trắng trong tiếng việt
    public static function vn_to_str_none_space($str)
    {

        $unicode = array(

            'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',

            'd' => 'đ',

            'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',

            'i' => 'í|ì|ỉ|ĩ|ị',

            'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',

            'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',

            'y' => 'ý|ỳ|ỷ|ỹ|ỵ',

            'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',

            'D' => 'Đ',

            'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',

            'I' => 'Í|Ì|Ỉ|Ĩ|Ị',

            'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',

            'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',

            'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ',

        );

        foreach ($unicode as $nonUnicode => $uni) {

            $str = preg_replace("/($uni)/i", $nonUnicode, $str);
        }
        $str = str_replace(' ', '', $str);
        $str = str_replace('/', '', $str);

        return $str;
    }

    //tách mảng theo trang
    public static function get_array_page($array, $page, $perPage, $total)
    {
        $array2 = [];
        $tempPage = ($page - 1) * $perPage;
        $tempTotal = $page * $perPage;
        if ($page * $perPage > $total) {
            $tempTotal =  $total;
        }
        for ($i = $tempPage; $i < $tempTotal; $i++) {
            $array2[] = $array[$i];
        }

        return $array2;
    }

    //sắp xếp mảng theo ngày đăng tăng dần
    public static function sort_ngay_dang($array)
    {
        $array2 = $array;
        for ($i = 0; $i < count($array2); $i++) {
            for ($j = 0; $j < count($array2); $j++) {
                if (date($array2[$i]['date']) > date($array2[$j]['date'])) {
                    $temp = $array2[$i];
                    $array2[$i] = $array2[$j];
                    $array2[$j] = $temp;
                }
            }
        }
        return $array2;
    }

    //Lấy hình đầu tiên từ textarea
    public static function get_src_img($html)
    {
        $doc = new DOMDocument();
        $doc->loadHTML($html);
        $xpath = new DOMXPath($doc);
        $src = $xpath->evaluate("string(//img/@src)");
        return $src;
    }
    //Gửi mail
    public static function sendEmail($nguoi_nhan, $from_name, $subject, $noi_dung)
    {
        require("./Models/PHPMailer-master/src/PHPMailer.php");
        require("./Models/PHPMailer-master/src/SMTP.php");
        require("./Models/PHPMailer-master/src/Exception.php");
        $mail = new PHPMailer\PHPMailer\PHPMailer();

        $mail->CharSet = "UTF-8";
        $mail->IsSMTP(); // send via SMTP
        $mail->Host = "kusamailer.tenten.cloud"; // SMTP servers change to localhost
        $mail->Smtp_port = "465";       // change smtp port
        $mail->SMTPAuth = true; // turn on SMTP authentication
        $mail->Username = "hoanganh34k@reiwahouse.com.vn"; // tên tài khoản
        $mail->Password = "Hoanganh11k!"; // mật khẩu

        $mail->From = "hoanganh34k@reiwahouse.com.vn";
        $mail->FromName = $from_name;
        $mail->AddAddress($nguoi_nhan); //email người nhận
        $mail->AddReplyTo("hoanganh34k@gmail.com", "HoangAnh");  //email trả lời

        $mail->WordWrap = 50; // set word wrap

        $mail->IsHTML(true); // send as HTML

        $mail->Subject = $subject;
        $mail->Body = $noi_dung; // nội dung mail
        return $mail->Send();
    }
}
