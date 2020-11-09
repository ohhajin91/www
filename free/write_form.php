<? 
	session_start(); 
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);

	include "../lib/dbconn.php";

	if ($mode=="modify")
	{
		$sql = "select * from $table where num=$num";
		$result = mysql_query($sql, $connect);
		$row = mysql_fetch_array($result);       
	
		$item_subject     = $row[subject];
		$item_content     = $row[content];
		$item_file_0 = $row[file_name_0];
		$item_file_1 = $row[file_name_1];
		$item_file_2 = $row[file_name_2];

		$copied_file_0 = $row[file_copied_0];
		$copied_file_1 = $row[file_copied_1];
		$copied_file_2 = $row[file_copied_2];
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>유니세프-Q&amp;A</title>
    <link rel="stylesheet" href="../common/css/common.css">
    <link rel="stylesheet" href="../sub5/common/css/sub5common.css">
    <link rel="stylesheet" href="css/free.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&family=Nanum+Myeongjo:wght@400;700;800&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    
    <script src="../common/js/prefixfree.min.js"></script>
    <script src="https://kit.fontawesome.com/e7f93bc32d.js" crossorigin="anonymous"></script>
    <script>
      function check_input()
       {
          if (!document.board_form.subject.value)
          {
              alert("제목을 입력하세요1");    
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
    <!--[if IE9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]--> 
</head>
<body>
<? include "../common/sub_head.html" ?>
    <!-- 메인비주얼 -->
       <div class="visual">
           <img src="../sub5/common/images/sub5_visual.jpg" alt="">   
       </div>    
     
    <!-- 서브네비영역 -->
    <div class="subnav_box">
        <h3>기관소식</h3>     
        <div class="subnav">
            <ul>
                <li><a href="../news/list.php">News</a></li>
                <li><a href="../greet/list.php">공지사항</a></li>
                <li><a href="../sub5/sub5_3.html">Story</a></li>
                <li><a  href="../sub5/sub5_4.html" class="current">Q&amp;A</a></li>
            </ul>
        </div>
    </div>
<article id="content"> 
    <div class="content_inner">
        <div class="title_area">
            <div class="line_map">
              <span>HOME </span>&gt;<span> 기관소식 </span>&gt; <strong>Q&amp;A</strong>  
            </div>
            <h2>Q&amp;A</h2>
            <p></p>
        </div>
     </div>
   <section class="qna_write">
     <h3>Question</h3>
<?
	if($mode=="modify")
	{
?>
		<form  name="board_form" method="post" action="insert.php?mode=modify&num=<?=$num?>&page=<?=$page?>&table=<?=$table?>" enctype="multipart/form-data"> 
<?
	}
	else
	{
?>
		<form  name="board_form" method="post" action="insert.php?table=<?=$table?>" enctype="multipart/form-data"> 
<?
	}
?>
		<ul>
			<li>
                작성자&nbsp; : &nbsp;<?=$usernick?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <?
                    if( $userid && ($mode != "modify") )
                    {   //새글쓰기 에서만 HTML 쓰기가 보인다
                ?>
                    <input type="checkbox" name="html_ok" value="y"> HTML 쓰기
                <?
                    }
                ?>	
			</li>
			<li>
               <input type="text" name="subject" value="<?=$item_subject?>" placeholder="제목">      
			<li>
			<li>
               <textarea rows="25" cols="166" name="content" placeholder="상세 내용 입력"><?=$item_content?></textarea>
			</li>
			<li>
                <dl>
                    <dt>첨부파일1 </dt>
                    <dd><input type="file" name="upfile[]"> * 5MB까지 업로드 가능!</dd>
                </dl> 
                <? 	if ($mode=="modify" && $item_file_0)
                {
            ?>
                <?=$item_file_0?> 파일이 등록되어 있습니다. <input type="checkbox" name="del_file[]" value="0"> 삭제
            <?
                }
            ?>   
			</li>

			<li>
                <dl>
                    <dt>첨부파일2 </dt>
                    <dd><input type="file" name="upfile[]"> * 5MB까지 업로드 가능!</dd>
                </dl>  
                <? 	if ($mode=="modify" && $item_file_1)
                    {
                ?>
                    <?=$item_file_0?> 파일이 등록되어 있습니다. <input type="checkbox" name="del_file[]" value="0"> 삭제
                <?
                    }
                ?>  
			</li>

			<li>
                <dl>
                    <dt>첨부파일3 </dt>
                    <dd><input type="file" name="upfile[]"> * 5MB까지 업로드 가능!</dd>
                </dl>
                <? 	if ($mode=="modify" && $item_file_1)
                    {
                ?>
                    <?=$item_file_0?> 파일이 등록되어 있습니다. <input type="checkbox" name="del_file[]" value="0"> 삭제
                <?
                    }
                ?>      
			</li>
		</ul>

		<ul>
           <li>
                 <a href="#" onclick="check_input()">글 등록</a>  
           </li>
           <li> 
                <a href="list.php?table=<?=$table?>&page=<?=$page?>">목록</a> 
           </li>
		</ul>
        </form>
    </form>
    </section>
  </article> <!-- end of content -->
  <? include "../common/sub_foot.html" ?> 
</body>
</html>