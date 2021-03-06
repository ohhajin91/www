<? 
	session_start(); 
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);

	$table = "story"; //해당게시판의 테이블명
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>유니세프-Story</title>
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../sub/common/sub_common.css">
    <link rel="stylesheet" href="css/story.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&family=Nanum+Myeongjo:wght@400;700;800&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    
    <script src="../common/js/prefixfree.min.js"></script>
    <script src="https://kit.fontawesome.com/e7f93bc32d.js" crossorigin="anonymous"></script>
    <!--[if IE9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]--> 
</head>
<?
	include "../../lib/dbconn.php";

    
   if (!$scale)
    $scale=3;			// 한 화면에 표시되는 글 수

    
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
<? include "head.html" ?> 
    <!-- 메인비주얼 -->
    <div class="main">
        <img src="../sub/common/sub2_visual.jpg" alt=""> 
    </div>    
     
    <!-- 서브네비영역 -->
    <div class="subnav_box">
        <h3>기관활동</h3>
        <div class="subnav">
            <ul>
                <li><a href="../sub2_1.html">유니세프 사업</a></li>
                <li><a href="../sub2_2.html">유니세프 이슈</a></li>
                <li><a class="current" href="list.php">Story</a></li>
            </ul>
            
        </div>
    </div>
 <article id="content">
   <h2>UNICEF Story</h2>
    <section class="story">        
        <h3 class="hidden">유니세프 이야기</h3>
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
            <div>
                Total : <?= $total_record ?> 
            </div>
            <div>
               <select name="scale" onchange="location.href='list.php?scale='+this.value">
                    <option value=''>게시글보기</option>
                    <option value='3'>3</option>
                    <option value='6'>6</option>
                    <option value='9'>9</option>
                    <option value='12'>12</option>
                </select>
            </div>
        </div>
        </form>

        <div class="list_content">
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
       <ul class="list_item">
           <li>
               <?= $number ?>
           </li>
           <li>
               <a href="view.php?table=<?=$table?>&num=<?=$item_num?>&page=<?=$page?>"><img src="<?=$item_img?>" alt=""></a>
           </li>
           <li>
               <a href="view.php?table=<?=$table?>&num=<?=$item_num?>&page=<?=$page?>"> <?= $item_subject ?></a>
           </li>
           <li>
               <?= $item_date ?>
               <i class="fas fa-eye"> <?= $item_hit ?></i> 
           </li>    
       </ul>
<?
       $number--;
   }
?>
            <div class="page_button">
                <div> <i class="fas fa-arrow-left"></i>  &nbsp;&nbsp;&nbsp;&nbsp; 
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
                <div>
                    <a href="list.php?table=<?=$table?>&page=<?=$page?>">보기</a>
<? 
    if($userid=='ohhajin')
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
<? include "foot.html" ?> 
</body>
</html>