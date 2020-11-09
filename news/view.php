<? 
	session_start(); 
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);

	include "../lib/dbconn.php";

	$sql = "select * from $table where num=$num";
	$result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);       
      // 하나의 레코드 가져오기
	
	$item_num     = $row[num];
	$item_id      = $row[id];
	$item_name    = $row[name];
  	$item_nick    = $row[nick];
	$item_hit     = $row[hit];

	$image_name[0]   = $row[file_name_0];  //첨부파일의 실제이름
	$image_name[1]   = $row[file_name_1];
	$image_name[2]   = $row[file_name_2];


	$image_copied[0] = $row[file_copied_0];    //날짜/시간으로 바뀐이름
	$image_copied[1] = $row[file_copied_1];
	$image_copied[2] = $row[file_copied_2];

    $item_date    = $row[regist_day];
	$item_subject = str_replace(" ", "&nbsp;", $row[subject]);

	$item_content = $row[content];
	$is_html      = $row[is_html];

	if ($is_html!="y") //첨부된 이미지 처리를 위한 반복문
	{
		$item_content = str_replace(" ", "&nbsp;", $item_content);
		$item_content = str_replace("\n", "<br>", $item_content);
	}
    if ($is_html!="y")
	{
        $item_content = str_replace("&lt;", "<", $item_content);
		$item_content = str_replace("&gt;", ">", $item_content);
	}
	
	for ($i=0; $i<3; $i++)
	{
		if ($image_copied[$i]) //업로드한 파일이 존재하면 0 1 2
		{
			$imageinfo = GetImageSize("./data/".$image_copied[$i]);
            //GetImageSize(서버에 업로드된 파일 경로 파일명) =>배열형태의 리턴값
              // => 파일의 너비와 높이값, 종류
			$image_width[$i] = $imageinfo[0];  //파일너비
			$image_height[$i] = $imageinfo[1]; //파일높이
			$image_type[$i]  = $imageinfo[2];  //파일종류

        if ($image_width[$i] > 785) //첨부된 이미지의 최대너비를 785로 지정
				$image_width[$i] = 785;
		}
		else
		{
			$image_width[$i] = "";
			$image_height[$i] = "";
			$image_type[$i]  = "";
		}
	}

	$new_hit = $item_hit + 1;

	$sql = "update $table set hit=$new_hit where num=$num";   // 글 조회수 증가시킴
	mysql_query($sql, $connect);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>유니세프-News</title>
    <link rel="stylesheet" href="../common/css/common.css">
    <link rel="stylesheet" href="../sub5/common/css/sub5common.css">
    <link rel="stylesheet" href="css/news.css">
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&family=Nanum+Myeongjo:wght@400;700;800&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    
    <script src="../common/js/prefixfree.min.js"></script>
    <script src="https://kit.fontawesome.com/e7f93bc32d.js" crossorigin="anonymous"></script>
    <script>
    function del(href) 
    {
        if(confirm("한번 삭제한 자료는 복구할 방법이 없습니다.\n\n정말 삭제하시겠습니까?")) {
                document.location.href = href;
        }
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
                <li><a href="../news/list.php" class="current">News</a></li>
                <li><a href="../greet/list.php">공지사항</a></li>
                <li><a href="sub5_3.html">Story</a></li>
                <li><a  href="sub5_4.html">Q&amp;A</a></li>
            </ul>
            
        </div>
    </div>
  <article id="content">
       <div class="content_inner">
        <div class="title_area">
            <div class="line_map">
              <span>HOME </span>&gt;<span> 기관소식 </span>&gt; <strong>News</strong>  
            </div>
            <h2>News</h2>
            <p></p>
        </div>
     </div>

    <section class="news_view">
        <h3><?= $item_subject ?></h3>
        <ul>
            <li>
               <i class="fas fa-user-edit"></i>  <?= $item_nick ?>&nbsp;&nbsp; | &nbsp;&nbsp;<i class="fas fa-eye"></i>  <?= $item_hit ?>&nbsp;&nbsp; | &nbsp;&nbsp;<?= $item_date ?> 
            </li>	
        </ul>

        <div>
    <?
    for ($i=0; $i<3; $i++)  //업로드된 이미지를 출력한다
    {
        if ($image_copied[$i])
        {
            $img_name = $image_copied[$i];
            $img_name = "./data/".$img_name; 
             // ./data/2019_03_22_10_07_15_0.jpg
            $img_width = $image_width[$i];

            echo "<img src='$img_name' width='$img_width'>"."<br><br>";
        }
    }
    ?>
           <p><?= $item_content ?></p>
        </div>

        <ul>
           <li>
              <a href="list.php?table=<?=$table?>&page=<?=$page?>">목록</a>&nbsp; 
           </li>
           <? 
            if($userid=='ohhajin' && $userid==$item_id)
            {
            ?>
           <li>
               <a href="write_form.php?table=<?=$table?>&mode=modify&num=<?=$num?>&page=<?=$page?>">게시글 수정</a>&nbsp;
           </li>
           <li>
              <a href="write_form.php?table=<?=$table?>">게시글 작성</a>&nbsp; 
           </li>
           <li>
              <a href="javascript:del('delete.php?table=<?=$table?>&num=<?=$num?>')">삭제</a>&nbsp; 
           </li>
           <?
            }
            ?>
            <? 
            if($userid=='ohhajin')
            {
            ?>    
            <?
            }
            ?>   
        </ul>

    </section> <!-- end of col2 -->
</article> <!-- end of content -->
<? include "../common/sub_foot.html" ?>  
</body>
</html>