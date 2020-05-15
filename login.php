<?php
include("./database.php");
?>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=0.8">
        <title>능희의 꿈_로그인</title>
        
    </head>
    <body>
        
        <div class="inner_login">
            <div class="login_tistory">
            <link rel="stylesheet" href="./login.css?ver=1">
                    <fieldset>
                    <legend class="screen_out">로그인 정보 입력폼</legend>
                    <div class="text_center.title">Login</div>
                    <div class="text_center.login">반갑습니다!</div>
                    <div class="box_login">
                        <div class="inp_text">
                        <label for="loginId" class="screen_out"><img src="img/login_id.png">아이디</label>
                        <input type="email" id="loginId" name="loginId" placeholder="ID" >
                        </div>
                        <div class="inp_text">
                        <label for="loginPw" class="screen_out">비밀번호</label>
                        <input type="password" id="loginPw" name="password" placeholder="Password" >
                        </div>
                    </div>
                    <div class="btn-group">
                        <button type="button"><a href="./newregister.php">로그인</button> <!-- 주소 안가게 하려면 disabled -->
                    </div>
                    <div class="login_append">
                        <div class="inp_chk"> <!-- 체크시 checked 추가 -->
                        <input type="checkbox" id="keepID" class="ico_check inp_radio"  name="keepID">
                        <label for="keepID" class="lab_g">
                <span class="img_top ico_check"></span>
                <span class="txt_lab">아이디 저장</span>
                </label>
                        </div>
                        <span class="txt_find">
                        <a href="find_loginId.html" class="link_find">ID찾기</a>
                            /
                        <a href="find_password.html" class="link_find">비밀번호 찾기</a>
                        </span>
                    </div>
                    </fieldset>
                </form>
            </div>
            <br>
            <div class="text_center.register1">신규회원 이신가요?</div><div class="text_center.register2"><a href="register.php">회원가입</a></div>
        </div>
    </body>
</html>