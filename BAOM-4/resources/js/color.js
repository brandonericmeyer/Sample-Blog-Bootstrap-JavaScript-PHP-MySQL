/*
* Updates the theme color.
*/
main.updateColor = function(color) {
    switch(color) {
	    case "english":
	        document.getElementById("nav-masthead").style.backgroundColor="#0a3d62";
	        document.getElementById("nav-masthead").style.color="white";
	        break;
	    case "german":
	    	document.getElementById("nav-masthead").style.backgroundColor="yellow";
	        document.getElementById("nav-masthead").style.color="black";
	        break;
	    case "italian":
	    	document.getElementById("nav-masthead").style.backgroundColor="green";
	        document.getElementById("nav-masthead").style.color="red";
	        break;
	} 
}

/*
* Color theme validation
*/
function flagValidation(jsonResponse)
{
	switch(main.title) {
	    case "german":
	       	if(jsonResponse.search("yellow") != -1)
	       	{
	       		main.updateColor(main.title);
	       	}
	        break;
	    case "english":
	        if(jsonResponse.search("blue") != -1)
	       	{
	       		main.updateColor(main.title);
	       	}
	        break;
	    case "italian":
	        if(jsonResponse.search("red") != -1)
	       	{
	       		main.updateColor(main.title);
	       	}
	        break;
	    default:
	        return;
	} 
}