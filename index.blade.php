

<html>
<body>
<ul class="nav nav-tabs mb-2" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="pill" onclick="userTable()" href="#İlkSekme">Kullanıcıları Listele</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" data-toggle="pill" onclick="getTable2()" href="#ikinciSekme">Veritabanlarını Listele</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="pill" onclick="getRootTable()" href="#İlkSekme7">Paket Kontrolü</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="pill" onclick="getTable6()" href="#İlkSekme6">Yedekleri Görüntüle</a>
    </li>

</ul>


<div class="tab-content">
    <div id="İlkSekme" class="tab-pane active">
        <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#Modal">
            Kullanıcı Ekle
        </button>
        <div id="table">
        </div>
        <div class="modal fade" id="Modal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                       
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                    <h5>Lütfen Eklemek İstediğiniz Kullanıcı İsmini Giriniz </h5>
                    <form>
                    <input type="text" id="kullanıcıAdı">
                    </form>
                                </div>
                    
                    <div class="modal-footer">
                       
                        <button type="button" class="btn btn-primary" id="myBtn">Kullanıcı Ekle</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

   
        <div id="İlkSekme6" class="tab-pane">
           
            <div id="table6">
            </div>
        </div>
    
    
    
    
        <div id="İlkSekme7" class="tab-pane">
           
            <div id="table7">
            </div>
        </div>
    
           
   
    
        
    



    <div id="ikinciSekme" class=" tab-pane ">

    <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#Modal2">
            Veritabanı Ekle
        </button>
       
        <div id="table2">
        </div>

        <div class="modal fade" id="Modal2"  >
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times; </button>

                    </div>
                    <div class="modal-body">
                    <h5>Lütfen Eklemek İstediğiniz veritabanı İsmini Giriniz </h5>
                    <form>
                    <input type="text" id="dataBaseAdı">
                    </form>
                                </div>
                    
                    <div class="modal-footer">
                        
                        <button type="button" class="btn btn-primary" id="myBtn2" >
                            
                            Veritabanı Ekle</button>
                            
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="table2" >Kapat</button>
                        
                    </div>
                </div>
            </div>
        </div>




    </div>


</div>

@include('modal',[
    "id"=>"modaltest",
    "title" => " ",
    "url" => API('getYedekle'),
    "next" => "reload",
    "input"=>[
        "-:-" => "name:hidden",
    ],
    "submit_text" => ""
])

@include('modal',[
    "id"=>"modaltest2",
    "title" => "Veritabanı İsimleri ",
    
    "url" => API('yetkiVer'),
    "next" => "reload",
    "input"=>[
        "-:-" => "name:hidden",
    ],
    "submit_text" => "yetkiVer"
])
@include('modal',[
    "id"=>"modaltest3",
    "title" => "Veritabanı İsimleri",
    
    "url" => API('yetkiAl'),
    "next" => "reload",
    "input"=>[
        "-:-" => "name:hidden",
    ],
    "submit_text" => ""
])


<script>

var user="";
var databaseName="";
userTable();

function userTable(params) {
    Swal.fire({
        position: 'center',
        type: 'info',
        title: '{{__("Okunuyor...")}}',
        showConfirmButton: false,

    });
    request("{{API('userTable')}}", new FormData(), function(response) {
        Swal.close();
        $('#table').html(response);
        $('#table').find("table").DataTable({
            bFilter: true,
            "language": {
                url: "/turkce.json"
            }
        });

    }, function(error) {
        let json = JSON.parse(error);
        Swal.fire({
            position: 'center',
            type: 'error',
            title: json["message"],
            timer: 2000,

            showConfirmButton: false,
        });

    });
}
/*
function getTable10(params) {
    Swal.fire({
        position: 'center',
        type: 'info',
        title: '{{__("Okunuyor...")}}',
        showConfirmButton: false,

    });
    request("{{API('getTable10')}}", new FormData(), function(response) {
        Swal.close();
        $('#table2').html(response);
        $('#table2').find("table").DataTable({
            bFilter: true,
            "language": {
                url: "/turkce.json"
            }
        });

    }, function(error) {
        let json = JSON.parse(error);
        Swal.fire({
            position: 'center',
            type: 'error',
            title: json["message"],
            timer: 2000,

            showConfirmButton: false,
        });

    });
}
*/
/*
Swal.fire({
    position: 'center',
    type :'success',
    title :"Eklendi",
});
        
Swal.fire({
    position: 'center',
    type :'error',
    title :"Hata oldu",
});
*/
function getRootTable(params) {
    Swal.fire({
        position: 'center',
        type :'info',
        title :'{{__("Okunuyor...")}}',
        showConfirmButton:false,

    });
    request("{{API('getRootTable')}}" ,new FormData(),function(response){
        Swal.close();
        console.log(response);
        $('#table7').html(response);
        Swal.fire({
    position: 'center',
    type :'success',
    title :"paket yüklü"+response,
    timer: 2000,
});
     

    },function(error){
        let json =JSON.parse(error);
        Swal.fire({
            position: 'center',
            type :'error',
            title :json["message"],
        });

    });
}

