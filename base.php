<?php
include("bd.php");

$recept =array(
  "img_src" => "",
  "title" => "",
  "nutrition" => array(
     // "weight" => "",
  ),
  "ingredient" => ""
);

$n=0;

$handle = @fopen("counter3.txt", "r");
if ($handle) {
    while (($buffer = fgets($handle, 4096)) !== false) {
    	echo $buffer;
        if (preg_match("/%END_POS%./", $buffer))
        {
        	$buffer=preg_replace("/%END_POS%/", "", $buffer);
        	$mysqli->query("INSERT INTO recepty(name_rec,img_src,kall,belki,ziri,ugli,ingred) VALUES ('".$recept['title']."','".$recept['img_src']."',".$recept['nutrition'][0]['weight'].",".$recept['nutrition'][1]['weight'].",".$recept['nutrition'][2]['weight'].",".$recept['nutrition'][3]['weight'].",'".$recept['ingredient']."')");
        	$mysqli->error;
        	$n=0;
        	echo "<pre>";
        	print_r($recept);
        	echo "</pre>";
        	unset($recept);
        }
        $buffer=preg_replace("/,/", ".", $buffer);
        $buffer=preg_replace("/&#8209;/","-",$buffer);
         $buffer=preg_replace("/&#171;/","'",$buffer);
         $buffer=preg_replace("/&#187;/","'",$buffer);
        echo $buffer;
        if ($n==0)
        	$recept['title']=$buffer;
        if ($n==1)
        	$recept['img_src']=$buffer;
        if ($n==2)
        	$recept['nutrition'][0]['weight']=(float)$buffer;
        if ($n==3)
        	$recept['nutrition'][1]['weight']=(float)$buffer;
        if ($n==4)
        	$recept['nutrition'][2]['weight']=(float)$buffer;
        if ($n==5)
        	$recept['nutrition'][3]['weight']=(float)$buffer;
        if ($n==6)
        	$recept['ingredient']=$buffer;
        if ($n>5)
        	$recept['ingredient']=$recept['ingredient'].$buffer;
        $n=$n+1;
    }
}
$mysqli->close();
?>