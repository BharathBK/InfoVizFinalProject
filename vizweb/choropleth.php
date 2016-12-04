<!DOCTYPE html>
<html>
  <head>

    <style>

    .ui-content{
     height: 10px;
    }
    text {
     fill: #333;
     font-size: 12px; }

    .svg{
     margin-top: -250px;
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
     #slider7 {
     margin: 20px 0 10px 158px;
     width: 900px;

    }



    </style>
    <title>
    </title>
	
	
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Re-emerging Diseases via Project Tycho</title>

    <!-- Bootstrap core CSS -->
    <link href="/InfoVizFinalProject/vizweb/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/InfoVizFinalProject/vizweb/css/style.css" rel="stylesheet">
	
	
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
        <h2 align="center">United States Whooping Cough Cases by Decade</h2>
		 
		  <br/>
		  
		  <link href="css/d3.slider.css" rel="stylesheet">

    <script src="js/d3.geomap.dependencies.min.js"></script>
    <script src="js/d3.geomap.min.js"></script>
    <div id="slider7" align="center"></div>

    <div id="map" style="margin-top:-20px;height:150;width:300">
    </div>
    <!-- <script src="http://d3js.org/d3.v3.min.js"></script> -->
    <script src="js/d3.slider.js">
    </script>
    <script>

          var value;
          var year, unitId, scale, legend;
			
		  
		  
		  
		
          var geofile=d3.geomap.choropleth().geofile('json/USA.json');
		  console.log(geofile.geofile);
		  console.log(geofile.geofile());
          var projection=geofile.projection(d3.geo.albersUsa);
          year=projection.column('1940');
          unitId=year.unitId('fips');
          scale=unitId.scale(1000);
          legend=scale.legend(true);

              d3.csv('/InfoVizFinalProject/vizweb/csv/decades.csv', function(error, data) {
              d3.select('#map')
                  .datum(data)
                  .call(geofile.draw,geofile);
              });

          var slider =  d3.select('#slider7')
                        .call(d3.slider()
                            .axis(true)
                            .min(1940)
                            .max(2010)
                            .step(10)
                            .on("slide", function(evt, value) {
                               d3.select('#map').selectAll("svg").remove();
                                year=projection.column(value);
                                console.log("The slider's current value is:" + value);
                                unitId=year.unitId('fips');
                                scale=unitId.scale(1000);
                                legend=scale.legend(true);

                                    d3.csv('/InfoVizFinalProject/vizweb/csv/decades.csv', function(error, data) {
                                    d3.select('#map')
                                        .datum(data)
                                        .call(geofile.draw,geofile);
                                    });

                              }));




    </script>
		 
	 
	<br/>
      </div>

    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="/InfoVizFinalProject/vizweb/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	
	
  
  
  
  
    

    <meta charset="utf-8">

    
  </body>
</html>
