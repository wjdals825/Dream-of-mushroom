<?php
// 회원가입과 회원수정을 위한 페이지
include("./database.php");


// 세션이 있고, 회원수정 mode이면 회원 정보를 가져옴
if(isset($_SESSION['user_id']) && $_GET['mode'] == 'modify')
{
    $mb_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM user WHERE user_id = '$user_id'";
    $result = mysqli_query($conn, $sql);
    $mb = mysqli_fetch_assoc($result);
    mysqli_close($conn);

    $mode = "modify";
    $title = "회원수정";
    $modify_mb_info = "readonly";
}
else
{
    $mode = "insert";
    $title = "회원가입";
    $modify_mb_info = '';
}
?>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=0.8">
        <title>능희의 꿈_회원가입</title>
        <div class="inner_register">
            <div class="register_tistory">
                <link rel="stylesheet" href="./register.css?ver=1">
    </head>
    <body>
    <fieldset>
        <legend class="screen_out">회원가입 정보 입력폼</legend>
        <div class="text_center.register">회원가입</div>
            <div class="text_center.title">똑똑한 일정관리의 시작</div>
        <div class="box_register">
            <div class="inp_text">
            <label for="registerId" class="screen_out">아이디</label>
            <input type="email" id="registerId" name="registerId" placeholder="아이디" >
            </div>
            <div class="inp_text">
            <label for="registerPw" class="screen_out">비밀번호</label>
            <input type="password" id="registerPw" name="password" placeholder="비밀번호" >
            </div>
            <div class="inp_text">
            <label for="registerPwChk" class="screen_out">비밀번호 확인</label>
            <input type="password" id="registerPwchk" name="password" placeholder="비밀번호 확인" >
            </div>
            <div class="inp_text">
            <label for="registerName" class="screen_out">이름</label>
            <input type="text" id="registerName" name="name" placeholder="이름" >
            </div>
            <div class="inp_text">
            <label for="registerEmail" class="screen_out">이메일</label>
            <input type="email" id="registerEmail" name="email" placeholder="이메일" >
            </div>
        </div>
        <div class="btn-group">
        <button type="reset" id="button1">재입력</button>
        <button type="button" id="button2"><a href="./newregister.php">회원가입</button>

        </div>
    </fieldset>
</div>
    <br>
        <div class="text_center.login1">ID가 이미 있으신가요?</div><div class="text_center.login2"><a href="./login.php">로그인</a>
    </body>
</html>