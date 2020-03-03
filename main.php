<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css\style.css" >
    <script src="https://kit.fontawesome.com/d506a1fa93.js" crossorigin="anonymous"></script>
    <title>Генерация плана</title>
</head>
<body>
    <div class="container-fluid ">
        <header class="header pt-2">
            <div class="row align-items-center">
                <div class="col-3">
                    <img  src="img/logo.png" alt="logo" class="logo">
                </div>
                <div class="col-6">      
                    <h1 class="text-center">Расчет необходимых сил и средств для тушения пожаров</h1>
                </div>
                <div class="col-3">    
                    <i class="fas fa-user"></i>    
                    <span class=""><?=$_COOKIE['user'];$_COOKIE['name'];?></span>        
                    <a href="exit.php" class="btn btn-success button">Выход</a>
                </div>
            </div>        
        </header>  
        <form method="POST" action="form.php" id="myform"> 
        <div class="row mt-4 naccs">
            <div class="col-md-2">
                <div class="menu">
                    <div class="active btn text-white btn-tab w-100"><span class="light"></span><span>Титульный лист</span></div>
                    <div class="btn text-white btn-tab w-100"><span class="light"></span><span>Глава 1</span></div>
                    <div class="btn text-white btn-tab w-100"><span class="light"></span><span>Глава 2</span></div>
                    <div class="btn text-white btn-tab w-100"><span class="light"></span><span>Глава 3</span></div>
                    <div class="btn text-white btn-tab w-100"><span class="light"></span><span>Глава 4</span></div>
                    <div class="btn text-white btn-tab w-100"><span class="light"></span><span>Тактический замысел №1</span></div>
                    <div class="btn text-white btn-tab w-100"><span class="light"></span><span>Тактический замысел №2</span></div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="container-content">
                        
                  <ul class="nacc">
                    <li class="active">
                         
                        <div class="mt-3">
                            <p>№ плана <input class="" name="id_document" type="text"></p>
                            <div class="row">
                                <div class="col-md-6 mt-3 ">
                                    <label >Утверждаю</label>
                                    <textarea name="claim" class="form-control"  rows="4" cols="120" placeholder="Руководитель организации" required></textarea> 
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label >Утверждаю</label>
                                    <textarea  name="claim_2" class="form-control"  rows="4" cols="120" placeholder="Руководитель МЧС" required></textarea>
                                </div>
                                <div class="col-md-6 mt-3">    
                                    <p>План тушения пожара(наименование объекта)</p> 
                                    <textarea class="form-control " rows="4" cols="150" required type="text" name="fire_plan"></textarea>
                                </div>
                                <div class="col-md-2 mt-3">
                                    <h5><i class="fas fa-briefcase"></i>Должность</h5>        
                                    <input class="my-2" type="text" name="position" autocomplete="off" form="myform">
                                    <input type="text" name="position2" autocomplete="off" form="myform">
                                </div>
                                <div class="col-md-2 mt-3">
                                    <h5><i class="fas fa-phone-alt"></i>Телефон</h5>                 
                                    <input class="my-2" type="tel"  autocomplete="off" name="phone" form="myform">
                                    <input type="tel" name="phone2"  autocomplete="off" form="myform">
                                </div>               
                                <div class="col-md-6 mt-3">     
                                    <p>Ранг пожара<input class="form-control" type="text" required name="fire_rang" ></p>
                                </div>
                                <div class="col-md-6 mt-3">     
                                    <p>План тушения пожара составил<input class="form-control mb-3" type="text" required name="plan_compiller" ></p>
                                </div>
                            </div>        
                        </div>
                   </li>

                   <li>
                        <?php require "navbar\chapter1.php";?> 
                   </li>


                   <li>
                    <?php require "navbar\chapter2.php";?> 
                   </li>


                   <li>
                        <?php require "navbar\chapter3.php";?>  
                    </li>


                    <li>
                        <?php require "navbar\chapter4.php";?>  
                    </li>

                    <li>
                        <div>
                            <?php require "navbar\calculation\calculation_number_1.php";?>
                        </div>
                    </li>

                    <li>
                        <div>
                            <?php require "navbar\calculation\calculation_number_2.php";?>
                            <input type="submit" name="download"  class="btn btn-success btn-lg " value="скачать">
                        </div>
                    </li>

                    <!-- <li>
                        <div>
                            
                            
                        </div>
                    </li> -->

                  </ul>
                  
                 </div>
                 
                  <!-- </form> -->
                </div>
                </div>
                </form>
               </div>

            </div>

    
       
        <!-- <input type="submit" name="download"  class="btn btn-primary btn-lg btn-block" value="скачать"> -->
   

</body>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>

<script src="js/index.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>


</html>