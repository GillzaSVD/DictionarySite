$( document ).ready(function(){
	  $("a#eventclick").click(function(){
      var curText = $(this).text()
			var curId = $(this).attr('videoid')
			var valsrc = 'https://www.youtube.com/embed/'+curId
      $('h3').html(curText)
			$('iframe').attr('src',valsrc)
	  })
	})
