<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
#phongto {
transition: all 1s ease;
-webkit-transition: all 1s ease;
-moz-transition: all 1s ease;
-o-transition: all 1s ease;z-index:99
}
#phongto:hover{
transform: scale(2,2);
-webkit-transform: scale(2,2);
-moz-transform: scale(2,2);
-o-transform: scale(2,2);
-ms-transform: scale(2,2);
}.nut50{height:45px;margin-top:5px;}.giua{text-align:center}
</style>
<title>Kiểm tra đơn</title>
</head>
<body>

	

<?php
ini_set('display_errors', '0');
ini_set('display_startup_errors', '0');
error_reporting(E_ALL);
date_default_timezone_set('Asia/Ho_Chi_Minh');
$date = date("H:i d/m/Y");
$k = isset($_GET['k']) ? $_GET['k'] : Đã;
$edit = isset($_POST['edit']) ? $_POST['edit'] : chưa;
$mgd = isset($_POST['mgd']) ? $_POST['mgd'] : null;
$ytb = isset($_POST['ytb']) ? $_POST['ytb'] : null;
$gmail = isset($_POST['gmail']) ? $_POST['gmail'] : null;


//sau khi post không còn biến code nên không get nội dung file được nên để $mgd vào để gọi file sau khi post vẫn hiện
$code = isset($_GET['c']) ? $_GET['c'] : $mgd;
include 'khach/'.$code.'.php';
include 'youtube/'.$ytb.'.php';
$v = $ytb;
include 'sale.php';
// nếu chưa có biến $file 
if(!isset($file))
{$file = 'Đã Xử Lý xong và xoá khỏi hệ thống';$bg='#f00';$xuly='Đơn này đã xử lý, kiểm tra email của bạn để xem kết quả';$mgd=$code;}
if ($xn=='NO'){$tinhtrang='<b style="color:#f00">Đang xử lý</b>';
$capnhat = 'Thời gian tạo đơn';
$linktai='https://kinemastercode.000webhostapp.com/checkhinh.php?c='.$mgd.'';
$kiemtra= 'Link kiểm tra đơn hàng';
$xuly='Đơn của bạn sẽ được xử lý trong vòng 24h';$bg='#f49321';$detai = 'Nhấn vào đây Để Kiểm Tra';$mua='Mua Dự Án';$hienthianh='<p style="text-align:center"><img src="'.$imgxm.'" width="30%" loading="lazy" id="phongto"></p>';
}

else if($xn=='YES'){$tinhtrang='<b style="color:green">Đã xử lý</b>';$capnhat = 'Cập nhật đơn';
$linktai=''.$link.'';
$kiemtra= 'Link Tải dự án';
$linktai2='<li style="font-size:6px"><code>'.$link.'</code></li>';
$detai = 'Nhấn vào Đây Để Tải xuống';
$thanhcong =' THÀNH CÔNG';
$xuly='Đơn của bạn Đã Được xử lý';$bg='green';$mua='Mua Thành Công';;$hienthianh='';
}

if ($edit=='socnhi'){
$tinhtrang='<b style="color:green">Đã xử lý</b>';$capnhat = 'Cập nhật đơn';
$linktai=''.$link.'';
$kiemtra= 'Link Tải dự án';
$linktai2='<li style="font-size:6px"><code>'.$link.'</code></li>';
$detai = 'Nhấn vào Đây Để Tải xuống';
$thanhcong =' THÀNH CÔNG';
$xuly='Đơn của bạn Đã Được xử lý';$bg='green';$mua='Mua Thành Công';
$xn='YES';;$hienthianh='';

$myfile = fopen("khach/$mgd.php", "w") or die("Unable to open file!");
//xuống dòng txt dùng '1 phẩy' php dùng "để thêm biến $ không bị mất"
$bien1 = '$mgd';
$bien2 = '$ytb';
$bien3 = '$gmail';
$bien4 = '$date';
$bien5 = '$xn';
$bien6 = '$imgxm';

$txt = "<?php\n$bien1 = '$mgd';\n$bien2 = '$ytb';\n$bien3 = '$gmail';\n$bien4 = '$date';\n$bien6 = '$imgxm';\n$bien5 = 'YES';\n?>";
fwrite($myfile, $txt);
fclose($myfile);}

