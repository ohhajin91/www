<? 
	session_start(); 
     @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);

    //세션변수
    //view.php?num=7&page=1

	include "../lib/dbconn.php";

	$sql = "select * from greet where num=$num";
	$result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);       
      // 하나의 레코드 가져오기
	
	$item_num     = $row[num];
	$item_id      = $row[id];
	$item_name    = $row[name];
  	$item_nick    = $row[nick];
	$item_hit     = $row[hit];

    $item_date    = $row[regist_day];

	$item_subject = str_replace(" ", "&nbsp;", $row[subject]);

	$item_content = $row[content];
	$is_html      = $row[is_html];

	if ($is_html!="y")
	{
		$item_content = str_replace(" ", "&nbsp;", $item_content);
		$item_content = str_replace("\n", "<br>", $item_content);
	}	
    if ($is_html!="y")
	{
        $item_content = str_replace("&lt;", "<", $item_content);
		$item_content = str_replace("&gt;", ">", $item_content);
	}

	$new_hit = $item_hit + 1;

	$sql = "update greet set hit=$new_hit where num=$num";   // 글 조회수 증가시킴
	mysql_query($sql, $connect);
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
    function del(href) 
    {
        if(confirm("한번 삭제한 자료는 복구할 방법이 없습니다.\n\n정말 삭제하시겠습니까?")) {
                document.location.href = href;
        }
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
	<section class="new_view">
        <h3>Notice</h3>

		<ul>
			<li>
               <?= $item_subject ?>
            </li>
            <li>
              <?= $item_nick ?> | 조회 : <?= $item_hit ?> | <?= $item_date ?> 
            </li>	
		</ul>
		<div>
			<?= $item_content ?>
		</div>
		<div>
            <a href="list.php?page=<?=$page?>">목록</a>&nbsp;
<? 
	if($userid==$item_id || $userlevel==1 || $userid=="admin")
	{
?>
            <a href="modify_form.php?num=<?=$num?>&page=<?=$page?>">수정</a>&nbsp;
            <a href="javascript:del('delete.php?num=<?=$num?>')">삭제</a>&nbsp;
<?
	}
?>
<? 
	if($userid )  //로인인이 되면 글쓰기
	{
?>
            <a href="write_form.php">글쓰기</a>
<?
	}
?>
		</div>
	</section> <!-- end of col2 -->
  </article> <!-- end of content -->
<? include "../common/sub_foot.html" ?>

</body>
</html>
