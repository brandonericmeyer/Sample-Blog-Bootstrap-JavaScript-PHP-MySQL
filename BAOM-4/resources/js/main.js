var main = function(){};

main.title = "";
main.color;

/* 
* Stores the title to the database and query's flag color.
*/
main.saveBlog = function() {
  main.updateUserFeatures();

	document.getElementById("save-reply").innerHTML = "";
  document.getElementById("user-reply").innerHTML = "";
  document.getElementById('firstname').value = main.title;
	var name = main.title;
	if(name == "german" ||
		name == "english" ||
		name == "italian")
	{
	    main.createPreference();
	    main.queryLanguageColor(main.title);
	}
	else
	{
    if(name == "" || name == "The Blog")
    {
      var div = document.getElementById('save-reply');
      div.innerHTML += "Blog has been successfully updated!";
    }
    else
    {
      var div = document.getElementById('save-reply');
      div.innerHTML += "Not a valid template name.  Use 'German' or 'Italian' or 'English'";
    }
		
	}

  var titleElement = document.getElementsByClassName("blog-post-title");
  var title = titleElement[0].innerHTML;

  var blogElement = document.getElementById('editPost');
  var blog = blogElement.innerHTML;

  if(blog && title)
  {
    main.insertPost(title, blog);
  }
}

/* Updates language on template
*  language - english, german, or italian
*/
main.successfulSave = function() {
    var div = document.getElementById('save-reply');
    div.innerHTML += 'Your preferences are now saved!';
}

/* Checks the user's rights and updates
* page if user has access to certain features
*/
main.updateUserFeatures = function() {
	$.ajax({
          type: "POST",
          url: "isLoggedIn.php",
          data: {},
          success : function(result){
            if(result == "true")
            {
            	  // SIGN OUT link on nav bar
                var navbar = document.getElementById('member-login');
    			      navbar.innerHTML = 'SIGN OUT';
				        navbar.setAttribute("href", "signout.php");
                main.editPage();
            }
            else
            {
              var savebtn = document.getElementById("save-button");
              if (savebtn.style.display === "none") {
                  savebtn.style.display = "block";
              } else {
                  savebtn.style.display = "none";
              }
            }
          }
      });
}

/*
* Allows user to edit blog post
*/
main.editPage = function() {
  var edit = document.getElementById('editBtn');
  edit.innerHTML = "<a href='#' onclick='main.updatePost()'><i class='fa fa-edit'></i></a>";
}

main.updatePost = function() {
  document.getElementsByClassName("blog-post-title")[0].contentEditable = "true";
    document.getElementById("editPost").contentEditable = "true";

  var updateBlogInfo = document.getElementById('save-reply');
  updateBlogInfo.innerHTML = "You may now edit the first post content and title!";
 
}

/*
* Replaces blog post with stored database value
*/
main.postToBlog = function(post) {
  var blog = document.getElementById('editPost');
  blog.innerHTML = post;
}

/*
* Replaces title with stored database value
*/
main.postToTitle = function(post) {
  var titleElement = document.getElementsByClassName("blog-post-title");
  titleElement[0].innerHTML = post;
}