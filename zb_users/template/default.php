<?php include $this->template('header');?>
	<link rel="alternate" type="application/rss+xml" href="<#ZC_BLOG_HOST#>feed.php" title="<#ZC_BLOG_TITLE#>" />
</head>
<body class="multi default">
<div id="divAll">
	<div id="divPage">
	<div id="divMiddle">
		<div id="divTop">
			<h1 id="BlogTitle"><a href="<#ZC_BLOG_HOST#>"><#ZC_BLOG_NAME#></a></h1>
			<h3 id="BlogSubTitle"><#ZC_BLOG_SUB_NAME#></h3>
		</div>
		<div id="divNavBar">
<ul>
<#CACHE_INCLUDE_NAVBAR#>
</ul>
		</div>
		<div id="divMain">
<#template:article-multi#>
<div class="post pagebar"><#template:pagebar#></div>
		</div>
		<div id="divSidebar">
<#template:sidebar#>

		</div>
<?php include $this->template('footer');?>