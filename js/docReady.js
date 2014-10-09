 $( document ).ready(function() 
{
     
     function checkCompletion()
     {
        $('#submit').attr('disabled', 'disabled');
        var mustHave = $('.mustHave');
        var mustHaveCount = mustHave.length;
        var completed = $('.completed');
        var completedCount = completed.length;
        
        //alert ('musthave '+mustHaveCount+ 'and completed '+completedCount);
        
       if (completedCount==mustHaveCount)
           {$('#submit').removeAttr('disabled');}
           else
              {$('#submit').attr('disabled', 'disabled');}
        
        
        
     }
     
     
     
      /* ******************** */
      /*  Detect Changes      */
      /* *******************  */

      $('#librarian').change(function()
        {
            
            if ( $(this).val() !="")
                { 
                    //alert('done');
                    $(this).addClass('completed');
                    var rowClass= $(this).attr('id');
                    var rowLocator = 'tr.'+rowClass;
                    $(rowLocator).addClass('complete');
                    $('span.librarian').html('Completed!');
                    
                }
                else
                { 
                    //alert('empty');
                    $(this).removeClass('completed');
                    var rowClass= $(this).attr('id');
                    var rowLocator = 'tr.'+rowClass;
                    $(rowLocator).removeClass('complete');
                    $('span.librarian').html('Required. Select from drop-down.');
                }
            checkCompletion();
	});
        
      $('#itemTitle').change(function()
        {
            if ( $(this).val() !="")
                { 
                    //alert('done');
                    $(this).addClass('completed');
                    var rowClass= $(this).attr('id');
                    var rowLocator = 'tr.'+rowClass;
                    $(rowLocator).addClass('complete');
                    $('span.itemTitle').html('Completed!');
                }
                else
                { 
                    //alert('empty');
                    $(this).removeClass('completed');
                    var rowClass= $(this).attr('id');
                    var rowLocator = 'tr.'+rowClass;
                    $(rowLocator).removeClass('complete');
                    $('span.itemTitle').html('Required.');
                }
            checkCompletion();
	});
        
      $('#authorEditor').change(function()
        {
            if ( $(this).val() !="")
                { 
                    //alert('done');
                    $(this).addClass('completed');
                    var rowClass= $(this).attr('id');
                    var rowLocator = 'tr.'+rowClass;
                    $(rowLocator).addClass('complete');
                    $('span.authorEditor').html('Completed!');
                }
                else
                { 
                    //alert('empty');
                    $(this).removeClass('completed');
                    var rowClass= $(this).attr('id');
                    var rowLocator = 'tr.'+rowClass;
                    $(rowLocator).removeClass('complete');
                    $('span.authorEditor').html('Required.');
                }
            checkCompletion();
	});

      $('#isbnOrWeb').change(function()
        {
            if ( $(this).val() !="")
                { 
                    //alert('done');
                    $(this).addClass('completed');
                    var rowClass= $(this).attr('id');
                    var rowLocator = 'tr.'+rowClass;
                    $(rowLocator).addClass('complete');
                    $('span.isbnOrWeb').html('Completed!');
                }
                else
                { 
                    //alert('empty');
                    $(this).removeClass('completed');
                    var rowClass= $(this).attr('id');
                    var rowLocator = 'tr.'+rowClass;
                    $(rowLocator).removeClass('complete');
                    $('span.isbnOrWeb').html('Required.');
                }
            checkCompletion();
	});
        
      $('#academicDept').change(function()
        {
            if ( $(this).val() !="")
                { 
                    //alert('done');
                    $(this).addClass('completed');
                    var rowClass= $(this).attr('id');
                    var rowLocator = 'tr.'+rowClass;
                    $(rowLocator).addClass('complete');
                    $('span.academicDept').html('Completed!');
                }
                else
                { 
                    //alert('empty');
                    $(this).removeClass('completed');
                    var rowClass= $(this).attr('id');
                    var rowLocator = 'tr.'+rowClass;
                    $(rowLocator).removeClass('complete');
                    $('span.academicDept').html('Required. Select from drop-down.');
                }
            checkCompletion();
	});
        
        
        
      $('#rush').change(function()
        {   /* if Rush is checked then require note */
            if($(this).is(':checked'))
                {
                  $('#notes').addClass('mustHave');
                  $('#noteReason').fadeOut(400, function(){
                        $('#noteReason').html('Reason for rush').fadeIn(400);
                  });
                  $('span.notes').html('Required. <br>Describe need for rush as well as any special instructions.');
                  $('span.rush').html('Rush selected. <br>Please add explanation to note.');
                  var rowClass= $(this).attr('id');
                  var rowLocator = 'tr.'+rowClass;
                  $(rowLocator).addClass('complete');
                  
                  
                }
               
                
            checkCompletion();
	});
        
      $('#norush').change(function()
        {   /* if noRush is checked then do not require note */
            if($(this).is(':checked'))
                {
                  $('#notes').removeClass('mustHave');
                  $('#noteReason').fadeOut(400, function(){
                        $('#noteReason').html('&nbsp;').fadeIn(400);
                  });
                  
                  $('span.notes').html('Optional.<br>Indicate special instructions, request a hold or notification, etc.');
                  $('span.rush').html('Optional. <br>If yes, please add explanation to note.');
                  var rowClass= $(this).attr('id');
                  var rowLocator = 'tr.'+rowClass;
                  $(rowLocator).removeClass('complete');
                 
                }
  
            checkCompletion();
	});
        
      $('#notes').change(function()
        {
            if( $(this).hasClass('mustHave'))
                {
                        if ( $(this).val() !="")
                    { 
                        //alert('done');
                        $(this).addClass('completed');
                        var rowClass= $(this).attr('id');
                        var rowLocator = 'tr.'+rowClass;
                        $(rowLocator).addClass('complete');
                    }
                    else
                    { 
                        //alert('empty');
                        $(this).removeClass('completed');
                        var rowClass= $(this).attr('id');
                        var rowLocator = 'tr.'+rowClass;
                        $(rowLocator).removeClass('complete');
                    }
                   checkCompletion(); 
                }
                else
                    {
                        
                    }
            
	});

		initTable('#purchaseRequestList');

		$('#dialog').dialog({
			 modal: true,
			 width: 700,
			 height: 425,
			 autoOpen: false,
			 open: function() {
				 // Allow closing by clicking outside dialog
				 $('.ui-widget-overlay').click(function(){ $('#dialog').dialog('close'); });
			 }
		});

});

