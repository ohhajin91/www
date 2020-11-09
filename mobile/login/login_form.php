<?
	session_start();
    @extract($_GET); 
    @extract($_POST); 
    @extract($_SESSION); 
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&family=Nanum+Myeongjo:wght@400;700;800&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="login.css">
    <script src="https://kit.fontawesome.com/e7f93bc32d.js" crossorigin="anonymous"></script>
    <script src="../js/jquery-1.12.4.min.js"></script>
	<script src="../js/jquery-migrate-1.4.1.min.js"></script>
	 <script src="https://kit.fontawesome.com/e7f93bc32d.js" crossorigin="anonymous"></script>
    <script src="../../login/log_in.js"></script>
    <script>
         function cancle(){
            history.go(-1);
        }
    </script>
</head>
    
<body>
<div id="wrap">
	<article id="content">
        <h1><a href="../index.html">유니세프</a></h1>
        <a href="#none" class="close" onclick="cancle()"><i class="fas fa-times"></i></a>
        <form  name="member_form" method="post" action="login.php"> 
            <ul>
                <li>
                   <label for="id" class="hidden">아이디</label>
                    <input type="text" name="id" class="login_input"  placeholder="아이디">
                </li>
                <li>
                   <label for="pass" class="hidden">비밀번호</label>
                    <input type="password" name="pass" class="login_input"  placeholder="비밀번호">
                    <a href="#none" title="비밀번호 숨기기" id="lock">
                        <i class="fas fa-lock" aria-hidden="true"></i>
                    </a>
                </li>
            </ul>	
            <div>
                <input type="submit" id="login_button" title="로그인" value="로그인">
            </div>
            <div>
               <p>아직 회원이 아닙니까?</p>
               <a href="../member/member_form.php"><i class="fas fa-users"></i> 회원가입</a>
            </div>	<!-- end of form_login -->
	    </form>
	</article> <!-- end of col2 -->
</div>
</body>
</html>