<script type="text/javascript">
	var i = 0;
	var images =[];
	var time = 4000;
		images[0] = "../../../php_projects/planet_shoes/images/under.png";
		images[1] = "../../../php_projects/planet_shoes/images/adidas.png";
		images[2] = "../../../php_projects/planet_shoes/images/puma.png";
	function changeImg(){
		document.slide.src = images[i];
		if(i < images.length - 1){
			i++;
		}else{
			i=0;
		}
		setTimeout("changeImg()",time);
	}
	window.onload = changeImg;
</script>
<img name="slide" style="width: 100%;height: 400px;"> 



