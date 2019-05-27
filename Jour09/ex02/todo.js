var	ft_list;

window.onload = function ()
{
	document.getElementById("button_new").addEventListener("click", addTodo);
	ft_list = document.getElementById("ft_list");
	readCookie() ;
}

function addTodo()
{
	task = prompt("Add things to do.", "task");
	if (task)
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
		var new_cookie = id+"="+task+"; expires=; path=/";
		document.cookie = new_cookie;
		addEntry(task, id);
	}
}

function addEntry(task, id)
{
	var div = document.createElement("div");
	div.className = "entry";
	div.innerHTML = task;
	div.id = id;
	div.addEventListener("click", deleteEntry);
	ft_list.insertBefore(div, ft_list.firstChild);
}

function deleteEntry()
{
	if(confirm("Delete this entry?" + this.id))
	{
		this.parentElement.removeChild(this);
		var all_cookies = document.cookie.split(';');
		for (var i = 0; i < all_cookies.length; i++ )
		{
			var temp = all_cookies[i].split("=");
			if (this.id == temp[0])
			{
				document.cookie = this.id+"=; expires= Thu, 01 Jan 1970 00:00:00 GMT ; path=/";
				break;
			}
		}
	}
}

function readCookie() 
{
	var x = document.cookie.split(';');
	for (var i = 0; i < x.length; i++ )
	{
		var task = x[i].split("=");
		if (task[1])
			addEntry(task[1], task[0]);
	}
}