function initTable(selector) {
		var oTable = $(selector).dataTable({
			"aaSorting": [[8, 'desc']],
			"aoColumns": [{bVisible: false}, null, null, null, null, null, null, null, {"sType": "date"}, null, null],
			"sDom": 'T<"clear">lfrtip',
			"bAutoWidth": false,
			"bDestroy": true,
			"bStateSave": true,
			"bLengthChange": true,
			"bPaginate": true,
			"oTableTools": { "sSwfPath":"copy_csv_xls_pdf.swf" }
		});

		// draw event isn't fired on table creation, so we have to do this twice
		$('#purchaseRequestList tbody tr').click(function(e){
			// Don't pop up dialog if we're a link
			// Credit: http://stackoverflow.com/a/3550649/217374
			if($(e.target).is('a')) return;
			rowdialog($(this).attr('rowid'));
		});
		oTable.on('draw', function() {
			$('#purchaseRequestList tbody tr').click(function(e){
				if($(e.target).is('a')) return;
				rowdialog($(this).attr('rowid'));
			});
		});

		return oTable;
}

function rowdialog(i) {
	$('#dialog').html('Loading...');

	var prev = $('tr[rowid="'+i+'"]').prev().attr('rowid');
	var next = $('tr[rowid="'+i+'"]').next().attr('rowid');
	var str = '';

	if (prev) {
		str += '<a class="navdiv left vcenter" onclick="rowdialog('+prev+')">&lt;</a>';
	} else {
		str += '<a class="navdiv left vcenter"></a>';
	}
	if (next) {
		str += '<a class="navdiv right vcenter" onclick="rowdialog('+next+')">&gt;</a>';
	} else {
		str += '<a class="navdiv right vcenter"></a>';
	}

	var get = $.get('dialog.php?id='+i);
	get.done(function(data) {
		str += data;
	});
	get.fail(function() {
		str += 'Failed to load dialog contents from the database! <a onclick="rowdialog('+i+')>Retry</a>';
	});
	get.always(function() {
		$('#dialog').html(str);
		$('#dialog').dialog('open');
		$('#submit').click(function(){
			var id = $('#rowid').val();
			var dept = $('#dept').val();
			var action = $('#action').val();
			var reason = $('#reason').val();
			var req = $.post('actionAjax.php', { id:id, dept:dept, action:action, reason:reason });
			$('#result').stop({clearQueue:true});
			$('#result').css('color', 'blue');
			$('#result').text('Saving...');
			req.done(function(){
				$('tr[rowid="'+id+'"] .action').html($('#action').find(':selected').text());
				$('tr[rowid="'+id+'"] .dept').html($('#dept').find(':selected').text());
				$('tr[rowid="'+id+'"] .reason').html($('#reason').val());
				initTable('#purchaseRequestList');
				$('#result').css('color', 'green');
				$('#result').text('Saved.');
				$('#result').animate({color:"white"}, 2000);
			});
			req.fail(function(){
				$('#result').css('color', 'red');
				$('#result').text('Error saving change');
				$('#result').animate({color:"white"}, 2000);
			});
		});
	});
}
