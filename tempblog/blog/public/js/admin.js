$(document).ready(function(){
	  $("#myTab a").click(function(e){
    	e.preventDefault();
    	$(this).tab('show');
    });

	 tinymce.init({
	    selector: '#myTextarea',
	    height: 250,
	    theme: 'modern',
	    plugins: [
	      'advlist autolink lists link image charmap print preview hr anchor pagebreak',
	      'searchreplace wordcount visualblocks visualchars code fullscreen',
	      'insertdatetime media nonbreaking save table contextmenu directionality',
	      'emoticons template paste textcolor colorpicker textpattern imagetools'
	    ],
	    extended_valid_elements : 'a[class|name|href|target|title|onclick|rel],script[type|src],iframe[src|style|width|height|scrolling|marginwidth|marginheight|frameborder],img[class|src|border=0|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|name],$elements' ,
	    toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
	    toolbar2: 'print preview media | forecolor backcolor emoticons',
	    image_advtab: true
	});

});

function addFormTitleFunction(){
	var title = $('#postTitle').val();
	var intro = $('#postIntro').val();
	var topic = $('#postTopic').val();
	var token = $('#_tokenForAjax').val();	
	$.ajax({
		type: 'POST',
		url: '/addTitle/',
		data:{'_token':token,'postTitle':title,'postIntro':intro,'postTopic':topic},
		success: function(response){
			$('#returning-msg').text(response);
			$('.success-msg').show();
		}
	});
}

function addFormPostFunction(){
	// alert('here');
	var token = $('#_tokenForAjaxMainBody').val();
	var authorName = $('#authorName').val();
	var mainBody = window.parent.tinymce.get('myTextarea').getContent();
	// alert(mainBody);
	$.ajax({
		type:'POST',
		url:'/addMainPost/',
		data:{'_token':token,'postAuthorName':authorName,'postMainBody':mainBody},
		success: function(response){
			$('#returning-msg-3').text(response);
			$('.success-msg-3').show();
		}
	})
}

function updateFormPostFunction(){
	
	var token = $('#_tokenForAjaxMainBody').val();
	var id=$('#id').val();
	var heading = $('#heading').val();
	var intro = $('#intro').val();
	var topic = $('#topic').val();
	var coverImage = $('#coverImage').val();
	var author = $('#author').val();
	var mainBody = window.parent.tinymce.get('myTextarea').getContent();
	
	jQuery.ajax({
		type:'POST',
		method: 'POST',		
		url:'/updatePost/',
		data:{'_token':token,'id':id,'heading':heading,'intro':intro,'topic':topic,'coverImage':coverImage,'author':author,'mainBody':mainBody},
		// data:{'_token':token},
		success: function(response){
			alert(response);
			// $('#returning-msg-3').text(response);
			// $('.success-msg-3').show();
		}
	});
}

function updateMainBodyPostFunction(){
	
	var mainBody = window.parent.tinymce.get('myTextarea').getContent();
	var token = $('#_tokenForAjaxMainBody').val();
	jQuery.ajax({
		type:'POST',
		url:'http://localhost:8000/updatePostBody/',
		// data:{'_token':token,'mainBody':mainBody},
		data:{'_token':token},
		success: function(response){
			alert(response);
			// $('#returning-msg-3').text(response);
			// $('.success-msg-3').show();
		}
	});
}

$(function() {
    Dropzone.options.addImages = {
	success: function(file,response){
		var finalUrl = window.location.protocol + "//" + window.location.host + "/"+response;
		console.log("append in gallery");
		$('#gallery-images').prepend('<span onclick=\"copyToClipboard(\''+finalUrl+'\' )\"><img src="'+finalUrl+'" class="img-rounded col-md-4" width="304" height="236"></span>')
		}
	}
});

function copyToClipboard(element) {
	
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val(element).select();
  document.execCommand("copy");
  $temp.remove();
  $("#clipboardText").show().delay(5000).fadeOut();
}
