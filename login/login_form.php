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
    <title>unicef_login</title>
    <link rel="stylesheet" href="../common/css/common.css">
    <link rel="stylesheet" href="css/login.css">
    <script src="../common/js/jquery-1.12.4.min.js"></script>
    <script src="../common/js/jquery-migrate-1.4.1.min.js"></script>
    <script src="https://kit.fontawesome.com/e7f93bc32d.js" crossorigin="anonymous"></script>
    <script src="log_in.js"></script>
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
           <div>
             <div class="log_in">
                 <h2>LOG-IN</h2>
               <p>유니세프를 방문해주셔서 감사합니다</p>
               <ul>
                    <li>
                       <label for="id"><input type="text" name="id" id="id" class="login_input"  placeholder="아이디"></label>
                        
                    </li>
                    <li>
                       <label for="pass"><input type="password" name="pass"  id="pass" class="login_input"  placeholder="비밀번호"></label>
                        <a href="#none" title="비밀번호 숨기기" id="lock">
                            <i class="fas fa-lock" aria-hidden="true"></i>
                        </a>
                     </li>
                     <li>
                         <input type="submit" id="login_button" title="로그인" value="로그인">
                     </li>
                </ul>
             </div>
                <div class="visual">
                   <div class="gallery">
                    <ul>
                        <li><a href="javascript:void(0);"></a><img src="images/gal01.jpg" alt=""></li>
                        <li><a href="javascript:void(0);"></a><img src="images/gal02.jpg" alt=""></li>
                        <li><a href="javascript:void(0);"></a><img src="images/gal03.jpg" alt=""></li>
                    </ul>
                    </div>
                    <p>아이들의 웃음을 지켜주세요</p>	
               </div> 
               <div class="dock">
                        <span class="ps"></span>
                        <span class="mbutton btn1"></span>
                        <span class="mbutton btn2"></span>
                        <span class="mbutton btn3"></span>    
                </div>   
            </div>
            <div>
               <p>아직 회원이 아니신가요?</p>
               <a href="../member/join.html"><i class="fas fa-users"></i> 회원가입</a>
            </div>	<!-- end of form_login -->
	    </form>
	</article> <!-- end of col2 -->
</div>
</body>
</html>