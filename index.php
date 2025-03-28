<?php
include 'functions.php';
template_header('Clock', 'דף הבית - טכני');
include '../clocks/includes/html.php';
$pdo = pdo_connect_mysql();

$stmt = $pdo->exec("CREATE TABLE  IF NOT EXISTS  new_table  AS  
							SELECT lumen2.id, clock,  in_out, 
							dates, time,
							id_membre, 
							shaon_name, IP, address, family_name, name, id_worker, id_lm
						FROM 
							lumen2
						LEFT JOIN 
							shaon
						ON
							lumen2.clock = shaon.shaon_id
						LEFT JOIN 
							w_lm
						ON
							lumen2.id_membre = w_lm.id_worker || lumen2.id_membre = w_lm.id_lm
						ORDER BY 
							dates DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <div class="button-container">
        <button class="button" id="insertButton">
            <h5><a href="insert.php"><h5>Down+Insert data</h5></a></h5>
            <div class="hourglass"></div>
        </button>
    </div>
    <div class="button-container">
        <button class="button" id="insertButton">
            <h5><a href="insertonly.php"><h5>Insert Only</h5></a></h5>
            <div class="hourglass"></div>
        </button>
    </div>
    <script>
        document.getElementById('insertButton').addEventListener('click', function(event) {
            this.classList.add('loading');
        });
    </script>

    <div class="button-container">
        <button><a href="http://localhost/phpmyadmin/index.php?route=/database/structure&db=ironitorg_clocks" target="_blank"><h5>Database</h5>
 <span class="fas fa-database fa-x4" aria-hidden="true"></span></a></button>
    </div>
    <div class="button-container">
		<button class="button" id="insertButton">
        <a href="jquery2/clocks2/insertclock.php"><h5>Insertion clock</h5></a>
		</button>
    </div>		
    <!--ניקיון בלבד-->
	<div class="button-container">
        <button  type="button" class="btn btn-danger" ><a href="cleanData.php"><h5>Clean all Data</h5></button>
    </div>

    <!--script>
        document.getElementById('insertionButton').addEventListener('click', function() {
            var progressBar = document.getElementById('progressBar');
            var progressPercent = document.getElementById('progressPercent');
            var width = 0;
            var interval = setInterval(function() {
                if (width >= 100) {
                    clearInterval(interval);
                } else {
                    width++;
                    progressBar.style.width = width + '%';
                    progressPercent.textContent = width + '%';
                }
            }, 50); // Adjust the interval duration to match your process duration

            document.getElementById('insertionForm').submit();
        });
    </script-->
	<!--script>
		function sendLove(this)
		{
		  //alert('asdasd');
		  this1.disabled=true; 
		  this1.innerHTML='<i class="fa fa-spinner fa-pulse fa-3x fa-fw"><span class="sr-only">Loading...</span></i>  טוען , נא המתן …';
		}
		</script-->
</body>
</html>
<?=template_footer()?>