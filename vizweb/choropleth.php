<!DOCTYPE html>
<!-- php: php.searchlist
	variables: dropdownCountry, dropdownCategories, dropdownCalories, dropdownFat, dropdownProtein, dropdownSugar, radioOrder, search -->
<html lang="en">
  <head>
  
	<style>

.ui-content{
  height: 10px;
}
text {
  fill: #333;
  font-size: 12px; }

.svg{
  margin-top: -300px;
}
.background {
  fill: none;
  pointer-events: all; }
.unit {
  cursor: pointer;
  fill: #ccc;
  stroke: #000;
  stroke-width: 0.4px; }

.legend-bg {
  fill: #fff;
  fill-opacity: 0.8;

}

.legend-bar {
  stroke: #333;
  stroke-width: 1px; }

#radio {
  font-size: 25px;
}



</style>
	
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Re-emerging Diseases via Project Tycho</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="style.css" rel="stylesheet">
	
	

        <script src="js/d3.geomap.dependencies.min.js"></script>
        <script src="js/d3.geomap.min.js"></script>

  

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">

      <!-- Static navbar -->
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
			  <span class="icon-bar"></span>
			  <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Re-emerging Diseases: Whooping Cough</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="data.php">EXPLORE DATA</a></li>
			  <li class="active"><a href="time.php">TIMELINES</a></li>
			  <li class="active"><a href="season.php">SEASONALITY</a></li>
			  <li class="active"><a href="choropleth.php">CHOROPLETH</a></li>
			  <li class="active"><a href="wordcloud.php">WORDCLOUD</a></li>
			 </ul>
        </div><!--/.container-fluid -->
      </nav>

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h3>Re-emerging Diseases via Project Tycho</h3>
		 
		  <br/><br/><br/>
         <div w3-include-html="Choropleth/choropleth.html"></div>
		 <div id = "choropleth"></div>
		 
		 <input id="slider" type="range" min="1940" max="2010" value="1937" step="10" />

		 <span id="range">1937</span>
		 
		 <div id="map" style="margin-top:-0px;height:150;width:300" ></div>
		 
	 
	<br/>
      </div>

    </div>
</div>	<!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	
	<script type="text/javascript">
	
onload = function() {
  var $ = function(id) { return document.getElementById(id); };
  $('slider').oninput = function() { $('range').innerHTML = this.value; };
  $('slider').oninput();
};

	</script>
	
     <script>
		//d3.slider().axis(true).min(1937).max(2010).step(1);
		var year, unitId, scale, legend;
        var geofile=d3.geomap.choropleth().geofile('json/USA.json');
        var projection=geofile.projection(d3.geo.albersUsa);
		//console.log(slider.value());
		
		var	value = this.value;
        year=projection.column('1937');
		
		
        console.log('1937');
		unitId=year.unitId('fips');
        scale=unitId.scale(1000);
        legend=scale.legend(true);
		
		
            d3.csv('csv/wctycho.csv', function(error, data) {
            d3.select('#map')
                .datum(data)
                .call(geofile.draw,geofile);
            });
		
		d3.selectAll("input").on("change", function change() {
		d3.selectAll("svg > *").remove();
		
				var	value = this.value;
        year=projection.column(value.toString());
		
		
        console.log(year);
		unitId=year.unitId('fips');
        scale=unitId.scale(1000);
        legend=scale.legend(true);
		
		
            d3.csv('csv/wctycho.csv', function(error, data) {
            d3.select('#map')
                .datum(data)
                .call(geofile.draw,geofile);
            });
});
        </script>
    
  </body>
</html>
