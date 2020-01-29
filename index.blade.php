
<div class="container">
        <div class="row ">

         
        <div class="col-md-3">
        <input type="text" id="myInput">

<button type="button" id="myBtn">klasor ekle</button>
</div>

    
        <div class="col-md-5">
        <div id="table">
</div>
        </div>





<div class="col-md-4">
<div id="table2">
</div>

</div>



</div>
</div>




<script>
$("#myBtn").click(function(){

    var str = $("#myInput").val();
   

    
    var formData = new FormData();
    formData.append("par",str);
    request("{{API('klasor')}}" ,formData,function(response){
        console.log("deneme");
    });

});
   


getRootTable();
function getRootTable(params) {
    Swal.fire({
        position: 'center',
        type :'info',
        title :'{{__("Okunuyor...")}}',
        showConfirmButton:false,

    });
    request("{{API('getRootTable')}}" ,new FormData(),function(response){
        Swal.close();
        $('#table').html(response);
        $('#table').find("table").DataTable({
            bFilter:true,
            "language" :{
                url:"/turkce.json"
            }
        });

    },function(error){
        let json =JSON.parse(error);
        Swal.fire({
            position: 'center',
            type :'error',
            title :json["message"],
            timer :2000,
            showConfirmButton:false,
        });

    });
}

function getTable(params){
    
    console.log($(params).find('#name').text());
    console.log($(params).find('#date').text());
    var formData = new FormData();
    formData.append("paramaters",($(params).find('#name').text()))
    request("{{API('getTable')}}" ,formData,function(response){
        Swal.close();
        $('#table2').html(response);
        $('#table2').find("table").DataTable({
            bFilter:true,
            "language" :{
                url:"/turkce.json"
            }
        });

    },function(error){
        let json =JSON.parse(error);
        Swal.fire({
        position: 'center',
        type :'error',
        title :json["message"],
      timer :2000,
      showConfirmButton:false,
        });

    });
}






</script>
</body>
</html>