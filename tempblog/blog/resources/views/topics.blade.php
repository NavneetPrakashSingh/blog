@extends('layouts.mainlayout')

@section('mainLayoutContent')
 
    <div class="row"> 
    <div class="content-middle-align"><h4>{{$dataArray[0]->topic}}</h4></div>
    @foreach($dataArray as $data => $value)   	
  	<div class="col s12 m6 l4 custom-margin">
      <?php $postId = "/blog/".$value->id; $coverImage = $value->cover_image;?>
      <a href="{{URL::to("$postId")}}" class="pointer">
          <div class="card">
            <div class="card-image">
              <img src="{{URL::to("$coverImage")}}">
              <span class="card-title">{{$value->heading}}</span>
            </div>
            <div class="card-content">              
              <p>{{$value->intro}}</p>
            </div>            
          </div>
      </a>       
    </div>
         @endforeach
    </div>
    
   


@endsection