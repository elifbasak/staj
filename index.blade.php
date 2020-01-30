



  
        <ul class="nav nav-pills" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="pill" href="#İlkSekme">Klasor Ekle</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#ikinciSekme">Klasor Listele</a>
            </li>
           
        </ul>


        <div class="tab-content">
            <div id="İlkSekme" class=" tab-pane active">
                <br>

                <input type="text" id="myInput">

<button type="button" class="btn btn-primary" id="myBtn">klasor ekle</button>
            </div>

            <div id="ikinciSekme" class=" tab-pane fade"><br>
            <div class="row ">
                    <div class="col-md-6">
                    
                        <div id="table">
                     </div>
                        </div>
                <div class="col-md-6">
                <button style="display:none;" type="button" class="btn btn-primary" id="myBtn2">Geri</button>
                    <div id="table2">
                    
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

});

$("#myBtn2").click(function(){






request("{{API('getTableGeriDon')}}" ,new FormData(),function(response){
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
    $("#myBtn2").show();
    
    console.log($(params).find('#name').text());
    console.log("selam");
    console.log($(params).find('#date').text()); //finde name htmldeki id si date olanın textini al ama this kullanmadık ?
    var formData = new FormData();
    formData.append("paramaters",($(params).find('#name').text())); //phpdeki fonksiyona parametre attık

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