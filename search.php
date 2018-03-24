<?php session_start(); include("bd.php"); ?>
<!doctype html>
<html>
<head>
      <link rel="stylesheet" href="css/style.css">
      <title>Food racer</title>
      <link rel="icon" href="img/favicon.ico" type="image/x-icon">
      <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
</head>
<body>
<div class="search-page">
    <div class="search-wrapp">
        <div class="head-search">
            <div class="logo">
                <a href="index.html"><img src="img/logo.png" alt=""></a>
            </div>
            <div class="top-text">
                Выберите параметры, по <br>которым хотите провести <br>поиск и укажите ограничения
            </div>
        </div>
        <div class="line"></div>
        <div class="search-settings">
            <div class="ttl-sett">Поиск по:</div>
            <form action="search_go.php" method="POST">
                <div class="choose-cat">
                    <label class="radio">
                        <input type="radio" name="type" checked="checked" value="recepty"/>
                        <div class="radio__text">Блюдам</div>
                    </label>
                    <label class="radio">
                        <input type="radio" name="type" value="products"/>
                        <div class="radio__text">Продуктам</div>
                    </label>
                </div>  
                <div class="choose-bjy">
                    <div class="block-check">
                        <label class="checkbox">
                            <input type="checkbox" name="kal" value="kal"/>
                            <div class="checkbox__text">Калорийность</div>
                        </label>
                        <div class="to">
                            <span>от</span>
                            <input type="text" name="min_kal">
                            <span>до</span>
                            <input type="text" name="max_kal">
                        </div>
                    </div>
                    <div class="block-check">
                        <label class="checkbox">
                            <input type="checkbox" name="belki" value="belki"/>
                            <div class="checkbox__text">Белки</div>
                        </label>
                        <div class="to">
                            <span>от</span>
                            <input type="text" name="min_bilki">
                            <span>до</span>
                            <input type="text" name="max_bilki">
                        </div>
                    </div>
                    <div class="block-check">
                        <label class="checkbox">
                            <input type="checkbox" name="ziri" value="ziri"/>
                            <div class="checkbox__text">Жиры</div>
                        </label>
                        <div class="to">
                            <span>от</span>
                            <input type="text" name="min_ziri">
                            <span>до</span>
                            <input type="text" name="max_ziri">
                        </div>
                    </div>
                    <div class="block-check">
                        <label class="checkbox">
                            <input type="checkbox" name="ugli" value="ugli"/>
                            <div class="checkbox__text">Углеводы</div>
                        </label>
                        <div class="to">
                            <span>от</span>
                            <input type="text" name="min_ugli">
                            <span>до</span>
                            <input type="text" name="max_ugli">
                        </div>
                    </div>
                </div>  
                <div class="butt">
                     <input type="submit" value="Найти">
                </div>     
            </form>
        </div>
        <div class="line"></div>
        <div class="recipes">
        <?php
        if (isset($_GET['error']))
            echo "<script>alert(\"НЕТ ТАКИХ ДАННЫХ\");</script>";     
        if (isset($_GET['table']))
        {
            if ($_GET['table']=='recepty')
                foreach ($_GET['id'] as $key)
                {
                $m=$mysqli->query("SELECT * FROM recepty WHERE id_rec=$key");
                $row=$m->fetch_array(MYSQL_ASSOC);
                    echo "<div class=\"recipe\">
                <div class=\"ttl-recipes\">".$row['name_rec']."</div>
                <div class=\"components\">
                    <div class=\"recipes-component\">".$row["kall"]." ккал</div>
                    <div class=\"recipes-component\">".$row["belki"]." г белков</div>
                    <div class=\"recipes-component\">".$row["ziri"]." г жиров</div>
                    <div class=\"recipes-component\">".$row['ugli']." г углеводов </div>
                </div>
            </div> ";
            }

            if ($_GET['table']=='products')
                foreach ($_GET['id'] as $key)
                {
                $m=$mysqli->query("SELECT * FROM products WHERE id_prod=$key");
                $row=$m->fetch_array(MYSQL_ASSOC);
                    echo "<div class=\"recipe\">
                <div class=\"ttl-recipes\">".$row['name_prod']."</div>
                <div class=\"components\">
                    <div class=\"recipes-component\">".$row['kaal']." ккал</div>
                    <div class=\"recipes-component\">".$row['belkov']." г белков</div>
                    <div class=\"recipes-component\">".$row['zirov']." г жиров</div>
                    <div class=\"recipes-component\">".$row['ugliv']." г углеводов </div>
                </div>
            </div> ";
        }    
    }


                ?>
        </div>
    </div>
    <div class="go-home"><a href="index.php">На главную</a></div>
</div>  
</body>
</html>

