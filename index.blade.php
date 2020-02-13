


<html>
<body>
<ul class="nav nav-tabs mb-2" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="pill" onclick="getTable()" href="#İlkSekme">Kullanıcıları Listele</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" data-toggle="pill" onclick="getTable6()" href="#İlkSekme6">Dosyaları Görüntüle</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="pill" onclick="getRootTable()" href="#İlkSekme7">Paket Kontrol</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="pill" onclick="getTable2()" href="#ikinciSekme">Databaseleri Listele</a>
    </li>

</ul>


<div class="tab-content">
    <div id="İlkSekme" class="tab-pane active">
        <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#Modal">
            Kullanici Ekle
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
                    <p>Lütfen Eklemek İstediğiniz Kullanıcı İsmini Giriniz </p>
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
            DataBase Ekle
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
                    <p>Lütfen Eklemek İstediğiniz DataBase İsmini Giriniz </p>
                    <form>
                    <input type="text" id="dataBaseAdı">
                    </form>
                                </div>
                    
                    <div class="modal-footer">
                        
                        <button type="button" class="btn btn-primary" id="myBtn2" >
                            Database Ekle</button>
                            
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
    "submit_text" => "TablolarıGöster"
])

@include('modal',[
    "id"=>"modaltest2",
    "title" => " ",
    
    "url" => API('yetkiVer'),
    "next" => "reload",
    "input"=>[
        "-:-" => "name:hidden",
    ],
    "submit_text" => "yetkiVer"
])
@include('modal',[
    "id"=>"modaltest3",
    "title" => " ",
    
    "url" => API('yetkiAl'),
    "next" => "reload",
    "input"=>[
        "-:-" => "name:hidden",
    ],
    "submit_text" => "yetki Kaldır"
])


<script>

var user="";

getTable();

function getTable(params) {
    Swal.fire({
        position: 'center',
        type: 'info',
        title: '{{__("Okunuyor...")}}',
        showConfirmButton: false,

    });
    request("{{API('getTable')}}", new FormData(), function(response) {
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
















function yekiVerJS(params){
    var formData = new FormData();
    formData.append("name",($(params).find('#name').text()));
    user=($(params).find('#name').text());
    request("{{API('getDataBase')}}" ,formData,function(response){
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
    request("{{API('getDataBase2')}}" ,formData,function(response){
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
        Swal.close();
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
        Swal.close();
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





function getYetkiJs(params){
    var formData = new FormData();
    formData.append("name",($(params).find('#name').text())); //phpdeki fonksiyona parametre attık

    request("{{API('getYetki')}}" ,formData,function(response){
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
        Swal.close();
        $('#modaltest').modal("show"); 
        $('#modaltest').find(".modal-title").text(($(params).find('#name').text()));
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