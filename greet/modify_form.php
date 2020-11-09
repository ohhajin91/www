<? 
	session_start(); 
     @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);
   //세션변수 4
    //num=7&page=1

	include "../lib/dbconn.php";

	$sql = "select * from greet where num=$num";
	$result = mysql_query($sql, $connect);

	$row = mysql_fetch_array($result);       	
	$item_subject     = $row[subject];
	$item_content     = $row[content];
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
</head>
<body>
<? include "../common/sub_head.html" ?>
 <? $_GET['num']=2;
   include "sub5_nav.html"; ?>

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
        <p>게시글 수정</p>
		<form  name="board_form" method="post" action="insert.php?mode=modify&num=<?=$num?>&page=<?=$page?>"> 
		<div id="write_form">
			<div class="write_line"></div>
			<ul>
				<li class="col1"> 닉네임 </li>
				<li class="col2"><?=$usernick?></li>
			</ul>
			<dl>
                 <dt class="col1"> 제목   </dt>
                 <dd class="col2">
                     <input type="text" name="subject" value="<?=$item_subject?>" >
                 </dd>
			</dl>
			<dl>
                 <dt class="col1"> 내용   </dt>
                 <dd class="col2">
                     <textarea rows="30" cols="79" name="content"><?=$item_content?></textarea>
                 </dd>
			</dl>
		</div>

		<div>
            <input type="submit">&nbsp;
            <a href="list.php?page=<?=$page?>">목록</a>
		</div>
		</form>

	</section> <!-- end of col2 -->
  </article> <!-- end of content -->
<? include "../common/sub_foot.html" ?>
</body>
</html>