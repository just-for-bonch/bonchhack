<?php
function kek(){
include("bd.php");
    $LIMIT=10000;
    $prec = (float) 200 + 0.000001;//погрешность
    $goal = $_POST['goal'];//цель поиска
 	$arrayID=array(0=>1);
    $input = $mysqli->query("SELECT COUNT(*) FROM recepty");
    $input_count=$input->fetch_row();//общее число записей
    $iter=0;
    $min_count = $_POST['min'];
    $sel_count = $_POST['max'];
    if ($sel_count < 1 || $sel_count > $input_count)  $sel_count = $input_count;
    if ($min_count < 1 ) $min_count = 1; else if ($min_count > $sel_count) $min_count = $sel_count;
    
 //очищение объекта
    do
    {
        $AddSum = 0;
        unset($arrayID);//неудачная терацияочищение;
        for ($j = 1;$j<=$sel_count;$j++)
        {
            $randid = (int)(rand(29,699) + rand(1,100)+rand(1,100));
            $res=$mysqli->query("SELECT * FROM recepty WHERE id_rec=".$randid."");
            while (!$res->num_rows)
            {	
            	$randid = (int)(rand(29,799) + rand(1,100));
            	$res=$mysqli->query("SELECT * FROM recepty WHERE id_rec=".$randid."");
            }
            $row=$res->fetch_array(MYSQLI_ASSOC);	
            $arrayID[]=$row['id_rec'];
            $AddSum = $AddSum + $row['kall'];
            if ($j >= $min_count && $j<= $sel_count) 
                if (abs($AddSum - $goal) <= $prec)
                {
                   // echo("<script>alert('Подбор завершен. Необходимая точность достигнута.');</script>");
                    $iter=$LIMIT;
                    break; 
        		}
        }		
        $iter = $iter + 1;
    }
   while ($iter <= $LIMIT);
   	return($arrayID);
}
?>