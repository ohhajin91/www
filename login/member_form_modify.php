<?
    session_start();

    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>회원가입</title>
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&family=Nanum+Myeongjo:wght@400;700;800&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="../common/css/common.css">
    <link rel="stylesheet" href="../member/css/member_form.css">
    
	<script src="../common/js/jquery-1.12.4.min.js"></script>
	<script src="../common/js/jquery-migrate-1.4.1.min.js"></script>
	 <script src="https://kit.fontawesome.com/e7f93bc32d.js" crossorigin="anonymous"></script>
	<script>
   function check_nick()
   {
     window.open("../member/check_nick.php?nick=" + document.member_form.nick.value,
         "NICKcheck",
          "left=200,top=200,width=250,height=100,scrollbars=no,resizable=yes");
   }

   function check_input()
   {
      if (!document.member_form.pass.value)
      {
          alert("비밀번호를 입력하세요");    
          document.member_form.pass.focus();
          return;
      }

      if (!document.member_form.pass_confirm.value)
      {
          alert("비밀번호확인을 입력하세요");    
          document.member_form.pass_confirm.focus();
          return;
      }

      if (!document.member_form.name.value)
      {
          alert("이름을 입력하세요");    
          document.member_form.name.focus();
          return;
      }

      if (!document.member_form.nick.value)
      {
          alert("닉네임을 입력하세요");    
          document.member_form.nick.focus();
          return;
      }

      if (!document.member_form.hp2.value || !document.member_form.hp3.value )
      {
          alert("휴대폰 번호를 입력하세요");    
          document.member_form.nick.focus();
          return;
      }

      if (document.member_form.pass.value != 
            document.member_form.pass_confirm.value)
      {
          alert("비밀번호가 일치하지 않습니다.\n다시 입력해주세요.");    
          document.member_form.pass.focus();
          document.member_form.pass.select();
          return;
      }

      document.member_form.submit();
   }

   function reset_form()
   {
      document.member_form.id.value = "";
      document.member_form.pass.value = "";
      document.member_form.pass_confirm.value = "";
      document.member_form.name.value = "";
      document.member_form.nick.value = "";
      document.member_form.hp1.value = "010";
      document.member_form.hp2.value = "";
      document.member_form.hp3.value = "";
      document.member_form.email1.value = "";
      document.member_form.email2.value = "";
	  
      document.member_form.id.focus();

      return;
   }
</script>
</head>
<?
    //$userid='aaa';
    
    include "../lib/dbconn.php";

    $sql = "select * from member where id='$userid'";
    $result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);
    //$row[id]....$row[level]

    $hp = explode("-", $row[hp]);  //000-0000-0000
    $hp1 = $hp[0];
    $hp2 = $hp[1];
    $hp3 = $hp[2];

    $email = explode("@", $row[email]);
    $email1 = $email[0];
    $email2 = $email[1];

    mysql_close();
?>
<body>
	 
<article id="content">  
    <h1><a href="../index.html">유니세프로고</a></h1>
    <h2>회원정보수정</h2>
    <form  name="member_form" method="post" action="modify.php">
        <p><span>*</span> 모든 항목이 필수항목 입니다.</p> 
         <ul>
             <li>
                 <dl>
                    <dt>
                        <label for="id" class="hidden">아이디</label>
                    </dt>
                    <dd>
                         <?= $row[id] ?>
                    </dd>
                </dl>
             </li>
            <li>
                <dl>
                    <dt>
                        <label for="pass" class="hidden">비밀번호</label>
                    </dt>
                    <dd>
                         <input type="password" name="pass" value="" id="pass" placeholder="비밀번호" required>
                         <span id="loadtext3"></span>
                    </dd>
                </dl>  
            </li>
            <li>
                <dl>
                    <dt>
                        <label for="pass_confirm" class="hidden">비밀번호확인</label>
                    </dt>
                    <dd>
                        <input type="password" name="pass_confirm" value="" id="pass_confirm" placeholder="비밀번호 확인" onkeyup="passCheck()" required="">
                        <span id="passtext">비밀번호를 다시 입력해주세요</span>
                        <a href="#none" title="비밀번호 표시" id="lock"><i class="fas fa-lock"></i></a>
                    </dd>
                </dl> 
            </li>
            <li>
               <dl>
                    <dt><label for="name" class="hidden">이름</label></dt>
                    <dd>
                        <input type="text" name="name" value="<?= $row[name] ?>"> 
                    </dd>
                </dl> 
            </li>
            <li>
                <dl>
                    <dt><label for="nick" class="hidden">닉네임</label></dt>
                    <dd>
                         <input type="text" name="nick" value="<?= $row[nick] ?>">
                    </dd>
                </dl>
            </li>
            <li>
                <dl>
                    <dt class="hidden">휴대폰 <span>*</span></dt>
                    <dd>
                        <input type="text" class="hp" name="hp1" value="<?= $hp1 ?>"> 
             - <input type="text" class="hp" name="hp2" value="<?= $hp2 ?>"> - <input type="text" class="hp" name="hp3" value="<?= $hp3 ?>">
                    </dd>
                </dl>
            </li>
            <li>
               <dl>
                    <dt class="hidden">이메일</dt>
                    <dd>
                      <input type="text" id="email1" name="email1" value="<?= $email1 ?>"> @ <input type="text" name="email2" 
			           value="<?= $email2 ?>">
                   </dd>
                </dl> 
            </li>
            <li>
               <dl>
                    <dt></dt>
                    <dd>
                        <a href="#" onclick="check_input()">수정완료</a>
                         <a href="#" onclick="reset_form()">다시쓰기</a>
                    </dd>
                </dl>
            </li>
         </ul>
	 </form>
	  
	</article>
	
</body>
</html>


