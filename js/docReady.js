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

		var oTable = $('#purchaseRequestList').dataTable({
			"sDom": 'T<"clear">lfrtip',
			"bStateSave": true,
			"bLengthChange": false,
			"bPaginate": false,
			"oTableTools": { "sSwfPath":"copy_csv_xls_pdf.swf" }
		/*}).rowGrouping({
			bExpandableGrouping: true /*,
			asExpandedGroups: []        */
		});

		$('#dialog').dialog({
			 modal: true,
			 width: 700,
//			 height: 500,
			 autoOpen: false,
			 open: function(event, ui) {
				 // Allow closing by clicking outside dialog
				 $('.ui-widget-overlay').click(function(){ $('#dialog').dialog('close'); });
			 }
		});

		$('#purchaseRequestList tbody tr').click(function(){
			rowdialog($(this).attr('rowid'));
		});

});

function rowdialog(i) {
	// Array operator to get DOM node, not jQuery object
	var oTable = $('#purchaseRequestList').dataTable();
	var data = oTable.fnGetData( $("tr[rowid='"+i+"']")[0] );
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
	str += '<table>';
	str += '<tr><th>Requester</th><td>'+data[0]+'</td></tr>';
	str += '<tr><th>Librarian</th><td>'+data[1]+'</td></tr>';
	str += '<tr><th>Department</th><td>'+data[2]+'</td></tr>';
	str += '<tr><th>Title</th><td>'+data[3]+'</td></tr>';
	str += '<tr><th>Author</th><td>'+data[4]+'</td></tr>';
	str += '<tr><th>ISBN</th><td>'+data[5]+'</td></tr>';
	str += '<tr><th>Rush?</th><td>'+data[6]+'</td></tr>';
	str += '<tr><th>Notes</th><td>'+data[7]+'</td></tr>';
	str += '<tr><th>Date</th><td>'+data[8]+'</td></tr>';
	str += '<tr><th>Action</th><td>'+data[9]+'</td></tr>';
	str += '</table>';
	
	$('#dialog').html(str);
	$('#dialog').dialog('open');
}
