<?php
ini_set('max_execution_time', 9000);
require_once 'simple_html_dom.php'; 

$receptt =array(array(
  "img_src" => "",
  "title" => "",
  "nutrition" => array(array(
      "name" => "",
      "weight" => "",
      "percent" => ""
  )),
  "ingredient" => array(
    "name" => ""
  ),
)
);

$cont=0;
for ($b=21;$b<=50;$b++)
{
$data = file_get_html('https://eda.ru/recepty?page='.$b);
if($data->innertext!='' and count($data->find('a')))
{
  foreach($data->find('h3[class=horizontal-tile__item-title item-title] a') as $a)
  {   
    if ($a->href!=='https://eda.ru/recepty/afishaeda'&&$a->href!=='https://eda.ru/specialproject/gold_1000')
      {
        echo '<a href="https://eda.ru'.$a->href.'">'.$a->plaintext.'</a></br>';
        $recept=file_get_html("https://eda.ru".$a->href);
        
      foreach ($recept->find("section[class=recipe js-portions-count-parent js-recipe]") as $k) 
      {
        foreach ($k->find("div[class=photo-list-preview js-preview-item js-show-gallery trigger-gallery] img") as $key) {
          $receptt[$cont]['img_src']=$key->src;
          echo "<img src='".$receptt[$cont]['img_src']."'><br>";
          break;
        }
        $receptt[$cont]['title']=trim($k->find("h1[class=recipe__name g-h1]",0)->plaintext);
        for ($i=0;$i<4;$i++)
        {
          if($k->innertext!='' and count($k->find('p[class=nutrition__name]')))
            {
              $receptt[$cont]['nutrition'][$i]['name']=trim($k->find("p[class=nutrition__name]",$i)->plaintext);
              $receptt[$cont]['nutrition'][$i]['weight']=$k->find("p[class=nutrition__weight]",$i)->plaintext;
              $receptt[$cont]['nutrition'][$i]['percent']=$k->find("p[class=nutrition__percent]",$i)->plaintext;
            }
          
        }
      }
      for ($j=0;$j<count($recept->find('div[class=ingredients-list layout__content-col] span[class=js-tooltip js-tooltip-ingredient]'));$j++)
        $receptt[$cont]['ingredient']['name'][$j]=trim($k->find("span[class=js-tooltip js-tooltip-ingredient]",$j)->plaintext);
      $cont=$cont+1;
      }
   }
    unset($resept);
}
unset($data);
unset($a);
}
/*
echo "<pre>";
print_r($receptt);
echo "</pre";
*/
//echo json_encode($receptt);

$fp = fopen("counter2.txt", "w+");
  for ($i=0;$i<$cont;$i++)
  {
     $receptt[$i]['title'] = str_replace('&nbsp;',' ',$receptt[$i]['title']);
     $receptt[$i]['title'] = str_replace('&#171;','',$receptt[$i]['title']);
     $receptt[$i]['title'] = str_replace('&#187;','',$receptt[$i]['title']);
     fwrite($fp, $receptt[$i]['title']);
     fwrite($fp, "\n");
     fwrite($fp, $receptt[$i]['img_src']);
     fwrite($fp, "\n");
     for ($j=0;$j<=3;$j++)
     {
      fwrite($fp, $receptt[$i]['nutrition'][$j]['weight']);
      fwrite($fp, "\n");
    }
    foreach ($receptt[$i]['ingredient']['name'] as $key => $value) {
      fwrite($fp,$value);
      fwrite($fp, "\n");
    }
    fwrite($fp, "%END_POS%");
  } 
fclose($fp);
/*$handle = @fopen("counter.txt", "r");
if ($handle) {
    while (($buffer = fgets($handle, 4096)) !== false) {
        echo $buffer;
    }
}
*/
?>