
<html>
	<head>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
		<script type="text/javascript"> 
			function myFunction(){			
				if (document.form1.generator.checked) 
					document.getElementById('pw').disabled = true;
				else 
					document.getElementById('pw').disabled = false;

			}
			function myFunction1(){			
				if (document.form2.generator.checked) 
					document.getElementById('pw1').disabled = true;
				else 
					document.getElementById('pw1').disabled = false;

			}
			jQuery(document).ready( function() {
			
				var data = new Date();
				var data1 = new Date();
				var gg, mm, aaaa;
				gg = data.getDate() + "/";
				mm = data.getMonth() + 1 + "/";
				aaaa = data.getFullYear();
				$("#data").val(gg+''+mm+''+aaaa);  
				$("#data1").val(gg+''+mm+''+aaaa);  		  
			});
		</script>
                <title>Creazione Documentazione Caselle di posta</title>
                <meta name="title" content="Creazione Documentazione Caselle di posta">
	</head>
	<body>
        <div id="barra"><a href="https://iris.neikos.it:7071/zimbraAdmin/" target="_blank">Pannello di Amministrazione Zimbra</a></div>
		<div id="container">
			<div id="intestazione">CREAZIONE DOCUMENTAZIONE
			</div>
			<div id="container_form">
				<div id="container_form1">
					<div id="logo1"><img src="images/zimbra.png" />
					</div>
					<div id="form1">
						<div class="form">
							<form action="iris.php" method="POST" name="form1" id="form1">
							 <p><input type="text" name="email" value="" id="email" class="input" placeholder="E-Mail:"/>
							 <p><input type="text" name="password" value ="" id="pw" class="input" placeholder="Password:"/></p>
							 <p><input type="Checkbox" name="generator" value="1" id="generator" onClick="javascript:myFunction()" class="input" />Genera Password</p>
							 <p><input type="text" name="capacita" value =""  class="input" id="capacita" placeholder="Capacit&agrave;:"/></p>
							 <p><input type="text" name="alias" value="" id="alias" class="input" placeholder="Alias (opzionale):"/>
							 <p><input type="hidden" name="data" id="data" value=""></p>
							 <p><input type="submit" id="submit"></p>
							</form>
						</div>
					</div>
				</div>
				<div id="container_form2">
					<div id="logo2"><img src="images/gmail.png" />
					</div>
					<div id="form2">
						<div class="form">
							<form action="gmail.php" method="POST" name="form2" id="form2">
							 <p><input type="text" name="email" value="" id="email1" class="input" placeholder="E-Mail:"/>
							 <p><input type="text" name="password" value ="" id="pw1" class="input" placeholder="Password:"/></p>
							 <p><input type="Checkbox" name="generator" value="1" id="generator1" onClick="javascript:myFunction1()" class="input" />Genera Password</p>
							 <p><input type="text" name="capacita" value ="" class="input" id="capacita1" placeholder="Capacit&agrave;:"/></p>
							 <p><input type="text" name="alias" value="" id="alias1" class="input" placeholder="Alias (opzionale):"/>
							 <p><input type="hidden" name="data1" id="data1" value=""></p>
							 <p><input type="submit" id="submit1"></p>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
<html>
