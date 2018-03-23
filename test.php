<?php
ini_set('max_execution_time', 9000);
require_once 'simple_html_dom.php';	

$receptt =array(array(
  "title" => '',
  "nutrition" => array(array(
      "name" => "",
      "weight" => "",
      "percent" => ""
  )),
  "ingredient" => array(
  	"name" => ""
  )
)
);

$cont=0;
for ($b=1;$b<=1;$b++)
{
$data = file_get_html('https://eda.ru/recepty?page='.$b);
if($data->innertext!='' and count($data->find('a')))
{
  foreach($data->find('h3[class=horizontal-tile__item-title item-title] a') as $a)
  {  	
  	if ($a->href!=='https://eda.ru/recepty/afishaeda')
  		{
    		echo '<a href="https://eda.ru'.$a->href.'">'.$a->plaintext.'</a></br>';
    		$recept=file_get_html("https://eda.ru".$a->href);
    	
    	foreach ($recept->find("section[class=recipe js-portions-count-parent js-recipe]") as $k) 
    	{
    		$receptt[$cont]['title']=$k->find("h1[class=recipe__name g-h1]",0)->plaintext;
    		for ($i=0;$i<4;$i++)
    		{
    			if($k->innertext!='' and count($k->find('p[class=nutrition__name]')))
    				{
    					$receptt[$cont]['nutrition'][$i]['name']=$k->find("p[class=nutrition__name]",$i)->plaintext;
    					$receptt[$cont]['nutrition'][$i]['weight']=$k->find("p[class=nutrition__weight]",$i)->plaintext;
    					$receptt[$cont]['nutrition'][$i]['percent']=$k->find("p[class=nutrition__percent]",$i)->plaintext;
    				}
    		}
    	}
    	for ($j=0;$j<count($recept->find('div[class=ingredients-list layout__content-col] span[class=js-tooltip js-tooltip-ingredient]'));$j++)
    		$receptt[$cont]['ingredient']['name'][$j]=$k->find("span[class=js-tooltip js-tooltip-ingredient]",$j)->plaintext;
    	$cont=$cont+1;
    	}
   }
    unset($resept);
}
unset($data);
unset($a);
}
echo "<pre>";
print_r($receptt);
echo "</pre";

$fp = fopen("counter.txt", "a"); // Открываем файл в режиме записи 
$mytext = serialize($receptt); // Исходная строка
$test = fwrite($fp, $mytext); // Запись в файл
if ($test) echo 'Данные в файл успешно занесены.';
else echo 'Ошибка при записи в файл.';
fclose($fp); //Закрытие файла
//echo json_encode($receptt);
?>