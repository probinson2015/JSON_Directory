<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
	<title>JSON Carousel using Mustache</title>
    <link href='https://fonts.googleapis.com/css?family=Libre+Baskerville|Wendy+One' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="mystyle.css" />
</head>
<body>
    <div id="speakerbox">
        <a href="#" id="prev_btn">&laquo;</a>
        <a href="#" id="next_btn">&raquo;</a>
        <div id ="carousel"></div>
    </div>
    
    <script id ="speakerstpl" type="text/template">
    {{#speakers}}
        <div class="speaker">
            <img src = "images/{{shortname}}_tn.jpg" alt = "Photo of {{name}}"/>
            <h3>{{name}}</h3>
            <h4>{{reknown}}</h4>
            <p>{{bio}}</p>
         </div>
    {{/speakers}}
    </script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js" type="text/javascript" ></script>
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery.cycle/2.9999.8/jquery.cycle.all.min.js" type="text/javascript"></script>
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/mustache.js/2.2.1/mustache.min.js" type="text/javascript"></script>
    
    <script type="text/javascript">
        $(function(){
            $.getJSON('data.json', function(data) {
                var template = $('#speakerstpl').html();
                var html = Mustache.to_html(template, data);
                $('#carousel').html(html);
                
                
                $('#carousel').cycle({
                    fx: 'fade',
                    cleartypeNoBg: true,
                    pause: 1,
                    next: '#next_btn',
                    prev: '#prev_btn',
                    speed: 500,
                    timeout: 10000
                }); //cycle
            });//get JSON
        });//function
    </script>

</body>
</html>