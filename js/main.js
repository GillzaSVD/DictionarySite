$( document ).ready(function(){
	  $("a#eventclick").click(function(){
      var curText = $(this).text();
			var curId = $(this).attr('videoid');
			var valsrc = 'videos/'+curId;
      $('h3').html(curText);
			$('video').attr('src',valsrc);
	  })
	})
