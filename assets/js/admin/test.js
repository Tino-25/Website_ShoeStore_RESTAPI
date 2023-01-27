$(document).ready(function(){

  //User

  // hiển thị user chi tiết để update
  var idUser = $(".idUser").val();
  $.ajax({
    url:  basicUrl+"RestAPI/user/read_one.php?idUser="+idUser,
    type: "GET",
    success:function(data){        
      $("#Division").val(data['idDivision']);
      $("#FirstName").val(data['firstName']);
      $("#LastName").val(data['lastName']);
      $("#inputEmail4").val(data['email']);
      $("#inputPassword4").val(data['password']);
      $("#Sex").val(data['sex']);
      $("#Phone").val(data['phone']);
      $("#inputAddress").val(data['address']);
    }
  });
  //Update Action
  $("#save-button").on("click",function(e){
    e.preventDefault(); // hành động mặc định của sự kiện sẽ không kích hoạt
    var jsonobj=JsonData("#updateForm"); //get json data using call function 
    console.log(jsonobj);
    $.ajax({
      url:  basicUrl+"RestAPI/user/update_full.php",
      type: "POST",
      data: jsonobj,
      success:function(data){
        window.location = "?mod=user&act=list";
      }
    });
    console.log("jkj");
});





//Show list user
function loadTable(){
  $("#list-user").html(""); //starting me empty ho jae
  $.ajax({
    url:  basicUrl+"RestAPI/user/read_full.php",
    type: "GET",
    success:function(data){
      //console.log(data);
      if(data.status==false){ //read json key
        $("#list-user").append("<tr><td colspan='6'><h2>"+data.message+"</h2></td></tr>");
      }else{
        $.each(data,function(key,value){
        //console.log(key+ " "+value.id);
        //console.table(data);
        if(!isNaN(key)){   // nếu key không phải là số thì chạy - vì trong json có status để check lỗi
          $("#list-user").append("<tr>"+
            "<th id='idUser' scope='row'>"+value.idUser+"</th>"+
            "<td>"+value.idDivision+"</td>"+
            "<td>"+value.lastName+" "+value.firstName+"</td>"+
            "<td>"+value.email+"</td>"+
            "<td>"+value.password+"</td>"+
            "<td>"+value.address+"</td>"+
            "<td>"+value.sex+"</td>"+
            "<td>"+value.phone+"</td>"+
            "<td>"+
            "<button id='delete-btn' data-iddelete="+value.idUser+">Delete</button>"+
            "<br>"+
            "<a id='update-btn' href='?mod=user&act=update&idUser="+value.idUser+"'>Update</a>"+
            "</td>"+
            "</tr>");
        }
      });
      }
    }
  });
}
loadTable();






//add - insert

// hiển thị form insert

$.ajax({
  url:  basicUrl+"RestAPI/division/read.php",
  type: "GET",
  success:function(data){  
    $.each(data,function(key,value){      
      $("#Division").append(
        "<option value="+value.idDivision+">"+value.divisionName+"</option>"
      );
    });
  }
});
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
      url:  basicUrl+"RestAPI/user/create_full.php",
      type: "POST",
      data: jsonobj,
      success:function(data){ 
          loadTable(); //table reload
          window.location = "?mod=user&act=list";
      }
    });
  }
});



// delete user

 //Delete Record
$(document).on("click","#delete-btn",function(){
  var idUser = $(this).data("iddelete");
  //alert(idUser);
  if(confirm("Bạn có muốn xóa "+idUser+" không?")){
    $.ajax({
        url:  basicUrl+"RestAPI/user/delete.php?id="+idUser,
        type: "GET",
        success:function(data){
          alert("Đã xóa thành công!!");
          loadTable();
        }
      });
  }
});







});


