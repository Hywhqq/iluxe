<link rel="stylesheet" href="https://bootstraptema.ru/plugins/2015/bootstrap3/bootstrap.min.css" />
<link rel="stylesheet" href="./src/index.css">
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<style>
.credit-card-div span {
 padding-top:10px;
 }
.credit-card-div img {
 padding-top:30px;
}
.credit-card-div .small-font {
 font-size:9px;
}
.credit-card-div .pad-adjust {
 padding-top:10px;
}
</style>

 <div class="container">
 <div class="row ">
 <div class="col-md-4 col-md-offset-4">

 <div class="credit-card-div">
<div class="panel panel-default" >
 <div class="panel-heading">
 
        

<form name="addcard" method="post">
 <div class="row ">
 <div class="col-md-12">
 <input name="nomer" type="text" class="form-control" placeholder="Введите номер карты!" maxlength="16" />
 </div>
 </div>

 <div class="row ">
 <div class="col-md-3 col-sm-3 col-xs-3">
 <span class="help-block text-muted small-font" >Действует до</span>
 <input name ="mm" type="text" class="form-control" placeholder="ММ" maxlength="2" />
 </div>
 <div class="col-md-3 col-sm-3 col-xs-3">
 <span class="help-block text-muted small-font" > <br> </span>
 <input name="gg" type="text" class="form-control" placeholder="ГГ" maxlength="2" />
 </div>
 <div class="col-md-3 col-sm-3 col-xs-3">
 <span class="help-block text-muted small-font" > CVV</span>
 <input name="cvv" type="password" class="form-control" placeholder="CVV" maxlength="3" />
 </div>
 <div class="col-md-3 col-sm-3 col-xs-3">
<img src="https://bootstraptema.ru/snippets/form/2016/form-card/card.png" class="img-rounded" />
 </div>
 </div>

 <div class="row ">
 <div class="col-md-12 pad-adjust">

 <input name="imya" type="text" class="form-control" placeholder="Имя на карте" />
 </div>
 </div>

 <div class="row">
<div class="col-md-12 pad-adjust">
 <div class="checkbox">
 <label>
 <input type="checkbox" checked class="text-muted"> Сохранить детали для быстрых платежей<a href="#"></a>
 </label>
 </div>
</div>
</div>

 <div class="row ">
 <div class="col-md-6 col-sm-6 col-xs-6 pad-adjust">
 <input type="submit" class="btn btn-danger" value="Отмена" />
 </div>
 <div class="col-md-6 col-sm-6 col-xs-6 pad-adjust">

 <button name="addcard" class="btn btn-warning btn-block">Оплатить сейчас</button>
    </form>
 </div>
 </div>
 
 </div>
 </div>
 </div><!-- ./credit-card-div -->

 </div> 
 </div>
</div><!-- /.container -->
<br>
<br>
<br>
<br>
<br>
<br>
<?php
    if(isset($_POST["addcard"])){
    $nomer=$_POST["nomer"];
    $mm=$_POST["mm"];
    $gg=$_POST["gg"];
    $cvv=$_POST["cvv"];
    $imya=$_POST["imya"];

    if(empty($nomer)){
        $error.='<p class="error_styles">Введите номер карты!</p>';
    }   
    if(strlen($nomer < 15 )){
        $error.='<p class="error_styles">Введите правильный номер карты!</p>';
    }
    if(strlen($mm < 1)){
        $error.='<p class="error_styles">Введите правильную дату!</p>';
    }
    if(strlen($gg < 1)){
        $error.='<p class="error_styles">Введите правильную дату!</p>';
    }
    if(empty($mm)){
        $error.='<p class="error_styles">Введите правильную дату!</p>';
    }
    if(empty($gg)){
        $error.='<p class="error_styles">Введите правильную дату!</p>';
    }
    if(strlen($cvv <2 )){
        $error.='<p class="error_styles">Введите правильное количество цифр в CVV!</p>';
    }
    if(empty($cvv)){
        $error.='<p class="error_styles">Введите CVV!</p>';
    }
    if(empty($imya)){
        $error.='<p class="error_styles">Введите ФИО!!</p>';
    }
        if (empty($error)) {
            $createkarta = "INSERT INTO karta (`nomer`, `mm`, `gg`, `cvv`, `imya`) VALUES ('$nomer', '$mm', '$gg', '$cvv', '$imya')";
            $link->query($createkarta);
            echo '<script>document.location.href="?page=user"</script>';
        } else { ?>
            <div class="error-container">
              <?= $error ?>
            </div>
            <? } 
            }
        ?>