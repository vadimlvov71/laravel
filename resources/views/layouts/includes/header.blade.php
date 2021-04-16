<?php
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\models\Products;
use app\models\Site;
//////
/* $siteSettings = Site::getSiteSettings();
 $site = array();
 print_r($siteSettings);
 $site['currency'] = $siteSettings[0]["currency"];
*/
?>
<!-- Navigation -->

<nav class=" header-bg  fixed-top " id="mainNav" >
	<section class="navbar navbar-expand-md text-uppercase" style="padding: .5rem 1rem 0rem 1rem;">
		<div class="container">
			<a class="navbar-brand1111 js-scroll-trigger" href="<?php echo(\Yii::$app->request->BaseUrl) ?>/">
				<img width="180" class="img-fluid d-block mx-auto" src="<?php echo \Yii::$app->params['domen'] ?>/web/images/zatoka-rest-logo1.jpg" alt="Отдых в Затоке">
			</a>
			
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon hamburger">
						<span></span>
						<span></span>
						<span></span>
					</span>
				</button>
				<div class="collapse navbar-collapse header-menu-container" id="navbarNav">
					<div class="border-bottom header-menu" >
						<ul class="navbar-nav mr-auto">
							<?php
							$blog = true;
							$products = Products::getTopMenu();
							foreach($products as $product){
							$bodytag = str_replace("Станция", "", $product["name"]);
							
							?>
							
								<li class="nav-item mx-0 mx-lg-1 item_header">
									<a class="" href="<?php echo(\Yii::$app->request->BaseUrl."/".$product["translit"])?>"><?php echo($bodytag)?></a>
									<!--<a class="nav-link py-3 px-0 px-lg-3 rounded" href="#condition">Условия покупки</a>-->
									
								</li>
							<?php
							}
							?>
							<!--
							<li class="nav-item mx-0 mx-lg-1">
									<a class="nav-link py-3 px-0 px-lg-3 rounded" href="<?php echo(\Yii::$app->request->BaseUrl."/hotel_search")?>">Поиск отеля</a>
								</li>
								-->
						</ul>
						
					</div>
					
				</div>
			</div>
		</div>
	</section>
	<div class="input-group " style="width:100%;padding: 0 0 4px 0;">
		<div class="input-group center" style="width:400px;height: 32px;position: relative;">
			<!--<a class="poisk-otelya" href="<?php //echo(\Yii::$app->request->BaseUrl."/hotel_search")?>"> Поиск отеля</a>-->
			<input id="searchBox" type="text" class="form-control-sm" placeholder="Поиск отеля" autocomplete="off">
			<!--<div class="input-group-append" style="">
				<button class="btn btn-secondary" type="button">
					<i class="fa fa-search"></i>
				</button>
			</div>
			-->
			<div id="searchResult" class="search-result "></div>	
		</div>
		
	 </div>
</nav>

<script>
	var searchBox = document.getElementById('searchBox');
	var baseUrl = "<?php echo(\Yii::$app->request->BaseUrl) ?>";
	var searchResult = document.getElementById('searchResult');
	
function getNameSearch(value){
	console.log(value);
	var value = encodeURIComponent(value);
	console.log(value);
//window.addEventListener("load",function() {
  var request = new XMLHttpRequest();
  var name_post = "name=" + value;
  request.open('POST', baseUrl + '/search/search?name_get=' + value,true);
  request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  request.addEventListener('readystatechange', function() {
    if ((request.readyState==4) && (request.status==200)) {
      var searchResult = document.getElementById('searchResult');
      console.log(request.responseText);
      var parsedJSON = JSON.parse(request.responseText);
      /* var parser = new DOMParser();
    var doc = parser.parseFromString(request.responseText, "text/html");*/
      console.log("parsedJSON");
      console.log(parsedJSON);
      var result = parsedJSON.result;
		if(result.length > 0){
			for (var i = 0;i < result.length; i++) {
				//alert(result[i].name);
				if(result[i].name.result_type == "hotel"){
					var href = baseUrl + "/" + result[i].name.translit + "/" + result[i].name.sektor + "/" + result[i].id + "-" + result[i].name.hotel_translit;
				}else{
					var href = baseUrl + "/" + result[i].name.url +".html";
				}
				console.log(result[i].name.name);
				let div = document.createElement("div");
				let a = document.createElement("a");
				var reg = new RegExp(value, "ig");
				var res = result[i].name.name.replace(reg, "11111");
		   // var res = result[i].name.name.replace(/вил/ig, "red");
				a.innerText = res;
				a.setAttribute('href', href);
			
				div.appendChild(a);
				//div.innerHTML = result[i].name.name;
				searchResult.appendChild(div);
			 }
		 // welcome.innerHTML = obj[0].name;
		}else{
			searchResult.innerHTML = "ничего не найдено";
		}
	}
  });
request.send(name_post);
}
searchBox.addEventListener("keyup", function(e){
		searchResult.innerHTML = "";
		// определяем какие действия нужно делать при нажатии на клавиатуру
		switch(e.keyCode) {
			// игнорируем нажатия на эти клавишы
			case 13:  // enter
			case 27:  // escape
			case 38:  // стрелка вверх
			case 40:  // стрелка вниз
			break;

			default:
				// производим поиск только при вводе более 2х символов
				if(this.value.length > 2){
					console.log("enough");
					
					getNameSearch(this.value);
/*
					input_initial_value = $(this).val();
					// производим AJAX запрос к /ajax/ajax.php, передаем ему GET query, в который мы помещаем наш запрос
					$.get("/ajax/ajax.php", { "query":$(this).val() },function(data){
						//php скрипт возвращает нам строку, ее надо распарсить в массив.
						// возвращаемые данные: ['test','test 1','test 2','test 3']
						var list = eval("("+data+")");
						suggest_count = list.length;
						if(suggest_count > 0){
							// перед показом слоя подсказки, его обнуляем
							$("#search_advice_wrapper").html("").show();
							for(var i in list){
								if(list[i] != ''){
									// добавляем слою позиции
									$('#search_advice_wrapper').append('<div class="advice_variant">'+list[i]+'</div>');
								}
							}
						}
					}, 'html');
					*/
				}
				console.log("less");
			break;
		}
	});
</script>
	
    
