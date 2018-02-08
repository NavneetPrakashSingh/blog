@extends('layouts.app')

@section('content')
<div class="container">
	
	@foreach($mainData as $data =>$value)
	<div class="form-group">
		<label for="id">Id :</label>
		<input type="text" class="form-control" id="id" value="{{$mainData[0]->parent_id}}">		

		<label for="heading">Heading :</label>
		<input type="text" class="form-control" id="heading" value="{{$mainData[0]->heading}}">			

		<label for="intro">Intro:</label>
		<input type="text" class="form-control" id="intro" value="{{$mainData[0]->intro}}">			

		<label for="topic">Topic:</label>
		<input type="text" class="form-control" id="topic" value="{{$mainData[0]->topic}}">	

		<label for="coverImage">Cover Image:</label>
		<input type="text" class="form-control" id="coverImage" value="{{$mainData[0]->cover_image}}">	

		<label for="author">Author:</label>
		<input type="text" class="form-control" id="author" value="{{$mainData[0]->author}}">	

		<label for="mainBody">Main Body:</label>
		<textarea name="myTextarea" id="myTextarea">{{$mainData[0]->main_body}}</textarea>

		<button class="btn btn-primary" onclick="updateFormPostFunction();">Update Data</button>                    
        <input type="hidden" name="_tokenForAjaxMainBody" id="_tokenForAjaxMainBody" value="{{ csrf_token() }}">						
	</div>
		
	@endforeach
</div>

@endsection