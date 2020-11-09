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
    <title>unicef-공지사항</title>
    <link rel="stylesheet" href="../common/css/common.css">
    <link rel="stylesheet" href="../sub5/common/css/sub5common.css">
    <link rel="stylesheet" href="css/greet.css">
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&family=Nanum+Myeongjo:wght@400;700;800&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e7f93bc32d.js" crossorigin="anonymous"></script>
    <script>
      function check_input()
       {
          if (!document.board_form.subject.value)
          {
              alert("제목을 입력하세요!");    
              document.board_form.subject.focus();
              return;
          }

          if (!document.board_form.content.value)
          {
              alert("내용을 입력하세요!");    
              document.board_form.content.focus();
              return;
          }
          document.board_form.submit();
       }
</script>
</head>
<body>
<? include "../common/sub_head.html" ?>
 <? $_GET['num']=2;
   include "sub5_nav.html"; ?>
     <!-- 본문컨텐츠영역 -->              
  <article id="content">
	<div class="content_inner">
        <div class="title_area">
            <div class="line_map">
              <span>HOME </span>&gt;<span> 기관소식 </span>&gt; <strong>공지사항</strong>  
            </div>
            <h2>공지사항</h2>
        </div>
     </div>
	<section class="new_write">      
		<h3>NOTICE</h3>
        <p>게시글 작성</p>
		<form  name="board_form" method="post" action="insert.php"> 
		<div>
			<ul>
				<li class="col1"> 작성자 </li>
				<li class="col2"><?=$usernick?></li>
				<li class="col3"><input type="checkbox" name="html_ok" value="y"> HTML 쓰기</li>
			</ul>
			<dl>
                 <dt class="col1">제목</dt>
                 <dd class="col2">
                     <input type="text" name="subject">
                 </dd >
			</dl>
			<dl>
                 <dt class="col1"> 내용   </dt>
                 <dd class="col2">
                     <textarea rows="30" cols="79" name="content"></textarea>
                 </dd>
			</dl>
		</div>

		<div>
            <a href="#" onclick="check_input()">글 등록</a>  
            <a href="list.php?page=<?=$page?>">목록</a>
		</div>
		</form>

	</section> <!-- end of col2 -->
  </article> <!-- end of content -->
<? include "../common/sub_foot.html" ?>

</body>
</html>