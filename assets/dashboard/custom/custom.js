jQuery(function ($) {
	  
	function toAjaxRemove(ajaxUrl){
		
		$('.toremove').on('click',function(event){
			
			event.preventDefault();
			var thisAct = $(this);
			var id = thisAct.data('id');
						
			if (confirm('Are you sure you want to remove this item ?')) {

				$.ajax({
					 type: "POST",
					 url: ajaxUrl,
					 data: {id: id},
					 dataType:'JSON', 
					 success: function(response){
							
							if( response == 'Success' ){
								thisAct.closest('li').css('background','red').hide('slow');
							}
							console.log(response);
					 },
					 error: function(jqXHR, textStatus, errorThrown) {
						  console.log(textStatus);
						  console.log(errorThrown);
					 }
				});
				
			} else {
				// Do nothing!
			}
			
		});
	}
	toAjaxRemove(base_url + "dashboard/settings/remove_qs_item");
	

	function readURL(input) {

	  if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function(e) {
		  $(input).closest('div').find('.actions_prev').html('<img src="'+ e.target.result +'" class="img-thumbnail"/>');
		}

		reader.readAsDataURL(input.files[0]);
	  }
	}

	$(".media_upload_prev").change(function() {
		readURL(this);
	});
		
	
	function qShortingSave(sData){
		
		console.log(base_url + "dashboard/settings/qShortingSave");
	//	console.log( 11111 );
		 
		$.ajax({
			 type: "POST",
			 url: base_url + "dashboard/settings/qShortingSave",
			 data: sData,
			 success: function(response) {
					
					console.log(response);
				//	console.log( 22222 );
			 },
			 error: function(jqXHR, textStatus, errorThrown) {
				//	console.log( 333333 );
					console.log(jqXHR);
					console.log(textStatus);
					console.log(errorThrown);
				//	console.log( 44444 );
			 }
		}); 
	}
		 
	 /* 
	function load_all_questions_DT(){
		var ajaxAction = base_url + "dashboard/settings/ajax_get_all_questions";
		
		$('#questionList').DataTable( {
				"ajax": ajaxAction,
			  'destroy': true,
			  'paging': true,
			  'lengthChange': true,
			  'searching': true,
			  'ordering': true,
			  'info': true,
			  'autoWidth': true,
				'initComplete': function(settings, json) {
						
					  $("tbody", this).sortable();
						
						toAjaxRemove(base_url + "dashboard/settings/remove_qs_item");
				},
				"columns": [
					{ "data": "sl" },
					{ "data": "question" },
					{ "data": "answer_option" },
					{ "data": "status" },
					{ "data": "action" }
				]
		} );
	}
	load_all_questions_DT();
	*/
	$("ul.question_list").sortable({
      handle: ".qShorting, .q_qnt",
		update: function (event, ui) {
			var qShorting= {};
			$('li', this).each(function (i) {
				var numbering = i + 1;
				$('.q_qnt span',this).text(numbering);
				console.log($('button',this).data('qid'));
				qShorting[i] = $('button',this).data('qid');
			});
			qShortingSave(qShorting);
		}
    });
		
   $( "#selected_questions, #all_questions" ).sortable({
		
		connectWith: ".connectedSortable"
   }).disableSelection();
		
	$('#qusEditForm').on('show.bs.modal', function (event) {
		
		var button = $(event.relatedTarget); // Button that triggered the modal
		var recipient = button.data('whatever'); // Extract info from data-* attributes
		// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		var modal = $(this);
		modal.find('#question').val($(button).closest('li').find('.qs').text());
	//	console.log($(button).closest('li').find('.qs').text());
		modal.find('input[name="qid"]').val($(button).data('qid'));
		$('.answer_option').closest('label').removeClass('active');
		
		modal.find('.answer_option').each(function(){
		
		  if($(this).val() == $(button).closest('li').find('.ans').text())
			{
				//	console.log($(button).closest('li').find('.ans').text());
				$(this).prop( "checked", true ).closest('label').addClass('active');
			}
		});
		$('#status').prop( "checked", false );
		if('1' == $(button).closest('li').find('.sts').text()){
			
			$('#status').prop( "checked", true );
		}
	})
	
	

	function load_all_revs(){
		
		$('#totalRev').DataTable( {
				'ajax': base_url + "dashboard/page/dt_ajax_get_rev_list",
				'destroy': true,
				'paging': true,
				'lengthChange': true,
				'searching': true,
				'ordering': true,
				'info': true,
				'autoWidth': true,
				"columns": [
					{ "data": "sl" },
					{ "data": "inserted_at" },
					{ "data": "email" },
					{ "data": "pg_title" },
					{ "data": "average_rating" },
					{ "data": "action" }
				]
		} );
	}
	load_all_revs();
	   	
   $('.collapse').on('shown.bs.collapse', function () {
      $(this).closest('.row').find('.view_graph').text(" Hide Graph ");
   });

   $('.collapse').on('hidden.bs.collapse', function () {
     $(this).closest('.row').find('.view_graph').text(" Show Graph ");
   });

});



function rem_rev_questions(qid){
	swal({
		 title: "Are you sure?",
		 text: "Your will not be able to recover this review questions!",
		 type: "warning",
		 showCancelButton: true,
		 confirmButtonColor: "#DD6B55",
		 confirmButtonText: "Yes, delete it!",
		 showLoaderOnConfirm: true
	 },
	 function(){
		$.ajax({
			type: 'post',
			url: base_url + "dashboard/settings/rem_rev_questions",
			data: {qid:qid},
			success: function(res){
				if(res == 1){
					swal({title: "Deleted!",type: "success"},function(){
						location.reload();
					});
				} else{
					swal("Failed!", "There was a problem deleting your questions!", "danger");
				}
		    }
		}); 
	 });
}





