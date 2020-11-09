<? 
	session_start(); 
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);

	$table = "free";
	$ripple = "free_ripple";
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>유니세프-Q&amp;A</title>
    <link rel="stylesheet" href="../common/css/common.css">
    <link rel="stylesheet" href="../sub5/common/css/sub5common.css">
    <link rel="stylesheet" href="css/free.css">
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&family=Nanum+Myeongjo:wght@400;700;800&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    
    <script src="../common/js/prefixfree.min.js"></script>
    <script src="https://kit.fontawesome.com/e7f93bc32d.js" crossorigin="anonymous"></script>
    
    <!--[if IE9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]--> 
</head>
<?
	include "../lib/dbconn.php";
	$scale=5;			// 한 화면에 표시되는 글 수

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
                <li><a  href="list.php" class="current">Q&amp;A</a></li>
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
       <section class="qna">
         <h3>질문 답변</h3>
          <a href="../sub5/sub5_4.html" class="qna"><i class="far fa-question-circle"></i>자주 묻는 질문 보러기기</a>  
           <form  name="board_form" method="post" action="list.php?table=<?=$table?>&mode=search"> 
               <div class="search_wrap">
                   <i class="fas fa-search"></i>
                    <select name="find">
                        <option value='subject'>제목</option>
                        <option value='content'>내용</option>
                    </select>
                    <input type="text" name="search" placeholder="검색어를 입력해주세요">
                </div>
                <ul>
                    <li>
                        Total : <?= $total_record ?> 
                    </li>
                    <li>
                       <select name="scale" onchange="location.href='list.php?scale='+this.value">
                            <option value=''>게시글보기</option>
                            <option value='5'>5</option>
                            <option value='10'>10</option>
                            <option value='15'>15</option>
                            <option value='20'>20</option>
                        </select>
                    </li>
                </ul>
            </form>
            <div>
                <ul>
                    <li>No.</li>
                    <li>제목</li>
                    <li>작성자</li>
                    <li>작성일</li>
                    <li>조회수</li>
                </ul>	

                <div>
            <?		
            for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)                    
            {
              mysql_data_seek($result, $i);     // 포인터 이동        
              $row = mysql_fetch_array($result); // 하나의 레코드 가져오기	      

              $item_num     = $row[num];
              $item_id      = $row[id];
              $item_name    = $row[name];
              $item_nick    = $row[nick];
              $item_hit     = $row[hit];
              $item_date    = $row[regist_day];
              $item_date = substr($item_date, 0, 10);  
              $item_subject = str_replace(" ", "&nbsp;", $row[subject]);

              $sql = "select * from $ripple where parent=$item_num";
              $result2 = mysql_query($sql, $connect);
              $num_ripple = mysql_num_rows($result2);

            ?>
                    <ul>
                        <li>No.<?= $number ?></li>
                        <li><a href="view.php?table=<?=$table?>&num=<?=$item_num?>&page=<?=$page?>"><?= $item_subject ?></a>
            <?
                if ($num_ripple)
                        echo " [$num_ripple]";
            ?>
                        </li>
                        <li><i class="fas fa-user-edit"></i> <?= $item_nick ?><li>
                        <li><i class="far fa-calendar-alt"></i> <?= $item_date ?><li>
                        <li><i class="fas fa-eye"></i> <?= $item_hit ?><li>
                    </ul>
            <?
               $number--;
            }
            ?>
               </div>
           </div>
                <div class="page_button">
                    <div> <i class="fas fa-arrow-left"></i> &nbsp;&nbsp;&nbsp;&nbsp; 
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
            
       </section>
  
  </article> <!-- end of content -->  
  <? include "../common/sub_foot.html" ?> 
  <script src="../sub5/js/sub5.js"></script>
</body>
</html>