<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>SIPEKA | <?= isset($title) ? $title : ''; ?></title>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
		<link rel="stylesheet" href="<?= site_url() ?>template/plugins/fontawesome-free/css/all.min.css">
		<link rel="stylesheet" href="<?= site_url() ?>template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
		<link rel="stylesheet" href="<?= site_url() ?>template/dist/css/adminlte.min.css?v=3.2.0">
		<script nonce="013f1f5b-b1bd-4f12-8d9d-e852ef7b44b8">(function(w,d){!function(eK,eL,eM,eN){eK.zarazData=eK.zarazData||{};eK.zarazData.executed=[];eK.zaraz={deferred:[],listeners:[]};eK.zaraz.q=[];eK.zaraz._f=function(eO){return function(){var eP=Array.prototype.slice.call(arguments);eK.zaraz.q.push({m:eO,a:eP})}};for(const eQ of["track","set","debug"])eK.zaraz[eQ]=eK.zaraz._f(eQ);eK.zaraz.init=()=>{var eR=eL.getElementsByTagName(eN)[0],eS=eL.createElement(eN),eT=eL.getElementsByTagName("title")[0];eT&&(eK.zarazData.t=eL.getElementsByTagName("title")[0].text);eK.zarazData.x=Math.random();eK.zarazData.w=eK.screen.width;eK.zarazData.h=eK.screen.height;eK.zarazData.j=eK.innerHeight;eK.zarazData.e=eK.innerWidth;eK.zarazData.l=eK.location.href;eK.zarazData.r=eL.referrer;eK.zarazData.k=eK.screen.colorDepth;eK.zarazData.n=eL.characterSet;eK.zarazData.o=(new Date).getTimezoneOffset();if(eK.dataLayer)for(const eX of Object.entries(Object.entries(dataLayer).reduce(((eY,eZ)=>({...eY[1],...eZ[1]})))))zaraz.set(eX[0],eX[1],{scope:"page"});eK.zarazData.q=[];for(;eK.zaraz.q.length;){const e_=eK.zaraz.q.shift();eK.zarazData.q.push(e_)}eS.defer=!0;for(const fa of[localStorage,sessionStorage])Object.keys(fa||{}).filter((fc=>fc.startsWith("_zaraz_"))).forEach((fb=>{try{eK.zarazData["z_"+fb.slice(7)]=JSON.parse(fa.getItem(fb))}catch{eK.zarazData["z_"+fb.slice(7)]=fa.getItem(fb)}}));eS.referrerPolicy="origin";eS.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(eK.zarazData)));eR.parentNode.insertBefore(eS,eR)};["complete","interactive"].includes(eL.readyState)?zaraz.init():eK.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,0,"script");})(window,document);</script>
	</head>
	<body class="hold-transition login-page">
		<div class="login-box">
			<div class="card card-outline card-primary">
				<div class="card-header text-center">
					<a href="<?= site_url() ?>template/index2.html" class="h1"><b>SIPEKA</b></a>
				</div>
				<div class="card-body">
					<p class="login-box-msg">Silakan Masukan Username dan Password</p>
					<form action="<?= site_url('admin/dashboard') ?>" method="GET">
						<div class="input-group mb-3">
							<input type="email" class="form-control" placeholder="Email">
							<div class="input-group-append">
								<div class="input-group-text">
									<span class="fas fa-envelope"></span>
								</div>
							</div>
						</div>
						<div class="input-group mb-3">
							<input type="password" class="form-control" placeholder="Password">
							<div class="input-group-append">
								<div class="input-group-text">
									<span class="fas fa-lock"></span>
								</div>
							</div>
						</div>
						<div class="social-auth-links text-center mt-2 mb-3">
							<button type="submit" class="btn btn-block btn-primary">
								Masuk
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<script src="<?= site_url() ?>template/plugins/jquery/jquery.min.js"></script>
		<script src="<?= site_url() ?>template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="<?= site_url() ?>template/dist/js/adminlte.min.js?v=3.2.0"></script>
	</body>
</html>