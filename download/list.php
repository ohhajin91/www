<? 
	session_start(); 
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);

	$table = "download";
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>유니세프-자료실</title>
    <link rel="stylesheet" href="../common/css/common.css">
    <link rel="stylesheet" href="../sub4/common/css/sub4common.css">
    <link rel="stylesheet" href="css/download.css">
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&family=Nanum+Myeongjo:wght@400;700;800&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    
    <script src="../common/js/prefixfree.min.js"></script>
    <script src="https://kit.fontawesome.com/e7f93bc32d.js" crossorigin="anonymous"></script>
   
</head>
<?
	include "../lib/dbconn.php";

	$scale=6;			// 한 화면에 표시되는 글 수

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

		$sql = "select * from $table where $find like '%$search%' order by num desc";
	}
	else
	{
		$sql = "select * from $table order by num desc";
	}

	$result = mysql_query($sql, $connect);
	$total_record = mysql_num_rows($result); // 전체 글 수

	// 전체 페이지 수($total_page) 계산 
	if ($total_record % $scale == 0)     
		$total_page = floor($total_record/$scale);      
	else
		$total_page = floor($total_record/$scale) + 1; 
 
	if (!$page)                 // 페이지번호($page)가 0 일 때
		$page = 1;              // 페이지 번호를 1로 초기화
 
	// 표시할 페이지($page)에 따라 $start 계산  
	$start = ($page - 1) * $scale;      
	$number = $total_record - $start;
?>
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
	<section class="data">        
		<h3>유니세프 자료</h3>

		<form  name="board_form" method="post" action="list.php?table=<?=$table?>&mode=search"> 
		<div class="search_wrap">
           <i class="fas fa-search"></i>
            <select name="find">
                <option value='subject'>제목</option>
                <option value='content'>내용</option>
            </select>
            <input type="text" name="search" placeholder="검색어를 입력해주세요">
        </div>
        <div>
            <div class="total">
                Total : <?= $total_record ?> 
            </div>
            <div class="no_view">
               <select name="scale" onchange="location.href='list.php?scale='+this.value">
                    <option value=''>게시글보기</option>
                    <option value='6'>6</option>
                    <option value='12'>12</option>
                    <option value='18'>18</option>
                    <option value='24'>24</option>
                </select>
                <a href="#none" class="view_btn">
                      <i class="fas fa-table"></i>
                  </a>
                <a href="#none" class="view_btn">
                    <i class="fas fa-server"></i>
                </a> 
            </div>
        </div>
		</form>
        <div class="data_con">
<?		
   for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)                    
   {
      mysql_data_seek($result, $i);       
      // 가져올 레코드로 위치(포인터) 이동  
      $row = mysql_fetch_array($result);       
      // 하나의 레코드 가져오기
	
	  $item_num     = $row[num];
	  $item_id      = $row[id];
	  $item_name    = $row[name];
  	  $item_nick    = $row[nick];
	  $item_hit     = $row[hit];

      $item_date    = $row[regist_day];
	  $item_date = substr($item_date, 0, 10);  

	  $item_subject = str_replace(" ", "&nbsp;", $row[subject]);
       if($row[file_copied_0]){ //첫번째 첨부이미지가 있으면
        $item_img = './data/'.$row[file_copied_0];  
      }else{
        $item_img = './data/default.jpg'  ;
      }
?>
			
			<a class="board_wrap" href="view.php?table=<?=$table?>&num=<?=$item_num?>&page=<?=$page?>">
                <ul class="board">
                    <li>
                       <img src="<?=$item_img?>" alt=""></li>
                    <li>
                        <?= $item_subject ?>
                    </li>
                    <li>
                        <i class="far fa-calendar-alt">&nbsp; <?= $item_date ?>  </i> <i class="fas fa-eye">&nbsp; <?= $item_hit ?></i>
                    </li>
                </ul>
			</a>
			
<?
   	   $number--;
   }
?>
			<div class="page_button">
            <div> 
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
			echo "<a href='list.php?table=$table&page=$i'> $i </a>";
		}      
   }
?>			
			&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-arrow-right"></i>
            </div>
				<div class="button">
					<a href="list.php?table=<?=$table?>&page=<?=$page?>">목록</a>&nbsp;
<? 
	if($userid)
	{
?>
		<a href="write_form.php?table=<?=$table?>">글쓰기</a>
<?
	}
?>
				</div>
			</div> <!-- end of page_button -->
        </div> <!-- end of list content -->
        
        <div class="data_con">
<?		
   for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)                    
   {
      mysql_data_seek($result, $i);       
      // 가져올 레코드로 위치(포인터) 이동  
      $row = mysql_fetch_array($result);       
      // 하나의 레코드 가져오기
	
	  $item_num     = $row[num];
	  $item_id      = $row[id];
	  $item_name    = $row[name];
  	  $item_nick    = $row[nick];
	  $item_hit     = $row[hit];

      $item_date    = $row[regist_day];
	  $item_date = substr($item_date, 0, 10);  

	  $item_subject = str_replace(" ", "&nbsp;", $row[subject]);
       if($row[file_copied_0]){ //첫번째 첨부이미지가 있으면
        $item_img = './data/'.$row[file_copied_0];  
      }else{
        $item_img = './data/default.jpg'  ;
      }
?>
			<ul class="row">
				<li>
                  <div>
                       <a href="view.php?table=<?=$table?>&num=<?=$item_num?>&page=<?=$page?>"><img src="<?=$item_img?>" alt=""></a> 
                      <i class="fas fa-eye"> <?= $item_hit ?></i>
                  </div>
               </li>
				<li>
                  <dl>
                      <dt>
                          <a href="view.php?table=<?=$table?>&num=<?=$item_num?>&page=<?=$page?>"> <?= $item_subject ?></a>
                      </dt>
                      <dd>
                         <i class="far fa-calendar-alt"></i> <?= $item_date ?>
                     </dd>
                  </dl>
				</li>
				<li>
				   <?= $item_nick ?> 
				</li>
			</ul>
			
<?
   	   $number--;
   }
?>
			<div class="page_button">
                <div> 
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
			echo "<a href='list.php?table=$table&page=$i'> $i </a>";
		}      
   }
?>			
			&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-arrow-right"></i>
                </div>
				<div class="button">
					<a href="list.php?table=<?=$table?>&page=<?=$page?>">목록</a>&nbsp;
<? 
	if($userid)
	{
?>
		<a href="write_form.php?table=<?=$table?>">글쓰기</a>
<?
	}
?>
				</div>
			</div> <!-- end of page_button -->
          </div> <!-- end of list content -->
	</section> <!-- end of col2 -->
  </article> <!-- end of content -->
  <? include "../common/sub_foot.html" ?>
   <script>
       $('.view_btn').each(function(index) {
           $(this).click(function(){
               $('.data_con').hide();
               $('.data_con').eq(index).show();
                $('.view_btn a').removeClass('current');
               $('.view_btn a').eq(index).addClass('current');
           })
       });
    
    </script>
</body>
</html>