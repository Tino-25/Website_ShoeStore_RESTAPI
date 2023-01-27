$(document).ready(function(){

  //User

  // hiển thị user chi tiết để update
  var idUser = $(".idUser").val();
  $.ajax({
    url:  basicUrl+"RestAPI/user/read_one.php?idUser="+idUser,
    type: "GET",
    success:function(data){ 
      $("#Division").val(data[0]['idDivision']);
      $("#FirstName").val(data[0]['firstName']);
      $("#LastName").val(data[0]['lastName']);
      $("#inputEmail4").val(data[0]['email']);
      $("#inputPassword4").val(data[0]['password']);
      $("#Sex").val(data[0]['sex']);
      $("#Phone").val(data[0]['phone']);
      $("#inputAddress").val(data[0]['address']);
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
        if(typeof curent_admin != 'undefined' && value.idUser == curent_admin){
          var btn_delete = "<button id='delete-btn' style='cursor: not-allowed; pointer-events:none; user-select: none; opacity: 0.5;' data-iddelete="+value.idUser+">Delete</button>"
          var btn_update = "<a id='update-btn' style='cursor: not-allowed; pointer-events:none; user-select: none; opacity: 0.5;' href='?mod=user&act=update&idUser="+value.idUser+"'>Update</a>"
        }else{
          var btn_delete = "<button id='delete-btn' data-iddelete="+value.idUser+">Delete</button>"
          var btn_update = "<a id='update-btn' href='?mod=user&act=update&idUser="+value.idUser+"'>Update</a>"
        }
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
            btn_delete+
            "<br>"+
            btn_update+
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
      if(!isNaN(key)){
        $("#Division").append(
          "<option value="+value.idDivision+">"+value.divisionName+"</option>"
          );
      }
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


