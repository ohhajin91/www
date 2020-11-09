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
    <title>유니세프-자료실</title>
    <link rel="stylesheet" href="../common/css/common.css">
    <link rel="stylesheet" href="../sub4/common/css/sub4common.css">
    <link rel="stylesheet" href="css/download.css">
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
</head>
<body>
<? include "../common/sub_head.html" ?>
<!-- 메인비주얼 -->
<div class="visual">
   <img src="../sub4/common/images/sub4_visual.jpg" alt="">   
</div>    

<!-- 서브네비영역 -->
<div class="subnav_box">
    <h3>후원참여</h3>
   <p>아이들의 손을 잡아주세요.</p>
    <div class="subnav">
        <ul>
            <li><a id="nav1" href="sub4_1.html">후원안내</a></li>
            <li><a id="nav2" href="sub4_2.html">착한상품</a></li>
            <li><a id="nav3" href="sub4_3.html">자원봉사</a></li>
            <li><a id="nav4" class="current" href="../download/list.php">자료실</a></li>
        </ul>
    </div>
</div> 
    <article id="content">       
            <div class="title_area">
                <div class="line_map">
                  <span>HOME </span>&gt;<span> 후원참여 </span>&gt; <strong>자료실</strong>  
                </div>
                <h2>자료실</h2>
            </div>
        <section class="data_write">
		<h3>유니세프 자료</h3>
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
               <textarea rows="35" cols="166" name="content" placeholder="상세 내용 입력"><?=$item_content?></textarea>
			</li>
			<li>
                <dl>
                    <dt>첨부파일1 </dt>
                    <dd><input type="file" name="upfile[]"> * 10MB까지 업로드 가능!</dd>
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
                    <dd><input type="file" name="upfile[]"> * 10MB까지 업로드 가능!</dd>
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
                    <dd><input type="file" name="upfile[]"> * 10MB까지 업로드 가능!</dd>
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
    </article>
   <? include "../common/sub_foot.html" ?>
</body>
</html>