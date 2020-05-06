<?php
include("./database.php");

$mode = $_POST['mode'];

if($mode != 'insert' && $mode != 'modify') {
	echo "<script>alert('mode 값이 제대로 넘어오지 않았습니다.');</script>";
	echo "<script>location.replace('./register.php');</script>";
	exit;
}

switch ($mode) {
    case 'insert' :
        $mb_id = trim($_POST['user_id']);
		$title = "회원가입";
        break;
    case 'modify' :
        $mb_id = trim($_SESSION['ss_user_id']);
		$title = "회원수정";
        break;
}

$user_id            = trim($_POST['user_id']);
$user_pwd			= trim($_POST['user_pwd']); // 첫번째 입력 패스워드
//$user_pwd_re		= trim($_POST['user_pwd']); // 두번째 입력 패스워드
$user_name				= trim($_POST['user_name']); // 이름
$user_email				= trim($_POST['user_email']); // 이메일
$user_count				= trim($_POST['user_countl']); // 이메일
//$mb_ip					= $_SERVER['REMOTE_ADDR']; // 접속 아이피
//$mb_datetime			= date('Y-m-d H:i:s', time()); // 가입일
$mb_modify_datetime	= date('Y-m-d H:i:s', time()); // 수정일

if (!$user_id) {
	echo "<script>alert('아이디가 넘어오지 않았습니다.');</script>";
	echo "<script>location.replace('./register.php');</script>";
	exit;
}

if (!$user_pwd) {
	echo "<script>alert('비밀번호가 넘어오지 않았습니다.');</script>";
	echo "<script>location.replace('./register.php');</script>";
	exit;
}

if ($user_pwd != $user_pwd) {
	echo "<script>alert('비밀번호가 일치하지 않습니다.');</script>";
	echo "<script>location.replace('./register.php');</script>";
	exit;
}

if (!$user_name) {
	echo "<script>alert('이름이 넘어오지 않았습니다.');</script>";
	echo "<script>location.replace('./register.php');</script>";
	exit;
}

if (!$user_email) {
	echo "<script>alert('이메일이 넘어오지 않았습니다.');</script>";
	echo "<script>location.replace('./register.php');</script>";
	exit;
}

$sql = " SELECT PASSWORD('$user_pwd') AS pass "; // 입력한 비밀번호를 MySQL password() 함수를 이용해 암호화
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$mb_password = $row['pass'];

if($mode == "insert") { // 신규 등록 상태

	$sql = " SELECT * FROM user WHERE user_id = '$user_id' "; // 회원가입을 시도하는 아이디가 사용중인 아이디인지 체크
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) { // 만약 사용중인 아이디라면 알림창을 띄우고 회원가입 페이지로 이동
		echo "<script>alert('이미 사용중인 회원아이디 입니다.');</script>";
		echo "<script>location.replace('./06등록.php');</script>";
		exit;
	}

	$sql = " INSERT INTO user
				SET user_id = '$user_id',
					 user_pwd = '$user_pwd',
					 user_name = '$user_name',
					 user_email = '$user_email',
					 ";
	$result = mysqli_query($conn, $sql);

} else if ($mode == "modify") { // 회원 수정 상태

	$sql = " UPDATE user
				SET user_id = '$user_id',
                	user_pwd = '$user_pwd',
                	user_name = '$user_name',
                	user_email = '$user_email',
			 WHERE user_id = '$user_id' ";
	$result = mysqli_query($conn, $sql);
}

if ($result) {

// 	if($mode == "insert") { // 신규 가입의 경우 무조건 메일 인증확인 메일 발송
// 		// include_once('./02라이브러리.php');

// 		$mb_md5 = md5(pack('V*', rand(), rand(), rand(), rand()));

// 		$sql = " UPDATE member SET mb_email_certify2 = '$mb_md5' WHERE mb_id = '$mb_id' "; // 회원가입을 시도하는 아이디에 메일 인증을 위한 일회용 난수를 업데이트
// 		$result = mysqli_query($conn, $sql);
// 		mysqli_close($conn); // 데이터베이스 접속 종료

// 		$certify_href = 'http://localhost/새/09메일인증.php?&amp;mb_id='
//             . $mb_id
//             . '&amp;mb_md5='
//             . $mb_md5;

// 		$subject = '인증확인 메일입니다.'; // 메일 제목

// 		ob_start();
// 		include_once ('./08회원인증메일.php');
// 		$content = ob_get_contents(); // 메일 내용
// 		ob_end_clean();

//         $mail_from = "potenlove@naver.com";
// 		$mail_to = $mb_email;

// 		mailer('관리자', $mail_from, $mail_to, $subject, $content); // 메일 전송
// 	}

	echo "<script>alert('".$title."이 완료 되었습니다.\\n신규가입의 경우 메일인증을 받으셔야 로그인 가능합니다.');</script>";
	echo "<script>location.replace('./login.php');</script>";
	exit;
} else {
	echo "생성 실패: " . mysqli_error($conn);
	mysqli_close($conn); // 데이터베이스 접속 종료
}
?>