$(document).ready(function(){

// banner

function loadAll_banner(){
  $("#list-banner").html("");
  $.ajax({
    url: basicUrl+"RestAPI/banner/read.php",
    type: "GET",
    success: function(data){
      $.each(data, function(key, value){
        if(!isNaN(key)){
          if(value.active == 0){
            var btn_active = "<button id='active_banner' data-numactive=1 data-idbanner="+value.idBanner+">Active</button";
          }else{
            var btn_active = "<button id='active_banner' data-numactive=0 data-idbanner="+value.idBanner+">Inactive</button";
          }
          $("#list-banner").append("<tr>"+
            "<th id='idBanner'>"+value.idBanner+"</th>"+
            "<td><img class='img-showList' src='../assets/img/banner/"+value.image+"'></td>"+
            "<td>"+btn_active+"</td>"+
            "<td><div>"+
              "<button id='delete-btn-banner' data-idbanner="+value.idBanner+">Xóa</button>"+
              "<br>"+
              "<a href='#'>Sửa</a>"+
              "</div></td>"+
            "</tr>");
        }
      });
    }
  });
}

loadAll_banner();

// thêm banner

$("#save-button-banner").on("click", function(e){
  e.preventDefault();

  // lấy tên file (đầu tiên theo dạng object sau đó chuyển thành json)
  //để thêm vào db
  var filename = $("#input_file_banner")[0].files[0];
  var obj = {
    "image": filename['name']
  }
  var jsonobj=JSON.stringify(obj);
  console.log(jsonobj);
  $.ajax({
    url: basicUrl+"RestAPI/banner/create.php",
    type: "POST",
    data: jsonobj,
    success: function(data){
      console.log("đã thêm vào db tên ảnh")
    }
  });


  // upload ảnh
  var fd = new FormData();
  var files = $('#input_file_banner')[0].files;
  // kiểm tra file đã được chọn hay chưa
  if(files.length > 0 ){
    //image như là name của tag input nhận được bên file upload
    fd.append('image2',files[0]);
    $.ajax({
      url: "../admin/upload.php",
      type: "POST",
      data: fd,
      contentType: false,
      processData: false,
      success: function(response){
        console.log(response);
        if(response != 0){
           alert('file uploaded');
            window.location = "?mod=banner&act=list";
        }else{
          alert('file not uploaded');
        }
      }
    });
  }else{
    alert("Please select a file.");
  }

});



// delete 

$(document).on("click", "#delete-btn-banner", function(){
  var idBanner = $(this).data("idbanner");
  //alert(idBanner);
  if(confirm("Bạn có muốn xóa "+idBanner+" không?")){
    $.ajax({
      url: basicUrl+"RestAPI/banner/delete.php?id="+idBanner,
      type: "GET",
      success:function(data){
        alert("Đã xóa thành công!!");
        loadAll_banner();
      }
    });
  }
});

//active banner

$(document).on("click", "#active_banner", function(){
  var idBanner = $(this).data("idbanner");
  var num_active = $(this).data("numactive");
  var obj = {
    "idBanner": idBanner,
    "num_active": num_active
  }
  var jsonobj=JSON.stringify(obj);
  console.log(jsonobj)
  //alert(num_active);
  if(confirm("Bạn có muốn active banner "+idBanner+" không?")){
    $.ajax({
      url: basicUrl+"RestAPI/banner/active.php",
      type: "POST",
      data: jsonobj,
      success:function(data){
        alert("Đã active thành công!!");
        loadAll_banner();
      }
    });
  }
});

});