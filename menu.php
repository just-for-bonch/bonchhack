<?php include("bd.php"); ?>
<!doctype html>
<html>
<head>
      <link rel="stylesheet" href="css/style.css">
      <title>Food racer</title>
      <link rel="icon" href="img/favicon.ico" type="image/x-icon">
      <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
      <script>
function openWin() {
    document.getElementById("window").style.height = "100%";
}

function closeWin() {
    document.getElementById("window").style.height = "0%";
}
</script>
</head>
<body>
<div class="search-page">
    <div class="search-wrapp">
        <div class="head-search">
            <a href="index.html"><div class="logo">
                <img src="img/logo.png" alt="">
            </div></a>
            <div class="top-text">
                Выберите параметры, по <br>которым хотите провести <br>поиск и укажите ограничения
            </div>
        </div>
        <div class="line"></div>
        <div class="menu-settings">
           
              
           <div class="growth block-menu">
               <div class="ttl-sec">Рост:</div>
               <input id="growth" type="text"><span>см</span>  
           </div>
           <div class="age block-menu">
               <div class="ttl-sec">Возраст:</div>
               <input type="text" id="age"><span>лет</span>  
           </div>
           <div class="weight block-menu">
               <div class="ttl-sec">Вес:</div>
               <input type="text"  id="weight"><span>кг</span>  
           </div>
           <div class="choose-male">
                    <label class="radio">
                        <input type="radio" class="sex"  name="sex" value="1"/>
                        <div class="radio__text choose-radio">МУЖ</div>
                    </label>
                    <label class="radio">
                        <input type="radio"  class="sex" name="sex" value="2"/>
                        <div class="radio__text choose-radio">ЖЕН</div>
                    </label>
                </div>
                <div class="active block-menu">
                   <div class="ttl-sec">Физическая активность:</div>
                   <select id="selected">
                      <option value="1.2">Минимальная</option>
                      <option value="1.3">Нагрузка 1-3 раза в неделю</option>
                      <option value="1.6">Нагрузка 3-5 раза в неделю</option>
                      <option value="1.7">ежедневно</option>
                      <option value="1.9">тяжелая физ. работа</option>
                    </select>
                </div>
                <div class="choose-weight">
                    <label class="radio hoose">
                        <input type="radio" class="tip" name="tip"  value="1"/>
                        <div class="radio__text choose-radio">Похудение</div>
                    </label>
                    <label class="radio">
                        <input type="radio" class="tip" name="tip"  value="2"/>
                        <div class="radio__text choose-radio">Набор массы</div>
                    </label>
                </div>
                <div class="butt">
                     <div class="butt-go" onclick="bju()">Расчитать</div>
                </div>     
        </div>
        <div class="line"></div>
        
               <div class="math">
                   <div class="kalop">
                       <div class="numb"><p id="kalopuu">0</p></div><span class="math-call">ккал</span>
                       <div class="ttl-math">Калорийность</div>
                   </div>
                    <div class="belku">
                        <div class="numb small"><p id="belku">0</p></div><span class="gramm">г</span>
                       <div class="ttl-math top-math">Белки</div>
                    </div>
                    <div class="giri">
                        <div class="numb small"><p id="jupbi">0</p></div><span class="gramm">г</span>
                       <div class="ttl-math top-math">Жиры</div>
                    </div>
                    <div class="yrluvod">
                        <div class="numb small"><p id="yrlevod">0</p></div><span class="gramm">г</span>
                       <div class="ttl-math top-math">Углеводы</div>
                    </div>
               </div>
              <div class="generate">
                   <div class="text-gen">
                       <p>Сгенерировать набор</p>
                   <form method="POST">
                       <div class="to_gen">
                            <span>от</span>
                            <input type="text" name="min">
                            <span>до</span>
                            <input type="text" name="max" >
                        </div>
                        <p class="dish">блюд</p>
                   </div> 
                <input type="text" name="goal" id="vovainput" value="" style="display: none;">
                   <input type="submit" class="right-arrow" name="go" value="">
                   </form>
               </div>
</div>  
    <div class="go-home"><a href="index.php">На главную</a></div>
                        <?php 
                        if (isset($_POST['max']))
                        {
                          echo ("<script> document.getElementById(\"window\").style.height = \"100%\";</script>");
                        include("excel.php");
                        $arr=kek();
                        echo "
                        <div class=\"myNav\">
    <div id=\"window\" class=\"overlay\">
        <div class=\"window-blcok\">
            <div class=\"white-block\">
                        <div class=\"header-whit-block\">
                    <div class=\"ttl-white-block\">
                        Рекомендованные блюда:
                    </div> 
                    <div class=\"close-btn\" onclick=\"closeWin()\"></div>
                </div>
                <div class=\"wrapper-recepts\">";
                        for ($i=0;$i<count($arr);$i++)
                        {
                          $m=$mysqli->query("SELECT * FROM recepty WHERE id_rec=".$arr[$i]."");
                          $row=$m->fetch_array(MYSQLI_ASSOC);
                          $row['img_src']=str_replace("/c88x88i/", "/c249x249i/", $row['img_src']);
                        echo"
                    <div class=\"recept-block-window\">
                        <div class=\"img-recept-block\">
                            <img src=\"".$row['img_src']."\" alt=\"\">
                            <div class=\"up-img\"></div>
                        </div> 
                          <div class=\"ttl-recept\">".$row['name_rec']."</div>
                        <div class=\"info-ricept\">
                            <ul>
                                <li><div class=\"li-kalo\">
                                        <div class=\"call-recept\">".$row['kall']."</div>
                                        <div class=\"name-kallo\">Калорийность</div>
                                </div></li>
                                <li><div class=\"li-kalo\">
                                        <div class=\"call-recept\">".$row['belki']."</div>
                                        <div class=\"name-kallo\">Белки</div>
                                </div></li>
                                <li><div class=\"li-kalo\">
                                        <div class=\"call-recept\">".$row['ziri']."</div>
                                        <div class=\"name-kallo\">Жиры</div>
                                </div></li>
                                <li><div class=\"li-kalo\">
                                        <div class=\"call-recept\">".$row['ugli']."</div>
                                        <div class=\"name-kallo\">Углеводы</div>
                                </div></li>
                            </ul>
                        </div>
                        </div>";
                      }
                      echo ("<script> document.getElementById(\"window\").style.height = \"100%\";</script>");
                    }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="js/js.js"></script>
</body>
</html>

