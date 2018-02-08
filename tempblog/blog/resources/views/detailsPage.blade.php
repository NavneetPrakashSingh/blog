@extends('layouts.mainlayout')

@section('mainLayoutContent')
<?php
	$colorArray = array('#1abc9c','#2ecc71','#3498db','#9b59b6','#34495e','#f1c40f','#e67e22','#e74c3c');
	$randomNumber = rand(0,7);

	$dataScienceImg = "http://makemetechie.com/images/59f5f47769852datascience.png";
	$programmingImg = "http://makemetechie.com/images/59f5f476ddf01programming.png";
	$objectOrientedImg = "http://makemetechie.com/images/59f5f475d81cephpoop.png";
	$phpMagentoImg = "http://makemetechie.com/images/59f5f474d56faphpmagento.png";
	$finalImg="";

	if($mainData[0]->topic == "Data Science") {
		$finalImg = $dataScienceImg;
	}else if($mainData[0]->topic == "Algorithm Analysis And Design"){
		$finalImg = $dataScienceImg;
	}else if($mainData[0]->topic == "PHP Magento"){
		$finalImg = $dataScienceImg;
	}else if($mainData[0]->topic == "PHP OOP"){
		$finalImg = $dataScienceImg;
	}else{
		$finalImg = "http://makemetechie.com/images/59f5f47427d8dlogo.png";
	}
?>
<div>
	<div class="row" style="height:200px">
		<div style="background-color:{{$colorArray[$randomNumber]}};height:100%;width:100%;">
			<div class="container">
				<span><img style="height:120px;float:left" src="<?php echo $finalImg ?>" alt=""></span>
				<div class="row">
					<div style="" class="details-heading">{{$mainData[0]->heading}}</div>
				</div>
				<div class="" style="color:white">By : {{$mainData[0]->author}}</div>
				<div class="" style="color:white">On : {{date('d F Y', strtotime($mainData[0]->created_at))}}</div>
			</div>
		</div>
	</div>
	
</div>
<div class="container">
	
	
	<div><?php echo $mainData[0]->main_body;?></div>
	
</div>

	
	
@endsection