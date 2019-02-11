<?php
include ("../simple_html_dom.php");
$base = "https://livescore.co.kr/sports/score_board/soccer_score.php";
$curl = curl_init();
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($curl, CURLOPT_URL, $base);
curl_setopt($curl, CURLOPT_REFERER, $base);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
$str = curl_exec($curl);
curl_close($curl);

$html_base = new simple_html_dom();
// Load HTML from a string
$html=$html_base->load($str);
$s=mysql_connect("localhost", "dbsrb92", "emfjdnj1") or die("실패ㅠㅠ");
mysql_select_db("board", $s);

$ret = $html->find('tr[class=score_tr]');
foreach ($ret as $key => $value) {
  if(strpos($value, "경기종료")){
    $homename = $value->find('span[class=homeName]', 0)->plaintext;
    $awayname = $value->find('span[class=awayName]', 0)->plaintext;
    $score = $value->find('span[class=score]', 0)->plaintext;
    $result = mysql_query("SELECT * FROM finished_game where finished_homename = '$homename'");
    $data = mysql_fetch_array($result);
    $data_homename = "$data[finished_homename]";
    if($data_homename == null){
      $result = mysql_query("INSERT INTO finished_game (finished_homename, finished_awayname, finished_score)VALUES('$homename', '$awayname', '$score')");
    }
    //$query = "UPDATE community set com_title='$com_title',com_contents='$com_contents',com_date='$com_date',com_pass='$com_pass' where com_idx = '$com_idx' ";
    // $a = count($homename);
    // $b = count($awayname);
    // $result = mysql_query("INSERT INTO finished_game (finished_homename, finished_awayname)VALUES('$homename', '$awayname')");
  }

  else if(strpos($value, "미결정")){

  }

  else if(strpos($value, "odds")){

    $homename = $value->find('span[class=homeName]', 0)->plaintext;
    $awayname = $value->find('span[class=awayName]', 0)->plaintext;
    $resq0 = $value->find('span[id=odds]', 0)->plaintext;
    $resq1 = $value->find('span[id=odds]', 1)->plaintext;
    $resq2 = $value->find('span[id=odds]', 2)->plaintext;
    $al_home = substr( $resq0, 1, 4);
    $al_draw = substr($resq1, 1, 4);
    $al_away = substr($resq2, 1, 4);
    $resq = $resq0 .','. $resq1 .','. $resq2;
    $result = mysql_query("SELECT * FROM allocation_game where al_homename = '$homename'");
    $data = mysql_fetch_array($result);
    $data_homename = "$data[al_homename]";
    if($data_homename == null){ //내 db에 경기이름이 있으면
      $result = mysql_query("INSERT INTO allocation_game (al_homename, al_awayname, al_allocation, al_home, al_draw, al_away)VALUES('$homename', '$awayname', '$resq', '$al_home', '$al_draw', '$al_away')");
    }

    else {
      // $query = "UPDATE community set com_title='$com_title',com_contents='$com_contents',com_date='$com_date',com_pass='$com_pass' where com_idx = '$com_idx' ";
      $result = mysql_query("UPDATE allocation_game SET al_allocation='$resq', al_home='$al_home', al_draw='$al_draw', al_away='$al_away', WHERE al_homename = '$homename'");
    }
    echo $value;
  }

  else if(strpos($value, "전반") || strpos($value, "후반")){
    echo $value;
    $homename = $value->find('span[class=homeName]', 0)->plaintext;
    $awayname = $value->find('span[class=awayName]', 0)->plaintext;
    $result = mysql_query("SELECT * FROM allocation_game where al_homename = '$homename'");
    $data = mysql_fetch_array($result);
    $data_homename = "$data[al_homename]";
    if($data_homename == null){
      //$result = mysql_query("INSERT INTO allocation_game (al_homename, al_awayname, al_allocation, al_home, al_draw, al_away)VALUES('$homename', '$awayname', '$resq', '$al_home', '$al_draw', '$al_away')");
    }

    else {
      // $query = "UPDATE community set com_title='$com_title',com_contents='$com_contents',com_date='$com_date',com_pass='$com_pass' where com_idx = '$com_idx' ";
      //$result = mysql_query("DELETE FROM allocation_game WHERE al_homename='$data_homename'");
      $result = mysql_query("UPDATE allocation_game SET al_check='N' WHERE al_homename = '$homename'");
    }
  }

  else {
    echo $value;
  }

}
?>