else if ($edit=='xoa')
{
$tinhtrang='<b style="color:#f00">Đã Bị Hủy</b>';
$capnhat = 'Thời gian hủy';
$linktai='https://kinemastercode.000webhostapp.com/checkhinh.php?c='.$mgd.'';
$kiemtra= 'Bạn hãy Thanh toán đúng để được duyệt';
$xuly='Đơn của bạn đã bị hủy do chưa thanh toán đúng';$bg='#f00';$detai = 'Đơn Không Được Duyệt';$mua='Mua Không Thành Công';$hienthianh='<p style="text-align:center"><img src="'.$imgxm.'" width="30%" loading="lazy" id="phongto"></p>';$thanhcong =' KHÔNG THÀNH CÔNG';
unlink("khach/$mgd.php");
}


$noidung= '<div style="margin:0;padding:0;background:#f0f0ef">
<table border="0" cellpadding="0" cellspacing="0" width="100%" style="padding-top:40px;padding-bottom:35px;background:url("https://kinemastercode.000webhostapp.com/img/bgemail.jpg")">
<tbody>
<tr><td><div style="min-width:100%;margin:0 auto;max-width:670px;width:100%;background:url("https://kinemastercode.000webhostapp.com/img/border-top-email.png") no-repeat #fff;height:10px"></div></td></tr>
<tr>
<td>
<table align="center" style="min-width:100%;width:100%;max-width:670px;text-align:center;padding-top:15px;background:#fff">
<tbody><tr>
<td>
<table style="width:100%;max-width:390px;margin:0 auto">
<tbody><tr>
<td width="20%">
<img src="https://kinemastercode.000webhostapp.com/img/logo.png" alt="hocmai" width="100">
</td>
<td width="80%" style="text-align:center;font-family:Arial,sans-serif;vertical-align:bottom">
<div style="color:'.$bg.';font-size:20px;font-weight:bold">KINEMASTER TEMPLATE</div>
<div style="color:#000000;font-size:18px">THÔNG BÁO MUA DỰ ÁN '.$thanhcong.'</div>
</td>
</tr>
</tbody></table>
</td>
</tr>

</tbody></table>
</td>
</tr>

<tr>
<td>
<table style="min-width:100%;width:100%;max-width:713px;border-collapse:collapse;margin:0 auto;text-align:center;line-height:32px;font-family:Arial,sans-serif;font-weight:bold">
<tbody><tr>
<td width="22" style="padding:0"><div style="width:22px;height:62px;"></div></td>
<td style="width:100%;max-width:760px;padding:0;vertical-align:bottom;background:#fff">
<table style="width:100%;border-collapse:collapse">

<tbody><tr><td style="font-size:18px;color:#fff;background:'.$bg.';padding:0;text-align:center;height:46px">CÁM ƠN BẠN ĐÃ MUA DỰ ÁN!</td>
</tr></tbody></table>
</td>
<td width="22" style="padding:0"><div style="width:22px;height:62px;"></div></td>
</tr>
</tbody></table>
</td>
</tr>

