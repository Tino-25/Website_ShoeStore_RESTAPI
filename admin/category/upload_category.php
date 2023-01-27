<?php

// image2 chính là từ ==>>> fd.append('image2',files[0]); trong ajax 
if(isset($_FILES['image2']['name'])){

   /* Getting file name - lấy tên tệp */
   $filename = $_FILES['image2']['name'];

   /* Location - vị trí - đường dẫn */
   $location = "../../assets/img/category/".$filename;
   // pathinfo: nhận dạng thông tin của đường dẫn truyền vào và lưu vào mảng
   //PATHINFO_EXTENSION: là chỉ nhận giá trị phần mở rộng của file
   $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
   // chuyển các ký tự trong chuỗi thành in thường
   $imageFileType = strtolower($imageFileType);

   /* Valid extensions - các mở rộng hợp lệ*/
   $valid_extensions = array("jpg","jpeg","png");

   $response = 0;  //0
   /* Check file extension - kiểm tra phần mở rộng tệp*/
   // in_array(giá trị cần kiểm tra, mảng vào) : kiểm tra giá trị vào có thuộc mảng vào không
   if(in_array(strtolower($imageFileType), $valid_extensions)) {
      /* Upload file */
      if(move_uploaded_file($_FILES['image2']['tmp_name'],$location)){
         $response = $location;
      }
   }

   echo $response;
   exit;
}

echo 0;