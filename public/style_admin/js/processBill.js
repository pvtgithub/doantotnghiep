function cancelBill(id,status) {
        $(document).ready(function(){
                alertify.confirm('Hủy đơn đặt hàng???', function(){
                        if(status == 'Đã đặt hàng' || status == 'Đã xác nhận'){
                                $.ajax({
                                        url: 'cancelBill',
                                        method: 'GET',
                                        data:{
                                                id: id,
                                                status: status
                                        },
                                        success: function(response){
                                                $('#add-item-detailBill').html(response);
                                                alertify.success('Đã hủy đơn đặt hàng!!!');
                                        }
                                })
                        }else{
                                alertify.error('Không thể hủy đơn hàng!!!');
                        }
                }).autoOk(5);
        });     
}


$(document).ready(function(){
        $(".btnDeleteBill").click(function(){
                var ele = $(this);
                var id = ele.attr('data-id');
                console.log(id);
                alertify.confirm("Xóa đơn hàng???",function(){
                        $.ajax({
                                url: 'deleteBill',
                                method: 'GET',
                                data:{
                                        id: id,
                                },
                                success: function(response) {
                                        $('#add-item-listBills').html(response);
                                        alertify.success('Đã xóa đơn!!!');
                                }
                        })
                })
        });

        $(".btnDeleteBillDetail").click(function(){
                var ele = $(this);
                var id = ele.attr('data-id');
                console.log(id);
                alertify.confirm("Xóa đơn hàng???",function(){
                        $.ajax({
                                url: 'deleteBill',
                                method: 'GET',
                                data:{
                                        id: id,
                                },
                                success: function(response) {
                                        alertify.success('Đã xóa đơn!!!');
                                        window.location.href = 'bills';
                                }
                        })
                })
        });

        $(".btnScreenShoot").click(function () {
                screenshot();
        });
});

function screenshot(){
           html2canvas(document.getElementById("bill__screenshoot")).then(function(canvas){
          downloadImage(canvas.toDataURL(),"ScreenshotBill.png");
           });
   }

   function downloadImage(uri, filename){
         var link = document.createElement('a');
         if(typeof link.download !== 'string'){
        window.open(uri);
         }
         else{
                 link.href = uri;
                 link.download = filename;
                 accountForFirefox(clickLink, link);
         }
   }

   function clickLink(link){
           link.click();
   }

   function accountForFirefox(click){
           var link = arguments[1];
           document.body.appendChild(link);
           click(link);
           document.body.removeChild(link);
   }

 //xác nhận đơn đặt hàng:
 function orderConfirm(id) {
         $(document).ready(function(){
                alertify.confirm('Xác nhận đơn đặt hàng???',function(){
                        $.ajax({
                                url: 'orderConfirm',
                                method: 'GET',
                                data:{
                                        id: id,
                                },
                                success: function(response){
                                        $('#add-item-detailBill').html(response);
                                        alertify.success('Xác nhận đơn hàng thành công!!!');
                                }
                        })
                }).autoOk(5)
        })
 }

 //giao hàng:
 function deliveryBill(id) {
        $(document).ready(function(){
                alertify.confirm('Gửi cho đơn vị vận chuyển???',function(){
                        $.ajax({
                                url: 'deliveryBill',
                                method: 'GET',
                                data:{
                                        id: id,
                                },
                                success: function(response){
                                        $('#add-item-detailBill').html(response);
                                        alertify.success('Đơn hàng đang được giao!!!');
                                }
                        })
                }).autoOk(5)
        })
}

 //giao hàng thành công:
 function completedBill(id) {
        $(document).ready(function(){
                alertify.confirm('Bạn đã nhận được hàng???',function(){
                        $.ajax({
                                url: 'completedBill',
                                method: 'GET',
                                data:{
                                        id: id,
                                },
                                success: function(response){
                                        $('#add-item-billDetail').html(response);
                                        alertify.success('Hoàn thành đơn hàng!!!');
                                }
                        })
                }).autoOk(5)
        })
}