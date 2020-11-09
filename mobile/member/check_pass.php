<meta charset="utf-8">
<?
   
   @extract($_POST);
   @extract($_GET);
   @extract($_SESSION);
  
    if(!$pass) 
   {
      echo("비밀번호를 입력하세요");
   }
   else
   {
      include "../lib/dbconn.php";
 
      $sql = "select * from member where pass='$pass' ";

      $result = mysql_query($sql, $connect);
      $num_record = mysql_num_rows($result);


     
      if ($num_record)
      {
       
         echo "<span style='color:red'>영문 숫자만 입력해주세요</span>";
      }
      else
      {
         echo "<span style='color:green'>사용가능한 비밀번호입니다.</span>";
      }
    
 
      mysql_close();
   }

?>

