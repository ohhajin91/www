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
	 $(document).ready(function() {
  
         $("#id").keyup(function() {    
            var id = $('#id').val();

            $.ajax({
                type: "POST",
                url: "check_id.php",
                data: "id="+ id,  
                cache: false, 
                success: function(data)
                {
                     $("#loadtext").html(data); 
                }
            });
        });

        //nick 중복검사		 
        $("#nick").keyup(function() {   
            var nick = $('#nick').val();

            $.ajax({
                type: "POST",
                url: "check_nick.php",
                data: "nick="+ nick,  
                cache: false, 
                success: function(data)
                {
                     $("#loadtext2").html(data);
                }
            });
        });		
         
         
         
         $('#lock').toggle(function(){
                 $(this).find('.fa-lock').attr('class', 'fas fa-lock-open');
                 $('#pass').attr('type','text');
                  $('#lock').attr('title','비밀번호 숨기기');
             }, function(){
                 $(this).find('.fa-lock-open').attr('class', 'fas fa-lock');
                 $('#pass').attr('type','password');
                  $('#lock').attr('title','비밀번호 표시');
             });    
        });
	</script>
	<script> 
        
      function pass1() {
       var passw = document.member_form.pass.value;
       var ret4;
       for(var o=0; o<passw.length; o++) {
           ret4 = passw.charCodeAt(o)
       }
          
          if(!ret4) {
              $('#loadtext3').text("");
          return;
        } 
       
       if(!(ret4>=97 && ret4<=122 || ret4 >=65 && ret4 <=90 || ret4 >=48 && ret4<= 57)) {
           $('#loadtext3').text('비밀번호는 영문, 숫자로만 구성되어 있어야 합니다');
           $('#loadtext3').css('color','#fe4365');
           document.member_form.pass.value = "";
           document.member_form.pass.focus();
            
          return;
       }
          
     }   
       function passCheck() {

           if(!document.member_form.pass_confirm.value) {
              $('#passtext').text('비밀번호를 확인하세요');
               $('#passtext').css('color','#fe4365');
              return; 
           }
           
           
          if (document.member_form.pass.value != 
                document.member_form.pass_confirm.value)
          {
              $('#passtext').text('!비밀번호가 다릅니다');
              $('#passtext').css('color','#fe4365');
              return;
          }
           
           if (document.member_form.pass.value == 
                document.member_form.pass_confirm.value)
          {
              $('#passtext').text('비밀번호가 일치합니다');
              $('#passtext').css('color','green');
              return;
          }
           
       }
        
        
        function hpCheck1() {
           var inText = document.member_form.hp2.value;
           var ret;
 

           for(var i=0; i<inText.length; i++) {
               ret = inText.charCodeAt(i);
           }

            if(!inText) {
                $('#hptext1').text("");
              return;
            }

           if(!(ret>=48 && ret<=57)) {
               $('#hptext1').text("숫자만 입력 가능합니다");
               $('#hptext1').css('color', '#fe4365');
               document.member_form.hp2.focus();
              return;
           }
            
            if(ret>=48 && ret<=57) {
               $('#hptext1').text("");
              return;
           }

        }
        
        
        function hpCheck2() {
           var inText2 = document.member_form.hp3.value;
           var ret2;


           for(var j=0; j<inText2.length; j++) {
               ret2 = inText2.charCodeAt(j);
           }
            
            if(!inText2) {
                $('#hptext2').text("");
              return;
            }


           if(!(ret2>=48 && ret2<=57)) {
               $('#hptext2').text("숫자만 입력 가능합니다");
               $('#hptext2').css('color', '#fe4365');
              document.member_form.hp3.focus();
              return;
           }
            
            if(ret>=48 && ret<=57) {
               $('#hptext2').text("");
              return;
           }
            
        }
     function getSelectValue(frm)
       {
           frm.email2.value = frm.email3.options[frm.email3.selectedIndex].value;
       }      
        
        
    function emailCheck() {
            var emailID = document.member_form.email1.value;
       var ret3;
       for(var k=0; k<emailID.length; k++) {
           ret3 = emailID.charCodeAt(k)
       }
            
        if(!ret3) {
              $('#emailtext').text("");
          return;
        }    
       
       if(!(ret3>=97 && ret3<=122 || ret3 >=65 && ret3 <=90 || ret3 >=48 && ret3<= 57)) {
           $('#emailtext').text("영문, 숫자로만 구성되어야 합니다");
           $('#emailtext').css('color', '#fe4365');
           document.member_form.email1.focus();
          return;
       }
            
        if(ret3>=97 && ret3<=122 || ret3 >=65 && ret3 <=90 || ret3 >=48 && ret3<= 57) {
           $('#emailtext').text("");
          return;
       }    
            
        }
     
        
   function check_input()
   {
      if (!document.member_form.id.value)
      {
          alert("아이디를 입력하세요");    
          document.member_form.id.focus();
          return;
      } 
       var id1 = document.member_form.id.value;
       var ret5;
       for(var a=0; a<id1.length; a++) {
           ret5 = id1.charCodeAt(o)
       }
      
         if (document.member_form.id.value.length>8)  {
          alert("아이디를 8자 이내로 다시 입력하세요");  
          document.member_form.id.value="";  
          document.member_form.id.focus();   
          return;
      }
       
       
      if (!document.member_form.pass.value)
      {
          alert("비밀번호를 입력하세요");    
          document.member_form.pass.focus();
          return;
      }
       var pass1 = document.member_form.pass.value;
       var ret4;
       for(var o=0; o<pass1.length; o++) {
           ret4 = pass1.charCodeAt(o)
       }
       
       if(!(ret4>=97 && ret4<=122 || ret4 >=65 && ret4 <=90 || ret4 >=48 && ret4<= 57)) {
           alert('비밀번호는 영문, 숫자로만 구성되어 있어야 합니다');
           document.member_form.pass.value = "";
           document.member_form.pass.focus();
            
          return;
       }
       

      if (!document.member_form.pass_confirm.value)
      {
          alert("비밀번호 확인을 입력하세요");    
          document.member_form.pass_confirm.focus();
          return;
      }
       
       if (document.member_form.pass.value != 
                document.member_form.pass_confirm.value)
          {
             alert("비밀번호 확인을 다시 입력하세요");
              document.member_form.pass_confirm.value = "";
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
       
       
       var inText = document.member_form.hp2.value;
           var ret;
 

           for(var i=0; i<inText.length; i++) {
               ret = inText.charCodeAt(i);
           }
       
        if(!(ret>=48 && ret<=57)) {
               alert("휴대폰 중간자리는 숫자만 입력 가능합니다");
            document.member_form.hp2.value = "";
               document.member_form.hp2.focus();
            
              return;
           }
       
       
       var inText2 = document.member_form.hp3.value;
           var ret2;


           for(var j=0; j<inText2.length; j++) {
               ret2 = inText2.charCodeAt(j);
           }
            
  
           if(!(ret2>=48 && ret2<=57)) {
               alert("휴대폰 뒷자리는 숫자만 입력 가능합니다");
               document.member_form.hp3.value = "";
              document.member_form.hp3.focus();
              return;
           }
       
       
       
       if (!document.member_form.email1.value || !document.member_form.email2.value )
      {
          alert("이메일 주소를 입력하세요");    
          document.member_form.email1.focus();
          return;
      }
       
       
       var emailID = document.member_form.email1.value;
       var ret3;
       for(var k=0; k<emailID.length; k++) {
           ret3 = emailID.charCodeAt(k)
       }
       
       if(!(ret3>=97 && ret3<=122 || ret3 >=65 && ret3 <=90 || ret3 >=48 && ret3<= 57)) {
           alert('이메일 주소는 영문, 숫자로만 구성되어 있어야 합니다');
           document.member_form.email1.value = "";
           document.member_form.email1.focus();
            
          return;
       }
       
       
        
       var emailID2 = document.member_form.email2.value;
       
  
     dotpos = emailID2.lastIndexOf("."); 

     if (dotpos < 1 )   
   {
       alert("제대로 된 이메일 형식을 입력하세요");
       document.member_form.email2.focus() ; 
       return ;
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
<body>
	 
<article id="content">  
    <h1><a href="../index.html">유니세프로고</a></h1>
    <h2>회원가입 <span>Sign-up</span></h2>
    <form  name="member_form" method="post" action="insert.php">
        <p><span>*</span> 모든 항목이 필수항목 입니다.</p> 
         <ul>
             <li>
                 <dl>
                    <dt>
                        <label for="id" class="hidden">아이디</label>
                    </dt>
                    <dd>
                         <input type="text" name="id" id="id" placeholder="아이디 (8자이내로 입력)" onkeyup="underEight()" maxlength="8" required>
                         <span id="loadtext"></span>
                    </dd>
                </dl>
             </li>
            <li>
                <dl>
                    <dt>
                        <label for="pass" class="hidden">비밀번호</label>
                    </dt>
                    <dd>
                         <input type="password" name="pass" id="pass" placeholder="비밀번호" onkeyup="pass1()" required>
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
                        <input type="password" name="pass_confirm" id="pass_confirm" placeholder="비밀번호 확인" onkeyup="passCheck()" required="">
                        <span id="passtext">비밀번호를 다시 입력해주세요</span>
                        <a href="#none" title="비밀번호 표시" id="lock"><i class="fas fa-lock"></i></a>
                    </dd>
                </dl> 
            </li>
            <li>
               <dl>
                    <dt><label for="name" class="hidden">이름</label></dt>
                    <dd>
                        <input type="text" name="name" id="name" placeholder="이름" required> 
                    </dd>
                </dl> 
            </li>
            <li>
                <dl>
                    <dt><label for="nick" class="hidden">닉네임</label></dt>
                    <dd>
                         <input type="text" name="nick" id="nick" placeholder="닉네임" required>
                         <span id="loadtext2"></span>
                    </dd>
                </dl>
            </li>
            <li>
                <dl>
                    <dt class="hidden">휴대폰 <span>*</span></dt>
                    <dd>
                        <label class="hidden" for="hp1">전화번호앞3자리</label>
                        <select class="hp" name="hp1" id="hp1"> 
                          <option value='010'>010</option>
                          <option value='011'>011</option>
                          <option value='016'>016</option>
                          <option value='017'>017</option>
                          <option value='018'>018</option>
                          <option value='019'>019</option>
                        </select>  - 
                        <label class="hidden" for="hp2">전화번호중간4자리</label><input type="text" class="hp" name="hp2" id="hp2" onkeyup="hpCheck1()" required=""><span id="hptext1"></span> - <label class="hidden" for="hp3">전화번호끝4자리</label><input type="text" class="hp" name="hp3" id="hp3" onkeyup="hpCheck2()" required=""><span id="hptext2"></span>
                    </dd>
                </dl>
            </li>
            <li>
               <dl>
                    <dt class="hidden">이메일</dt>
                    <dd>
                      <label class="hidden" for="email1">이메일아이디</label>
                        <input type="text" id="email1" name="email1"  required> @ 
                        <label class="hidden" for="email2">이메일주소</label>
                        <input type="text" name="email2" id="email2" required placeholder="naver.com">   
                    </dd>
                    <dd>
                        <select name="email3" id="email3" class="email3" onchange="getSelectValue(this.form);">
                        <option value=''>선택하기</option>
     			        <option value='naver.com'>naver.com</option>
                        <option value='daum.net'>daum.net</option>
                        <option value='gmail.com'>gmail.com</option>
                        <option value='nate.com'>nate.com</option>
                        <option value=''>직접입력</option>
                      </select>
                   </dd>
                </dl> 
            </li>
            <li>
               <dl>
                    <dt></dt>
                    <dd>
                        <a href="#" onclick="check_input()">회원가입</a>
                         <a href="#" onclick="reset_form()">다시쓰기</a>
                    </dd>
                </dl>
            </li>
         </ul>
	 </form>
	  
	</article>
	
</body>
</html>


