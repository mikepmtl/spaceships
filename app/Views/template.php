<!DOCTYPE html>
<html lang="en">
<html>
<head>

	<meta charset="utf-8">
	<meta name="description" content="PostCardMania test for Michael J. Pawlowsky">
	<meta name="author" content="Michael J. Pawlowsky">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

	<title>PostCardMania - Michael Pawlowsky</title>

    <!-- Stylesheets -->
	<link rel="stylesheet" href="assets/plugins/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/bootstrap/dist/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- JavaScript -->
    <script src="assets/plugins/jquery/dist/jquery.min.js"></script>
	<script src="assets/plugins/bootstrap/dist/js/bootstrap.min.js"></script>

    <script src="assets/js/public.js"></script>
    <script src="assets/js/public/home/index.js"></script>

</head>
<body>

<div class="container-fluid">

    <div class="row">
        <div id="header-image" class="col-md-12">
        </div>
    </div>

    <div class="row">
        <div id="header-title" class="col-md-12">
            <span class="title">Starships</span>
        </div>
    </div>


    <?php echo $content; ?>


</div>

<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	ga('create', 'UA-89183623-2', 'auto');
	ga('send', 'pageview');

</script>

</body>
</html>
