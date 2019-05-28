$(document).ready(function ()
{
	readCookie();
	$("#button_new").click(function()
	{
		var all_cookies = document.cookie;
		var list_cookies = all_cookies.split(";");
		var max_id = 0;
		for (var p = 0; p < list_cookies.length; p++)
		{
			var temp = list_cookies[p].split("=");
			if (temp[0])
				max_id = temp[0];
			else
				max_id = 0;
		}
		var id = parseInt(max_id) + 1;
		task = prompt("Add things to do.", "task"+id);
		if (task)
		{
			var new_cookie = id+"="+task+"; expires=; path=/";
			document.cookie = new_cookie;
			addEntry(task, id);
		}
	});
});

function addEntry(task, id)
{
	var div = document.createElement("div");
	div.className = "entry";
	div.innerHTML = task;
	div.id = id;
	$('#h').after(div);
	$("#"+id).click(function()
	{
		if(confirm("Delete entry num :" + this.id+" ?"))
		{
			this.parentElement.removeChild(this);
			var all_cookies = document.cookie.split(';');
			for (var i = 0; i < all_cookies.length; i++ )
			{
				var temp = all_cookies[i].split("=");
				if (this.id == temp[0].replace(" ", ""))
				{
					document.cookie = this.id+"=; expires= Thu, 01 Jan 1970 00:00:00 GMT ; path=/";
					break;
				}
			}
		}
	});
}

function readCookie() 
{
	var x = document.cookie.split(';');
	for (var i = 0; i < x.length; i++ )
	{
		var task = x[i].split("=");
		if (task[1])
		{
			addEntry(task[1], task[0].replace(" ", ""));
		}
	}
}