function getTable6(params) {
    Swal.fire({
        position: 'center',
        type: 'info',
        title: '{{__("Okunuyor...")}}',
        showConfirmButton: false,

    });
    request("{{API('getFolder')}}", new FormData(), function(response) {
        Swal.close();
        $('#table6').html(response);
        $('#table6').find("table").DataTable({
            bFilter: true,
            "language": {
                url: "/turkce.json"
            }
        });

    }, function(error) {
        let json = JSON.parse(error);
        Swal.fire({
            position: 'center',
            type: 'error',
            title: json["message"],
            timer: 2000,

            showConfirmButton: false,
        });

    });
}


function getYedekleJS(params){
    var formData = new FormData();
    formData.append("name",($(params).find('#name').text())); //phpdeki fonksiyona parametre attık
    databaseName=($(params).find('#name').text());
    console.log(databaseName);
    request("{{API('getYedekle')}}" ,formData,function(response){
        Swal.close();
        $('#modaltest').modal("hide"); 
       // $('#modaltest').find(".modal-title").text(($(params).find('#name').text()));
        $('#table2').html(response);
        $('#table2').find("table").DataTable({
            bFilter: true,
            "language": {
                url: "/turkce.json"
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


function tableContentJs(params){
    var formData = new FormData();
    formData.append("databaseName",databaseName);
    formData.append("name",($(params).find('#name').text())); 
    request("{{API('tableContent')}}" ,formData,function(response){
      //  Swal.close();
        $('#table2').html(response);
        $('#table2').find("table").DataTable({
            bFilter: true,
            "language": {
                url: "/turkce.json"
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
function yekiVerJS(params){
    var formData = new FormData();
    formData.append("name",($(params).find('#name').text()));
    user=($(params).find('#name').text());
    request("{{API('databaseGet')}}" ,formData,function(response){
        Swal.close();
        $('#modaltest2').modal("show"); 
        $('#modaltest2').find('.modal-body').html(response);
     
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
function yekiAlJS(params){
    var formData = new FormData();
    formData.append("name",($(params).find('#name').text()));
    user=($(params).find('#name').text());
    request("{{API('databaseGet2')}}" ,formData,function(response){
        Swal.close();
        $('#modaltest3').modal("show"); 
        $('#modaltest3').find('.modal-body').html(response);
     
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



function yetkiJs(params){
    var formData = new FormData();

    formData.append("user",user);
formData.append("database",($(params).find('#name').text()));

    request("{{API('yetkiVer')}}" ,formData,function(response){
        Swal.fire({
    position: 'center',
    type :'success',
    title :"Yetki Verildi",
    timer :2000,
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
function yetkiKaldırJs(params){
    var formData = new FormData();

    formData.append("user",user);
formData.append("database",($(params).find('#name').text()));
    request("{{API('yetkiAl')}}" ,formData,function(response){
        Swal.fire({
    position: 'center',
    type :'success',
    title :"Yetki Kaldırıldı",
    timer :2000,
});
$('#modaltest3').modal("hide");
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
function permissionGetJs(params){
    var formData = new FormData();
    formData.append("name",($(params).find('#name').text())); //phpdeki fonksiyona parametre attık

    request("{{API('permissionGet')}}" ,formData,function(response){
        Swal.close();
       
        $('#table').html(response);
        $('#table').find("table").DataTable({
            bFilter: true,
            "language": {
                url: "/turkce.json"
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
function yedekleJs(params){
    var formData = new FormData();
    formData.append("name",($(params).find('#name').text())); //phpdeki fonksiyona parametre attık

    request("{{API('yedekle')}}" ,formData,function(response){
        Swal.fire({
    position: 'center',
    type :'success',
    title :"yedeklendi",
    timer :2000,
});
        //$('#modaltest').modal("show"); 
       // $('#modaltest').find(".modal-title").text(($(params).find('#name').text()));
        $('#table2').html(response);
        $('#table2').find("table").DataTable({
            bFilter: true,
            "language": {
                url: "/turkce.json"
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

function getTable2(params) {
    Swal.fire({
        position: 'center',
        type: 'info',
        title: '{{__("Okunuyor...")}}',
        showConfirmButton: false,

    });
    request("{{API('getTable2')}}", new FormData(), function(response) {
        Swal.close();
        $('#table2').html(response);
        $('#table2').find("table").DataTable({
            bFilter: true,
            "language": {
                url: "/turkce.json"
            }
        });

    }, function(error) {
        let json = JSON.parse(error);
        Swal.fire({
            position: 'center',
            type: 'error',
            title: json["message"],
            timer: 2000,

            showConfirmButton: false,
        });

    });
}




$("#myBtn").click(function() {

    var str = $("#kullanıcıAdı").val();

    var formData = new FormData();
    formData.append("par", str);
    request("{{API('userAdd')}}", formData, function(response) {
        Swal.close();
        $('#Modal').modal("hide");
    }, function(error) {
        let json = JSON.parse(error);
        Swal.fire({
            position: 'center',
            type: 'error',
            title: json["message"],
            timer: 2000,
            showConfirmButton: false,
        });

    });

});

$("#myBtn2").click(function() {

    var str = $("#dataBaseAdı").val();



    var formData = new FormData();
    formData.append("par", str);
    request("{{API('dataBaseAdd')}}", formData, function(response) {
        $('#Modal2').modal("hide");
    }, function(error) {
        let json = JSON.parse(error);
        Swal.fire({
            position: 'center',
            type: 'error',
            title: json["message"],
            timer: 2000,
            showConfirmButton: false,
        });

    });

});
</script>
</body>

</html>