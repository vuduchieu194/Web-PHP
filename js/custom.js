

// dang nhap bang tai khoan google
  // function onSignIn(googleUser) {
  // var profile = googleUser.getBasicProfile();
  // console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
  // console.log('Name: ' + profile.getName());
  // console.log('Image URL: ' + profile.getImageUrl());
  // console.log('Email: ' + profile.getEmail());
  // console.log(profile);
  // };

  // function signOut() {
  //   var auth2 = gapi.auth2.getAuthInstance();
  //   auth2.signOut().then(function () {
  //     console.log('User signed out.');
  //   });
  // };

// auth2 is initialized with gapi.auth2.init() and a user is signed in.

// if (auth2.isSignedIn.get()) {
//   var profile = auth2.currentUser.get().getBasicProfile();
//   console.log('ID: ' + profile.getId());
//   console.log('Full Name: ' + profile.getName());
//   console.log('Given Name: ' + profile.getGivenName());
//   console.log('Family Name: ' + profile.getFamilyName());
//   console.log('Image URL: ' + profile.getImageUrl());
//   console.log('Email: ' + profile.getEmail());
// }


///////////////////////////////////////

$(document).ready(function()
{
  // active modal
  $('#test_modal').modal('show');

  // Tu dong cap nhat tong gia thanh khi thay doi gia tri input so luong san pham trong cart.php
  $('.soluongsanpham').on("change", function()
  {
    var tonghoadon = 0;
    var soluong = $(this).val();
    var dongiasanpham = $(this).closest(".panel-body").find(".dongiasanpham").text();
    var thanhtiensanpham = soluong * dongiasanpham;
    $(this).closest(".panel-body").find(".thanhtiensanpham").html(thanhtiensanpham);

    var array_dongia = $(document).find(".thanhtiensanpham");
    // console.log(array_dongia);
    for (var i = 0; i < array_dongia.length; i++) {
      var dongiasanpham_i = $(array_dongia[i]).text();
      // console.log(i);
      // console.log(dongiasanpham_i);
      tonghoadon += parseInt(dongiasanpham_i);
    }
    // console.log(tonghoadon);
    $('#tongthanhtoan').html(tonghoadon);
  });


  $(".sort-item").on("click", [0], function()
  { 
      alert("adsf"); 
  });


});



// them san pham vao wishlist
function add_to_wishlist() {
    $.ajax({
      url : "wishlist.php",
      type : "post",
      dateType:"text",
      data : {
           idkhach : $('#idkhachhang').val(),
           idsanpham : $('#idsanpham').val()
      },
      success : function(data) {
        console.log(data);
      }
  });
  $('#add-to-wishlist').html("added to wishlist!");
  $('#add-to-wishlist').css("background-color", "white");
  $('#add-to-wishlist').css("color", "black");
}


// Khoi tao function request AJAX
function request(url, data, success){
  console.log("call to url: " + url);
  $.ajax({
    url : url,
    type : "post",
    dateType:"text",
    data : data,
    success : function(data) {
      console.log(data);
      data = JSON.parse(data);
      success(data);
    }
  });
}


// edit database khach hang 
function edit_field (id) {
  var hoten = $(".edit_hoten_" + id).val();
  var diachi = $(".edit_diachi_" + id).val();
  var email = $(".edit_email_" + id).val();
  var dienthoai = $(".edit_dienthoai_" + id).val();
  var trangthai = $(".edit_trangthai_" + id).val();
  request("edit_khachhang.php", 
    {
         idkhach : id,
         hoten : hoten,
         diachi : diachi,
         email : email,
         dienthoai : dienthoai,
         trangthai : trangthai
    }, 
    function(data){
      if (data.error == 0){
        alert(data.msg);
      }else{
        alert(data.msg);
      }
    });
}

// edit database san pham
function edit_field_sanpham(id) {
  // var tensanpham = $(".edit_tensanpham_" + id).val();
  var gia = $(".edit_gia_" + id).val();
  var nhom = $(".edit_nhom_" + id).val();
  var loai = $(".edit_loai_" + id).val();
  var mota = $(".edit_mota_" + id).val();
  var hinhanh = $(".edit_hinhanh_" + id).val();
  var trangthai = $(".edit_trangthai_" + id).val();
  request("edit_sanpham.php", 
    {
         idsanpham : id,
         // tensanpham : tensanpham,
         mota : mota,
         hinhanh : hinhanh,
         gia : gia,
         nhom : nhom,
         loai : loai,
         trangthai : trangthai
    }, 
    function(data){
      if (data.error == 0){
        alert(data.msg);
      }else{
        alert(data.msg);
      }
    });
}



// Them san pham vao database
function insert_sanpham () {
  var tensanpham = $(".insert_tensanpham").val();
  var hinhanh = $(".insert_hinhanh").val();
  var soluong = $(".insert_soluong").val();
  var gia = $(".insert_gia").val();
  var idnhom = $(".insert_nhom").val();
  var idloai = $(".insert_loai").val();
  var mota = $(".insert_mota").val();
  var trangthai = $(".insert_trangthai").val();
  request("insert_sanpham.php", 
    {
         tensanpham : tensanpham,
         hinhanh : hinhanh,
         soluong : soluong,
         gia : gia,
         idnhom : idnhom,
         idloai : idloai,
         mota : mota,
         trangthai : trangthai
    }, 
    function(data){
      console.log(data);
      if (data.error == 0){
        alert(data.msg);
      }else{
        alert(data.msg);
      }
    });
  
}


// tra loi phan hoi
function response_feedback(id) {
  // var tensanpham = $(".edit_tensanpham_" + id).val();
  var traloi = $(".edit_traloi_" + id).val();
  var trangthai = $(".edit_trangthai_" + id).val();
  request("response_feedback.php", 
    {
         idphanhoi : id,
         traloi : traloi,
         trangthai : trangthai
    }, 
    function(data){
      if (data.error == 0){
        alert(data.msg);
      }else{
        alert(data.msg);
      }
    });
}



  // Them phan hoi vao database
  function submit_feedback() {
    var tieude = $('#tieudephanhoi').val();
    var noidung = $('#noidungphanhoi').val();
    var idkhach = $('#idkhach').val();
    var idsanpham = $('#idsanpham').val();

    alert(tieude);
    alert(noidung);
    
    var errortieude = $('#errortieude');
    var errornoidung = $('#errornoidung');
    if (!tieude) {
      errortieude.html("Bạn cần nhập tiêu đề!");
      $('#tieudephanhoi').focus();
      return false;
    } else if (!noidung) {
      errornoidung.html("Bạn cần nhập nội dung!");
      $('#noidungphanhoi').focus();
      return false;
    }
    alert("Phản hồi của bạn sẽ được hiển thị trong giây lát!");
    request("do_feedback.php", 
    {
         tieude : tieude,
         noidung : noidung,
         idkhach : idkhach,
         idsanpham : idsanpham
    }, 
    function(data){
      console.log(data);
      if (data.error == 0){
        alert(data.msg);
      }else{
        alert(data.msg);
      }
    });
  }