<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="/style.css?t=10" rel="stylesheet">
	<title>Tạo file liên kết</title>
	<style>
.list1:nth-child(odd){background:#101010;margin-top:2px;margin-bottom:1px;border:#323232 solid 1px;padding:2px}.list1:nth-child(even){background:#212121;margin-top:2px;margin-bottom:1px;border:#323232 solid 1px;padding:2px}.xoa{text-decoration: line-through;}.hongnhat{color:#FF95D1}.xanhnhat{color:#CBFF64}.bgdo{background:#f00;color:#fff}input[type="text"]{min-width:50%;margin-bottom:20px;text-align:center;margin:auto}body{font-size:17px;}input[type="text"]:hover{min-width:100%}input[type="submit"],input[type="file"],input[type="email"]{height:50px}.duoi,.tren {
  position: absolute;
}
.giua{text-align:center}.preview img{max-width:30%}
.tab{display:table;width:100%;margin-bottom:12px}.td10,.td25,.td30,.td40,.td50,.td60,.td70,.td5,.td35{display:table-cell;vertical-align:middle}.td25{width:25%}.td30{width:30%;text-align:center}.td5{width:5%}.td35{width:35%}.td40{width:40%}.td50{width:50%}.td60{width:60%}.td70{width:70%}.td90{width:90%}.left{display: flex;}.vang{color:yellow}.xanh{color:#39FF39}.xanhnhat,.vang,.xoa,.hongnhat,.xanhnhat,.tab,.alert{text-shadow: 2px 2px 4px #000000;}.small{font-size:16px}.boder{border-style:solid;border-color:#fff}.xacthuc{color:#71A13D}
.marquee { 
  white-space: nowrap; 
  overflow: hidden;
  animation: marquee 35s linear infinite;
}
.marquee:hover {
  animation-play-state: paused;
}
@-webkit-keyframes marquee {
  0% {text-indent: 100%;}
  100% {text-indent: -900%;}
}

</style>
</head>
<body>
<?php
ini_set('display_errors', '0');
ini_set('display_startup_errors', '0');
error_reporting(E_ALL);

//



date_default_timezone_set('Asia/Ho_Chi_Minh');
$date = date("H:i d/m/Y");
$datevip = date("idhm");
// cilient_id nếu ko up đc ee3d792fcc8b8f8 
$img=$_FILES['img'];
if(isset($_POST['submit'])){ 
 if($img['name']==''){$imgxm='https://i.imgur.com/TJIkxZ1.png';$chuaup = '<p class="xanhnhat">Up Ảnh Chụp Chứng Minh Thanh Toán chưa thành công</p>';
 }else{
  $filename = $img['tmp_name'];
  $client_id="16be936a8df71a7";
  $handle = fopen($filename, "r");
  $data = fread($handle, filesize($filename));
  $pvars   = array('image' => base64_encode($data));
  $timeout = 30;
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, 'https://api.imgur.com/3/image.json');
  curl_setopt($curl, CURLOPT_TIMEOUT, $timeout);
  curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Client-ID ' . $client_id));
  curl_setopt($curl, CURLOPT_POST, 1);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($curl, CURLOPT_POSTFIELDS, $pvars);
  $out = curl_exec($curl);
  curl_close ($curl);
  $pms = json_decode($out,true);
  $url=$pms['data']['link'];
  if($url!=""){$imgxm=$url;
  }else{$imgxm ='Up ảnh ko thành công';
 } 
 }
}
$cati = str_replace('https://', '', $imgxm);
$cati = str_replace('http://', '', $cati);
$cati = str_replace('i.imgur.com', '', $cati);
$cati = str_replace('imgur.com', '', $cati);
$cati = str_replace('.jpg', '', $cati);
$cati = str_replace('.png', '', $cati);
$cati = str_replace('.jpeg', '', $cati);
$cati = str_replace('.gif', '', $cati);
$cati = str_replace('/', '', $cati);
$cati = str_replace('.', '', $cati);
$mgd = ''.$cati.'';

// xu ly
$ytb = isset($_POST['ytb']) ? $_POST['ytb'] : null;
$gmail = isset($_POST['gmail']) ? $_POST['gmail'] : null;

