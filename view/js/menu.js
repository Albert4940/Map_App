
/*function openMenu(evt, menuName){
               
    var i, tabcontent, item;
    
    // Get all elements with class="tablinks" and remove the class "active"
   item = document.getElementsByClassName('item');
    for(i = 0; i < item.length; i++){
        item[i].className = item[i].className.replace(" active","");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
     document.getElementById(menuName).style.display = "block";
    evt.currentTarget.className += " active";
}

document.getElementById("myItem").click();*/
(function($){
	//console.log($('#myItem').html());
	function openMenu(evt, menuName){
               
    var i, tabcontent, item;
    
    // Get all elements with class="tablinks" and remove the class "active"
   item = document.getElementsByClassName('item');
    for(i = 0; i < item.length; i++){
        item[i].className = item[i].className.replace(" active","");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
     //document.getElementById(menuName).style.display = "block";
    evt.currentTarget.className += " active";
}

//document.getElementById("myItem");
})(jQuery)