<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<td id="table-form">
        <form id="addForm">
        	size : <input type="text" name="size" id="size">
          <input type="submit" id="save-button" value="Save">
        </form>
      </td>
 <script type="text/javascript" src="../../js/jquery.js"></script>
      <script>

        //Function For Form Data To Json Object
function JsonData(targetForm){
  var arr=$(targetForm).serializeArray(); //Now convert All form values into an array
  //console.log(arr); //name: "sname", value: "prince" 

  var obj1={};      // Create empty object
  
  for(i=0; i<arr.length; i++){
    //validation: check values empty or not
    if(arr[i].value == ""){
      return false;
    }
    obj1[arr[i].name] = arr[i].value;    //insert values to object
    //console.log(arr[i].name);         //sname,sage,scity=="prince","23","India"
  }
  
  //console.log(obj1); //Now We have javascript object

  var json_string=JSON.stringify(obj1);
  //console.log(json_string);  //Now convert javascript object to Json Object
  return json_string;
}



      	//Insert New Record
  $("#save-button").on("click",function(e){
  e.preventDefault(); //Refresh submit functionality off
  var jsonobj = JsonData("#addForm");  //Get Json data Of Form Values 
  //console.log(jsonobj);
  if(jsonobj==false){
    console.log("Lỗi");
    Message("All Fields Are Required",false); //Call Message Function
  }else{
    $.ajax({
      url: "http://localhost:8080/WORK_SPACE/dacn1_fashion/RestAPI/size/create.php",
      type: "POST",
      data: jsonobj,
      success:function(data){
       Message(data.message,data.status); 
       if(data.status==true){
          loadTable(); //table reload
          $("#addform").trigger('reset'); //form empty ho jayega
        }
      }
    });
  }
});
      </script>
</body>
</html>