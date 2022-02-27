<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
	<link rel="stylesheet" href="css/email.css">
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Display&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
	<style type="text/css" media="screen">
		*{
	padding: 0;
	margin: 0;
	box-sizing: border-box;
}
body{
	width: 100%;
}
html{
	height: 100%;
}
header{
	width: 100%;
	background-color: rgb(0,0,0,1);
	color: white;
	padding: 8px 10px;
	/*height: 50px;*/
}
.text span{
	font-family: 'Noto Sans Display', sans-serif;	
	font-size: 24px;
}
.logo img{
	float: left;
}
.text{
	text-align: center;
}

.body{
	display: flex;
	justify-content: center;
	align-items: center;
	position: relative;
	top: 2rem;
}
.box{
	width: 1030px;
	max-width: 100%;
	height: auto;
	padding: 10px 15px;
	/*border: 1px solid black;*/
}
.user{
	font-size: 20px;
	font-family: 'Open Sans', sans-serif;
}
.content{
	margin: 10px 0px;

}
.content p{
	text-indent: 50px;
	text-align: justify;
	font-size: 22px;
	color: #525050;
	-webkit-text-stroke-width: 0.2px;
	/*font-family: 'Open Sans', sans-serif;*/
	font-family: 'Roboto', sans-serif;
}
.information ul li{
	list-style-type: none;
	margin: 10px 0px;
}
.information ul li span{
	font-family: 'Roboto', sans-serif;
	font-size: 18px;
}
.button{
	margin: 20px 0px;
}
.button a{
	text-decoration: none;
	font-size: 20px;
	border-radius: 4px;
	color: white;
	padding: 15px 50px;
	/*font-family: 'Roboto', sans-serif;*/
	font-family: 'Open Sans', sans-serif;
	background-color: rgb(76,136,100);
}

	</style>
</head>
<body>


<!-- header -->
	<header>
		<div class="head">
			<div class="logo">
		<!-- 		<img src="image/bfp.png" alt="LOGO" title="Bureau of Fire Protection" width="70" height="70"> -->
			</div>
			<div class="text">
				<center><span>Account Verification</span></center>
			</div>
		</div>
	</header>
	<!-- end of header -->



	<!-- msg -->

	<div class="body">
		<div class="box">
			<div class="user">
				<p>Hello <span><b>{{USER_NAME}},</b></span></p>
			</div>
			<div class="content">
				<p>You are using this email: <span>{{EMAIL_ADD}}</span> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Praesentium atque vel suscipit maiores vitae sit accusamus magni dicta neque corrupti, eius saepe, numquam perferendis architecto labore esse nesciunt, blanditiis non!.Lorem ipsum dolor, sit amet consectetur adipisicing elit. Praesentium atque vel suscipit maiores vitae sit accusamus magni dicta neque corrupti, eius saepe, numquam perferendis architecto labore esse nesciunt, blanditiis non!</p>
			</div>
			<div class="information">
				<ul>
					
					<li><span><b>Device:</b> {{Device}}</span></li>
					<li><span><b>Operation System:</b> {{OS}}</span></li>
					<li><span><b>Browser:</b> {{Browser}}</span></li>
				</ul>
			</div>
			<div class="button">
				<center><a href="{{SITE_KEY}}">Account Verify</a></center>
			</div>
		</div>
	</div>

	<!-- end of msg -->

	
</body>
</html>