//get biến v nếu ko có v thì lấy biến ytb từ post của $ytb
$v = isset($_GET['v']) ? $_GET['v'] : $ytb;
//Gửi ảnh get đc sau khi post
$gmail = isset($_POST['gmail']) ? $_POST['gmail'] : null;
include 'youtube/'.$v.'.php';
// nếu chưa có biến $file 
if(!isset($file))
{$file = 'Chưa có';}
include 'sale.php';
if ($gmail=='candylove1807@gmail.com' or $gmail=='qaszx05@gmail.com'){$vip='YES';$xulyvip='<b style="color:green">Đã xử lý</b>';$bg='green';$linkvip='<a style="box-shadow:inset 0px 1px 0px 0px #97c4fe;
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
	text-shadow:0px 1px 0px #1570cd;" href="'.$link.'" target="_blank">Nhấn vào để tải</a>';$check24h='Gmail của bạn thuộc tài khoản vip có thể tải toàn bộ style mà không cần xét duyệt';$width='50%';$imgxm='https://i.imgur.com/c6al08D.png';$datecheck='Vip_'.$datevip.'';}else{$vip='NO';$xulyvip='<b style="color:#f00">Đang xử lý</b>';$bg='#f49321';$linkvip='Link kiểm tra đơn hàng: <b><a href="https://kinemastercode.000webhostapp.com/checkhinh.php?c='.$mgd.'" target="_blank" rel="nofollow">Nhấn vào đây</a></b>';$check24h='Đơn của bạn sẽ được xử lý trong vòng 24h nếu hợp lệ';$width='40%';$datecheck=$date;}



if ($mgd){
$myfile = fopen("khach/$mgd.php", "w") or die("Unable to open file!");
//xuống dòng txt dùng '1 phẩy' php dùng "để thêm biến $ không bị mất"
$bien1 = '$mgd';
$bien2 = '$ytb';
$bien3 = '$gmail';
$bien4 = '$datecheck';
$bien5 = '$xn';
$bien6 = '$imgxm';

$txt = "<?php\n$bien1 = '$mgd';\n$bien2 = '$v';\n$bien3 = '$gmail';\n$bien4 = '$date';\n$bien6 = '$imgxm'; \n$bien5 = '$vip';\n?>";
fwrite($myfile, $txt);
fclose($myfile);

//Gửi mail
include 'func.php';

$xacthucemail = ''.$gmail.'';
if (filter_var($xacthucemail, FILTER_VALIDATE_EMAIL)) {$guiqua='Thư vừa Gửi Qua Gmail theo địa chỉ bạn cung cấp';$htmlgmail='Địa chỉ Gmail nhận: '.$gmail.'';
} else {$guiqua='Admin sẽ gửi file vào số điện thoại bạn cung cấp nếu thanh toán hợp lệ';$htmlgmail='SĐT nhận: '.$gmail.'';
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
<div style="color:#000000;font-size:18px">THÔNG BÁO MUA DỰ ÁN</div>
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
<td style="color:#f49321;font-family:Arial,sans-serif;font-size:24px;text-align:center;font-weight:bold">'.$file.'<p><img src="'.$img.'" width="40%" loading="lazy"></p></td>
</tr>
<tr><td style="padding-bottom:30px;color:'.$bg.';font-family:Arial,sans-serif;font-size:18px;text-align:center;font-weight:bold;font-style:italic"></td>
</tr><tr>
<td style="padding:0 10px 20px 10px;color:#373636;font-family:Arial,sans-serif;font-size:16px;line-height:20px"><p>Giá Tiền : '.$giamgia.'</p><p>Mã giao dịch: <b>'.$mgd.'</b></b></p><p style="text-align:center"><img src="'.$imgxm.'" width="'.$width.'" id="phongto"></p><ul><li>Tình trạng: '.$xulyvip.'</li><li>Thời gian tạo đơn: '.$date.'</li><li>'.$linkvip.'</li></ul><p>'.$htmlgmail.'</p><p>'.$check24h.'</p><p><i>Thân mến!</i></p></td>
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
$tieude = 'Mua Dự Án '.$file.'';
$gmailad = 'kusdinks@gmail.com';
//gửi mail $diachicc='' là gmail thứ 2 để trống trong ngoặc để ko gửi email 2
$guimail= sendMail($tieude,$noidung,'KineMaster Template',$gmail,$diachicc='kusdinks@gmail.com');
if(!$guimail){echo 'nếu lỗi thì hiện code trong này';}

echo '<div class="alert"><span class="closebtn" onclick="this.parentElement.style.display=\'none\';">Đóng &times;</span><strong class="vang">Thông Báo!</strong><div class="content"><div><p class="xanhnhat">'.$guiqua.'</p><p class="xanhnhat">'.$gmail.'</p></div></div></div>'.$noidung.'';}
else{echo '<form action="/thanhtoanhinh.php" enctype="multipart/form-data" method="post" id="form2">
<div class="list1 tab"><div class="td50 xacthuc">✅ Hình</div><div class="td50" style="text-align:right"><a class="but" href="/thanhtoan.php?v='.$v.'"> Mã</a></div></div><div class="list1 content"><div>'.$chuaup.'<p class="giua small">'.$file.'<br /><img id="phongto" src="'.$img.'" width="50%" loading="lazy"></p><p>Giá '.$tiengoc.' '.$giamcon.' '.$giamgia.'</p></div></div><div class="list1"><p><span class="xanhnhat">Bạn Chuyển Khoản <b class="bgdo">'.$giamgia.'</b> qua</span></p><div class="tab"><div class="td10"><img src="/img/vcb.png" width="33" height="33" loading="lazy" class="boder"/></div><div class="td40"> <u class="small">VIETCOMBANK</u><br /> <span>0771000601518</span></div><div class="td5"></div><div class="td10"><img src="/img/momo.png" width="33" height="33" loading="lazy" class="boder"/></div><div class="td35"> <u clasd="small">Hoặc MOMO</u><br /> <span>0398421176</span></div></div></div>
<div class="list1">
<p><span class="xanhnhat">Tải lên ảnh chụp chuyển khoản</span></p>
<div style="height:55px">
    <label for="image_uploads" class="custom-btn btn-11 tren" style="min-width:40%"><span>Chọn Ảnh</span></label><input class="duoi" type="file" id="image_uploads" name="img" accept=".jpg, .jpeg, .png"></div><div id="preview" class="preview giua" style="font-size:14px">
    <p>Ấn "chọn ảnh" để Tải ảnh lên</p>
  </div></div>
    <div class="list1"><p><span class="xanhnhat">Nhập Gmail Hoặc số điện thoại nhận file</span></p>
<p><input type="text" name="gmail" value="'.$gmail.'" placeholder="SĐT hoặc GMAIL" required></p>
<input type="hidden" name="ytb" value="'.$v.'" placeholder="youtube">
<p class="giua"><button type="submit" name="submit" class="custom-btn btn-12" id="form2"><span>Đang Gửi!</span><span>Nhập Xong!</span></button></p></div>
</form><div class="marquee">Ưu đãi khách hàng mua 5 dự án: <i class="hongnhat">tặng thêm 1 dự án</i></div>';
} 

?>
<div style="display:none">
<script>
const input = document.querySelector('input');
const preview = document.querySelector('.preview');

input.style.opacity = 0;
input.addEventListener('change', updateImageDisplay);
function updateImageDisplay() {
  while(preview.firstChild) {
    preview.removeChild(preview.firstChild);
  }

  const curFiles = input.files;
  if(curFiles.length === 0) {
    const para = document.createElement('p');
    para.textContent = '🚫 Bạn Chưa Chọn Ảnh chụp Chuyển Khoản';document.getElementById('preview').style.color = '#DC3B31';
    preview.appendChild(para);
  } else {
    const list = document.createElement('ol');
    preview.appendChild(list);

    for(const file of curFiles) {
      const listItem = document.createElement('li');
      const para = document.createElement('p');
      if(validFileType(file)) {
        para.textContent = `✅ Chọn ${file.name}, ${returnFileSize(file.size)}.`;document.getElementById('preview').style.color = '#71A13D';
        const image = document.createElement('img');
        image.src = URL.createObjectURL(file);

        listItem.appendChild(image);
        listItem.appendChild(para);
      } else {
        para.textContent = `❌ File ${file.name}: Không hợp lệ. Hãy Chọn lại đúng ảnh`;document.getElementById('preview').style.color = '#DC3B31';
        listItem.appendChild(para);
      }

      list.appendChild(listItem);
    }
  }
}

  // https://developer.mozilla.org/en-US/docs/Web/Media/Formats/Image_types
const fileTypes = [
  "image/apng",
  "image/bmp",
  "image/gif",
  "image/jpeg",
  "image/pjpeg",
  "image/png",
  "image/svg+xml",
  "image/tiff",
  "image/webp",
  "image/x-icon"
];

function validFileType(file) {
  return fileTypes.includes(file.type);
}
 

 function returnFileSize(number) {
  if(number < 1024) {
    return number + 'bytes';
  } else if(number >= 1024 && number < 1048576) {
    return (number/1024).toFixed(1) + 'KB';
  } else if(number >= 1048576) {
    return (number/1048576).toFixed(1) + 'MB';
  }
}
</script>
</body>
</html>