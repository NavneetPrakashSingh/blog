@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="bs-example">
    <ul class="nav nav-pills" id="myTab">
        <li class="active"><a href="#sectionTitle">Add Title</a></li>
        <li><a href="#sectionA">Add Images</a></li>
        <li><a href="#sectionB">Add Post</a></li>        
    </ul>
    <div class="tab-content">
        <div id="sectionTitle" class="tab-pane fade in active">
            <div class="alert alert-success success-msg" style="display:none;">
              <strong>Success!</strong> <span id="returning-msg"></span>
            </div>
            <h3>Add Title</h3>
            <div id="addFormTitle" >
                <div class="form-group">
                  <label for="usr">Add Title:</label>
                  <input type="text" class="form-control" id="postTitle">
                </div>
                 <div class="form-group">
                  <label for="usr">Add Intro:</label>
                  <input type="text" class="form-control" id="postIntro">
                </div>
                 <div class="form-group">
                  <label for="usr">Add Topic:</label>
                  <input type="text" class="form-control" id="postTopic">
                </div>                                               
                <div class="form-group">
                    <button class="btn btn-primary" onclick="addFormTitleFunction();">Submit Post Data</button>                    
                    <input type="hidden" name="_tokenForAjax" id="_tokenForAjax" value="{{ csrf_token() }}">
                </div>                
            </div>
            <div id="cover-image">
                <div class="form-group">
                  <label for="usr">Add Cover Image</label>
                  <form action="{{ url('/addCoverImage') }}" class="dropzone" id="addImages">
                          {{ csrf_field() }}
                  </form>                  
                </div>                              
            </div>
        </div>
        <div id="sectionA" class="tab-pane fade">
            <div class="alert alert-info success-msg" style="display:none;" id="clipboardText">
              <strong>Info!</strong> Text Copied To Clipboard
            </div>
            <h3>Add Images</h3>            
            <div class="row">
            	<div class="col-md-12">
            		<form action="{{ url('/addImage') }}" class="dropzone" id="addImages">
            		  {{ csrf_field() }}
            		</form>
            	</div>
            </div>
            <h3>Available Images</h3>
            <div class="row">
                <div class="col-md-12">
                    <div id="gallery-images">
                        
                            @foreach($tableData as $imageData => $values)
                                
                                    <span onclick="copyToClipboard( '{{url($values->image)}}' )">
                                        <img src="{{url($values->image)}} " class="img-rounded col-md-4" width="304" height="236">
                                    </span> 
                                                     
                            @endforeach   
                       
                    </div>                                     
                </div>
            </div>
        </div>
        <div id="sectionB" class="tab-pane fade">
            <div class="alert alert-success success-msg-3" style="display:none;">
              <strong>Success!</strong> <span id="returning-msg-3"></span>
            </div>
            <h3>Add Post</h3>
             <div class="form-group">
                <label for="usr">Add Author:</label>
                <input type="text" class="form-control" id="authorName">
            </div>

            <label for="usr">Add Main Post:</label>
            <textarea name="myTextarea" id="myTextarea"></textarea>

            <div class="form-group">
                <button class="btn btn-primary" onclick="addFormPostFunction();">Submit Post Data</button>                    
                <input type="hidden" name="_tokenForAjaxMainBody" id="_tokenForAjaxMainBody" value="{{ csrf_token() }}">
            </div>
        </div>        
    </div>
</div>
	</div>
@endsection