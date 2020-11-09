<?
   function latest_article($table, $loop, $char_limit, $con_limit) 
   {
		include "../lib/dbconn.php";

		$sql = "select * from $table order by num desc limit $loop";
		$result = mysql_query($sql, $connect);

		while ($row = mysql_fetch_array($result))
		{
			$num = $row[num];
			$len_subject = mb_strlen($row[subject], 'utf-8');
			$subject = $row[subject];

			if ($len_subject > $char_limit)
			{
				 $subject = str_replace( "&#039;", "'", $subject);               
                                                       $subject = mb_substr($subject, 0, $char_limit, 'utf-8');
				$subject = $subject."...";
			}
            
            $len_subject2 = mb_strlen($row[content], 'utf-8');
			$content = $row[content];

			if ($len_subject2 > $con_limit)
			{
				 $content = str_replace( "&#039;", "'", $content);               
                                                       $content = mb_substr($content, 0, $con_limit, 'utf-8');
				$content = $content."...";
			}
            
			$img_name = $row[file_copied_0];
			if($img_name){
				$img_name = "./$table/data/".$img_name;
			}else{
				$img_name = "./$table/data/default.jpg"; 
			}


			echo "  
                <a href='./$table/view.php?table=$table&num=$num'>
                    <figure class='news_con'>
                        <div>
                            <img src='$img_name'>
                        </div>
                        <figcaption>
                            <h5>$subject</h5> 
                            <p>$content</p>
                        </figcaption>
                    </figure>
                </a>
			";
		}
		mysql_close();
   }

?>