/* 
* Stores the title to the database.
*/
main.createPreference = function() {
    $.ajax({
                  type: "POST",
                  url: "save-user-preferences.php",
                  data: "name=" + name,
                  success : function(text){
                      main.successfulSave();
                  }
              });
}

/*
* Query's the database for correct template color.
*/
main.queryLanguageColor = function(str) {
    if (str == "") {
    	document.getElementById("save-reply").innerHTML = "";
        document.getElementById("user-reply").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("user-reply").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","read-theme-color.php?language="+str,true);
        xmlhttp.onload  = function() {
		   var jsonResponse = xmlhttp.response;
		   flagValidation(jsonResponse); // Query databas
		};
        xmlhttp.send();
    }
}

/*
* Used to authenticate the user.
*/
main.authenticate = function() {
  var username = document.getElementById('usrnm').value;
  var password = document.getElementById('pswd').value;
  console.log(username);
   $.ajax({
        type: "POST",
        url: "authenticate.php",
        data: {
              'username': username,
              'password': password
        },
        success : function(result){
          console.log(result);
          if(result == "true")
          {
              window.location.href = "index.php";
          }
        }
    });
}

/*
* Updates page with stored blog post
*/
main.queryPost = function() {
    var id = 2;
     $.ajax({
          type: "GET",
          url: "queryPost.php",
          data: {
            'id': id
          },
          success : function(result){
            main.postToBlog(result);
          }
      });
}

/*
* Updates page with stored blog post
*/
main.queryTitle = function() {
    var id = 2;
     $.ajax({
          type: "GET",
          url: "queryTitle.php",
          data: {
            'id': id
          },
          success : function(result){
            main.postToTitle(result);
          }
      });
}

/*
* After clicking save this will update the 
* title and blog post in database
*/
main.insertPost = function(title, blog) {  
     $.ajax({
          type: "POST",
          url: "insertPost.php",
          data: {
            'title': title,
            'blog' : blog
          },
          success : function(result){
          }
      });
}