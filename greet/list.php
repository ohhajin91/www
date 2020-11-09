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
</head>
<?
	include "../lib/dbconn.php";

	
  if (!$scale)
    $scale=5;			

    if ($mode=="search")
	{
		if(!$search)
		{
			echo("
				<script>
				 window.alert('검색할 단어를 입력해 주세요!');
			     history.go(-1);
				</script>
			");
			exit;
		}

		$sql = "select * from greet where $find like '%$search%' order by num desc";
	}
	else
	{
		$sql = "select * from greet order by num desc";
	}

	$result = mysql_query($sql, $connect);

	$total_record = mysql_num_rows($result); 

	
	if ($total_record % $scale == 0)     
		$total_page = floor($total_record/$scale);      
	else
		$total_page = floor($total_record/$scale) + 1; 
 
	if (!$page)                 
		$page = 1;             
	$start = ($page - 1) * $scale;      

	$number = $total_record - $start;
?>
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
                <li><a id="nav1" href="../news/list.php">News</a></li>
                <li><a id="nav2" href="list.php" class="current">공지사항</a></li>
                <li><a id="nav3" href="../sub5/sub5_3.html">Story</a></li>
                <li><a id="nav4" href="../sub5/sub5_4.html">Q&amp;A</a></li>
            </ul>
            
        </div>
    </div>
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
	<section class="new">
        <h3 class="hidden">Notice</h3>
		<p>유니세프의 새로운 소식을 만나보세요</p>
		<div class="top_box">
           <div>
               <span><i class="fas fa-list-ul"></i></span>&nbsp;&nbsp;&nbsp; Total &nbsp; : &nbsp; <?= $total_record ?>
           </div>
           <select name="scale" onchange="location.href='list.php?scale='+this.value">
                    <option value=''>보기</option>
                    <option value='5'>5</option>
                    <option value='10'>10</option>
                    <option value='15'>15</option>
                    <option value='20'>20</option>
         </select>
        </div>
		<div class="list_top_title">
			<ul>
				<li>No.</li>
				<li>제목</li>
				<li>작성자</li>
				<li>작성일</li>
				<li>조회수</li>
			</ul>		
		</div>
		<div id="list_content">
<?		
   for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)                    
   {
      mysql_data_seek($result, $i);     
      $row = mysql_fetch_array($result);    
	
	  $item_num     = $row[num];
	  $item_id      = $row[id];
	  $item_name    = $row[name];
  	  $item_nick    = $row[nick];
	  $item_hit     = $row[hit];

      $item_date    = $row[regist_day];
	  $item_date = substr($item_date, 0, 10);  

	  $item_subject = str_replace(" ", "&nbsp;", $row[subject]);

?>
			<ul class="list_item">
				<li><?= $number ?></li>
				<li><a href="view.php?num=<?=$item_num?>&page=<?=$page?>"><?= $item_subject ?></a></li>
				<li><?= $item_nick ?></li>
				<li><?= $item_date ?></li>
				<li><?= $item_hit ?></li>
			</ul>
<?
   	   $number--;
   }
?>

				<div id="button">
					<a href="list.php?page=<?=$page?>">목록</a>&nbsp;
<? 
	if($userid)
	{
?>
		<a href="write_form.php">글쓰기</a>
<?
	}
?>
				</div>
                <div id="page_button">
				    <div id="page_num"> 
				        <i class="fas fa-arrow-left"></i> &nbsp;&nbsp;&nbsp;&nbsp; 
<?
   // 게시판 목록 하단에 페이지 링크 번호 출력
   for ($i=1; $i<=$total_page; $i++)
   {
		if ($page == $i)     // 현재 페이지 번호 링크 안함
		{
			echo "<b> $i </b>";
		}
		else
		{ 
           if($mode=="search"){
             echo "<a href='list.php?page=$i&scale=$scale&mode=search&find=$find&search=$search'> $i </a>"; 
            }else{    
            
			  echo "<a href='list.php?page=$i&scale=$scale'> $i </a>";
           }
		}      
   }
?>			
			&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-arrow-right"></i>
				</div>
			</div> <!-- end of page_button -->
        </div> <!-- end of list content -->
        <form  name="board_form" method="post" action="list.php?mode=search"> 
        <div class="search_wrap">
            <select name="find">
                <option value='subject'>제목</option>
                <option value='content'>내용</option>
                <option value='nick'>작성자</option>
                <option value='name'>이름</option>
            </select>
            <input type="text" name="search">
            <input type="image" src="images/search.png" alt="search">
        </div>
        </form>
	</section> <!-- end of col2 -->
  </article> <!-- end of content -->
  
<? include "../common/sub_foot.html" ?>

</body>
</html>