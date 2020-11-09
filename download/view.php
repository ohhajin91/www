<? 
	session_start(); 
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);

	include "../lib/dbconn.php";

	$sql = "select * from $table where num=$num";
	$result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);       

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

	$file_name[0]   = $row[file_name_0];
	$file_name[1]   = $row[file_name_1];
	$file_name[2]   = $row[file_name_2];

	$file_type[0]   = $row[file_type_0];
	$file_type[1]   = $row[file_type_1];
	$file_type[2]   = $row[file_type_2];

	$file_copied[0] = $row[file_copied_0];
	$file_copied[1] = $row[file_copied_1];
	$file_copied[2] = $row[file_copied_2];

    $item_date    = $row[regist_day];
	$item_subject = str_replace(" ", "&nbsp;", $row[subject]);

	$item_content = str_replace(" ", "&nbsp;", $row[content]);
	$item_content = str_replace("\n", "<br>", $item_content);
    $is_html      = $row[is_html];
    if ($is_html!="y") //첨부된 이미지 처리를 위한 반복문
    {
        $item_content = str_replace(" ", "&nbsp;", $item_content);
        $item_content = str_replace("\n", "<br>", $item_content);
    }

    for ($j=0; $j<3; $j++)
    {
        if ($image_copied[$j]) //업로드한 파일이 존재하면 0 1 2
        {
            $imageinfo = GetImageSize("./data/".$image_copied[$j]);
            //GetImageSize(서버에 업로드된 파일 경로 파일명) =>배열형태의 리턴값
              // => 파일의 너비와 높이값, 종류
            $image_width[$j] = $imageinfo[0];  //파일너비
            $image_height[$j] = $imageinfo[1]; //파일높이
            $image_type[$j]  = $imageinfo[2];  //파일종류

        if ($image_width[$j] > 785) //첨부된 이미지의 최대너비를 785로 지정
                $image_width[$j] = 785;
        }
        else
        {
            $image_width[$j] = "";
            $image_height[$j] = "";
            $image_type[$j]  = "";
        }
    }

	$new_hit = $item_hit + 1;

	$sql = "update $table set hit=$new_hit where num=$num";   // 글 조회수 증가시킴
	mysql_query($sql, $connect);
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
   <div class="content_inner">
        <div class="title_area">
            <div class="line_map">
              <span>HOME </span>&gt;<span> 후원참여 </span>&gt; <strong>자료실</strong>  
            </div>
            <h2>자료실</h2>
        </div>
    </div>
    <section class="data_view">     
        <h3><?= $item_subject ?></h3>
         <p><i class="fas fa-user-edit"></i> <?= $item_nick ?> &nbsp;&nbsp;| &nbsp;&nbsp;<i class="fas fa-eye"></i> : <?= $item_hit ?> &nbsp;&nbsp;|&nbsp;&nbsp; <?= $item_date ?> </p>	
        

        <div>
<?
	for ($j=0; $j<3; $j++)
	{
		if ($userid || $file_copied[$j] || $image_copied[$j])
		{
            $img_name = $image_copied[$j];
            $img_name = "./data/".$img_name; 
                 // ./data/2019_03_22_10_07_15_0.jpg
            $img_width = $image_width[$j];

            echo "<img src='$img_name' width='$img_width'>"."<br><br>"; 
		}
	}
?>
<?
	for ($i=0; $i<3; $i++)
	{
		if ($userid || $file_copied[$i] || $image_copied[$i])
		{
			$show_name = $file_name[$i];
			$real_name = $file_copied[$i];
			$real_type = $file_type[$i];
			$file_path = "./data/".$real_name;
			$file_size = filesize($file_path);
 
			echo "▷ 첨부파일 : $show_name ($file_size Byte) &nbsp;&nbsp;&nbsp;&nbsp;
			       <a href='download.php?table=$table&num=$num&real_name=$real_name&show_name=$show_name&file_type=$real_type'>[저장]</a><br>";
		}
	}
?>
                   <br>
            
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
               <a href="write_form.php?table=<?=$table?>&mode=modify&num=<?=$num?>&page=<?=$page?>">수정</a>&nbsp;
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
           <li>
                <a href="write_form.php?table=<?=$table?>">작성</a>
           </li>
<?
}
?>
    </ul>
	</section> <!-- end of col2 -->
  </article> <!-- end of content -->
  <? include "../common/sub_foot.html" ?>
</body>
</html>