<tr>
<td>
<table align="center" style="width:100%;max-width:670px;background:#ffffff;padding-top:40px;padding-left:40px;padding-right:40px;padding-bottom:40px">
<tbody>
<tr>
<td style="color:'.$bg.';font-family:Arial,sans-serif;font-size:24px;text-align:center;font-weight:bold">'.$file.'<p><img src="'.$img.'" width="50%" loading="lazy"></p></td>
</tr>
<tr><td style="padding-bottom:30px;color:#f7a51c;font-family:Arial,sans-serif;font-size:18px;text-align:center;font-weight:bold;font-style:italic"></td>
</tr><tr>
<td style="padding:0 10px 20px 10px;color:#373636;font-family:Arial,sans-serif;font-size:16px;line-height:20px"><p>Giá Tiền : '.$giamgia.'</p><p>Mã giao dịch: <b>'.$mgd.'</b></b></p>'.$hienthianh.'<ul><li>Tình trạng: '.$tinhtrang.'</li><li>'.$capnhat.' : '.$date.'</li><li>'.$kiemtra.':</li>'.$linktai2.'<li><a style="box-shadow:inset 0px 1px 0px 0px #97c4fe;
	background:linear-gradient(to bottom, #3d94f6 5%, #1e62d0 100%);
	background-color:#3d94f6;
	border-radius:6px;
	border:1px solid #337fed;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:bold;
	padding:6px 24px;
	text-decoration:none;
	text-shadow:0px 1px 0px #1570cd;" href="'.$linktai.'" target="_blank">'.$detai.'</a></li></ul><p>'.$xuly.'</p><p><i>Thân mến!</i></p></td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td>

</td>
<td>
</td></tr><tr>
<td>
<table align="center" style="width:100%;max-width:670px;background:#0072bc;padding-top:11px;padding-bottom:10px;border-bottom:1px solid #bbd9ed;border-top:1px solid #bbd9ed">
<tbody><tr>
<td width="105"></td>
<td width="60" style="color:#fff;font-size:14px;font-family:Arial,sans-serif">Theo
dõi:</td>
<td width="40" style="text-align:center">
<a href="https://facebook.com/kinemaster.template" target="_blank">
<img src="https://kinemastercode.000webhostapp.com/img/facebook.png">
</a>
</td>
<td width="40" style="text-align:center">
<a href="https://youtube.com/kinemaster_template" target="_blank">
<img src="https://kinemastercode.000webhostapp.com/img/unnamed_youtube.png">
</a>
</td>
<td width="94"></td>
<td width="50" style="color:#fff;font-size:14px;font-family:Arial,sans-serif">Hỗ
trợ:</td>
<td width="40" style="text-align:center">
<a href="https://m.me/kinemaster.template" target="_blank" data-saferedirecturl="#">
<img src="https://kinemastercode.000webhostapp.com/img/unnamed_hotro.png">
</a>
</td>
<td width="140"></td>
</tr>
</tbody></table>
</td>
</tr>
<tr>
<td>
<table style="width:100%;max-width:670px;border-collapse:collapse;background:#0072bc;margin:0 auto">
<tbody><tr>
<td style="padding-top:15px">
<div style="width:100%;height:10px;background:url("https://kinemastercode.000webhostapp.com/img/border-bottom-email.png") no-repeat"></div>
</td>
</tr>
</tbody></table>
</td>
</tr>
</tbody>
</table>
</div>';
$noidung= str_replace("\r\n",'',$noidung);
$tieude = ''.$mua.' '.$file.'';
echo ''.$noidung.'';
if ($edit=='socnhi' or $edit=='xoa'){
include 'func.php';
$guimail= sendMail($tieude,$noidung,'KineMaster Template',$gmail,$diachicc='kusdinks@gmail.com');
if(!$guimail){echo 'nếu lỗi thì hiện code trong này';}
}
if ($k=='socnhi'){
echo '<form action="checkhinh.php" method="post">
<input type="text" name="mgd" value="'.$mgd.'" placeholder="Nhập Mã giao dịch">
<input type="text" name="gmail" value="'.$gmail.'" placeholder="Nhập gmail hoặc SĐT">
<input type="hidden" name="ytb" value="'.$ytb.'" placeholder="youtube"><br />
<input type="radio" name="edit" value="socnhi" checked="checked" />Ok <input type="radio" name="edit" value="xoa">Xoá <div class="giua"><input type="submit" value="Xác Nhận" class="nut50"></div></form>';}
?>


<div style="display:none">

	
</body>
</html>