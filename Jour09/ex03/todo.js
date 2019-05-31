var i = 0;

function strIsEmpty(str) {
	return (str.length === 0 || !str.trim());
}

function readfile()
{
	$.ajax({
		url : 'select.php',
		type : 'GET',
		dataType : 'json',
		success : function(list_jason, statut)
		{
			var elemid = 0;
			while (list_jason[elemid])
			{
				var temp = list_jason[elemid].trim().split(";");
				var id = temp[0];
				var task = temp[1];
				$("#h").after("<div class='entry' onclick=del(this) id="+id+">"+task+"</div>");
				elemid++;
				i++;
			}
	   }
	})
}

function del(elem)
{
	if (confirm("Delete entry this task ?")) 
	{ 
		var id = $(elem).attr('id');
		$.ajax({
			url : 'delete.php',
			data : 'id='+ id,
			type : 'GET',
			dataType : 'html',
			success : function(code_html, statut){ // code_html contient le HTML renvoyé
				$(elem).remove();
	       }
		})
	}
}

$(document).ready(function(){
	readfile();

	$("#button_new").click(function()
	{
		var todotask = prompt("Add things to do :");
		if (!strIsEmpty(todotask)) 
		{
			$.ajax({
				url : 'insert.php',
				type : 'GET',
				data : 'task='+todotask,
				dataType : 'html',
				success : function(code_html, statut)
				{
					var temp = code_html.trim().split(";");
					$("#h").after("<div class='entry' onclick=del(this) id="+temp[0]+">"+temp[1]+"</div>");
				}
			});
			i++;
		}
	});
});