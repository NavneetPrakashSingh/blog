@extends('layouts.mainlayout')

@section('mainLayoutContent')
<!-- for main heading and a good background -->
<div class="row">
  <div class="col s12 parallax-container">
        <div class="parallax" style="opacity:0.5"><img src="http://materializecss.com/images/parallax1.jpg"></div>
        <div class="row">
          <div class="col s12 m6 align-cards-main-page">
            <div class="card darken-1 dark-green">
              <div class="card-content white-text">              
                <h4>The easiest way to learn Data Science, Programming, Php and a lot more online.</h4>
                <p>Master the concepts from the comfort of your browser, at your own pace, tailored to your needs and expertise. We are there for you and we want to help!</p>
              </div>
              <div class="card-action">
                <a href="#">Data Science</a>
                <a href="#">PHP magento</a>
              </div>
            </div>
          </div>

          
          <?php $postId = "/blog/".$latestPost->id;?>
          <div class="col s12 m6">
           <div class="waves-effect waves-light btn align-heading" >
             Latest on makeMeTechie
           </div>
           <a href="{{URL::to("$postId")}}" class="pointer">
            <div class="card medium">
               <div class="card-image">
                <img src="{{$latestPost->cover_image}}">
                <span class="card-title">{{$latestPost->heading}}</span>
              </div>
              <div class="card-content">
                <p>{{$latestPost->topic}}</p>
                <br>
                <p>{{$latestPost->intro}}</p>
              </div>              
            </div>
          </a>
          </div>
        </div>


  </div>
</div>



<!-- for news api data -->
<h4><a href="{{URL::to("/latest-in-tech")}}">Latest In Tech News </a></h4>
<div class="your-class">

   <!--  <div class="row custom-margin">        
          <div class="card">
            <div class="card-image">
              <img src="http://materializecss.com/images/sample-1.jpg">
              <span class="card-title">Card Title</span>
            </div>
            <div class="card-content">
              <p>I am a very simple card. I am good at containing small bits of information.
              I am convenient because I require little markup to use effectively.</p>
            </div>
            <div class="card-action">
              <a href="#">This is a link</a>
            </div>
          </div>        
      </div> -->

      <!-- <div class="your-inner-class"></div> -->

<!--       <div class="row custom-margin">
          <div class="card">
            <div class="card-image">
              <img src="http://materializecss.com/images/sample-1.jpg">
              <span class="card-title">Card Title</span>
            </div>
            <div class="card-content">
              <p>I am a very simple card. I am good at containing small bits of information.
              I am convenient because I require little markup to use effectively.</p>
            </div>
            <div class="card-action">
              <a href="#">This is a link</a>
            </div>
          </div>
      </div>

      <div class="row custom-margin">
          <div class="card">
            <div class="card-image">
              <img src="http://materializecss.com/images/sample-1.jpg">
              <span class="card-title">Card Title</span>
            </div>
            <div class="card-content">
              <p>I am a very simple card. I am good at containing small bits of information.
              I am convenient because I require little markup to use effectively.</p>
            </div>
            <div class="card-action">This is a link</div>
          </div>
      </div>

      <div class="row custom-margin">
          <div class="card">
            <div class="card-image">
              <img src="http://materializecss.com/images/sample-1.jpg">
              <span class="card-title">Card Title</span>
            </div>
            <div class="card-content">
              <p>I am a very simple card. I am good at containing small bits of information.
              I am convenient because I require little markup to use effectively.</p>
            </div>
            <div class="card-action">
              <a href="#">This is a link</a>
            </div>
          </div>
      </div> -->
</div>


        



<!-- {{print_r($dataArray['Data Science'][0])}} -->
<!-- id, heading, intro, topic, coverImage, createdAt -->
  @foreach($dataArray as $data => $value) 
  <div class="row custom-margin"> 
    <?php $topicLink = "/blog/topic/".$data; ?>
    <a href="{{URL::to("$topicLink")}}" class="pointer"><h4 class="">{{$data}}</h4></a>
    @foreach($value as $clusterData => $clusterValue)    
    <div class="col s12 m6 l4">
      <?php $postId = "/blog/".$clusterValue['id'];?>
      <a href="{{URL::to("$postId")}}" class="pointer">
          <div class="card">
            <div class="card-image">
              <img src="{{$clusterValue['coverImage']}}">
              <span class="card-title">{{$clusterValue['heading']}}</span>
            </div>
            <div class="card-content">
              <p>{{$clusterValue['topic']}}</p>
              <br>
              <p>{{$clusterValue['intro']}}</p>
            </div>            
          </div>
      </a>
    </div>
    
    @endforeach
  </div>
  @endforeach

  
<div>
  
</div>

@endsection
