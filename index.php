<!doctype html>
<html>
    <head>
       <title>Weather Web App</title>
         
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> 
       <link rel="stylesheet" href="css/style.css"> 
 
    </head>
    
    <body>
        
	<div class="container">
            
            <div class="row main">
                <div class="col-md-8 col-md-offset-2">
                    <h1>Weather Forecast App</h1>
                    <p class="lead">Enter the name of the city or post code:</p>
                    
                    <div class="form-group">
                        <form> 
                            <div class="input-group">
                              <input type="search" class="form-control" name="city" id="city" value="" />
                              <span class="input-group-addon glyphicon glyphicon-search" id="zoom"></span>
                            </div>
                        </form>
                    </div>
                    
                    <button class="btn btn-success btn-lg" id="submit">Find My Weather</button>
                    
                    <div id="success_message"></div>
                     <div id="alert_message"></div>
                </div>
            </div>
            
             
	</div>
        
            <!-- Load the CDN first -->
           <script   src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="   crossorigin="anonymous"></script>
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
              
        
			<script src="js/config.js"></script> 
           
            <script type="text/javascript">
		   
               $('#submit').click(function(e){
                   e.preventDefault();
                   get_weather();
               });
               
               $('input').keypress(function(e){
                   if(e.keyCode === 10 || e.keyCode === 13){
                       e.preventDefault();
                       get_weather();
                   }
                });
    
               function get_weather(){
                   
                   var city = $('#city').val(); 
                   
                   if(city.length > 0){
                   
                        $.get("ajax.php?city="+city, function(data){
                            
                            $('#alert_message').hide();
                            $('#success_message').html(data).fadeIn();
                            
                        });
                    } else {
                         $('#success_message').hide();
                         $('#alert_message').html('<div class="alert alert-danger"><h3>Please ensure that you are entering a city or postcode</h3></div>').fadeIn();;
                    }
               }
           </script>
    </body>
    
</html>

