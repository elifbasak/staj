

<html>
    <body>
    <ul class="nav nav-tabs mb-2" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="pill" onclick="userTable()" href="#İlkSekme">Kullanıcıları Listele</a>
        </li>
    
        <li class="nav-item">
            <a class="nav-link" data-toggle="pill" onclick="databaseTable()" href="#ikinciSekme">Veritabanlarını Listele</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="pill" onclick="packageControlJS()" href="#İlkSekme7">Paket Kontrolü</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="pill" onclick="getFolderJS()" href="#İlkSekme6">Yedekleri Görüntüle</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="pill" onclick="getFolderJS()" href="#sekmeReplikasyon">Replikasyon Durumu</a>
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
        
        
<div id="ikinciSekme" class=" tab-pane ">
    
        <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#Modal2">
            Veritabanı Ekle
        </button>

     
        <div  data-toggle="modal" data-target="#Modal9">
            
        </div>
       
           
            <div class="modal fade" id="Modal9">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <div class="modal-body">
                            <label for="exampleFormControlTextarea1">Tablo Ekle</label>
                            <textarea class="form-control" id="textarea1" rows="3"></textarea>
                         </div>
                        
                        <div class="modal-footer">
                           
                            <button type="button" class="btn btn-primary" id="myBtn9">Tablo Ekle</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                        </div>
                    </div>
                </div>
            </div>
       
        <div class="modal fade" id="Modal10">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">
                        <label for="exampleFormControlTextarea2">Sil</label>
                        <textarea class="form-control" id="textarea2" rows="3"></textarea>
                     </div>
                    
                    <div class="modal-footer">
                       
                        <button type="button" class="btn btn-primary" id="myBtn10">Sil</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                    </div>
                </div>
            </div>
        </div>
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

        <div class="modal fade" id="Modal3"  >
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times; </button>

                    </div>
                    <div class="modal-body">
                    <h5>Lütfen tabloya Eklemek İstediğiniz Girdileri Giriniz </h5>
                    <form>
                    <input type="text" id="tableInto">
                    </form>
                    </div>
                    
                    <div class="modal-footer">
                        
                        <button type="button" class="btn btn-primary" id="myBtn3" >
                            
                            Tabloya  Komut ile Ekle</button>
                            
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="table2" >Kapat</button>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="Modal10">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">
                        <label for="exampleFormControlTextarea1">delete</label>
                        <textarea class="form-control" id="textarea1" rows="3"></textarea>
                     </div>
                    
                    <div class="modal-footer">
                       
                        <button type="button" class="btn btn-primary" id="myBtn10"> Sil</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modaltest4">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">
                        
                     </div>
                    
                    <div class="modal-footer">
                       
                        <button type="button" class="btn btn-primary" id="myBtn4"> Manuel Ekle</button>
                        <button type="button" class="btn btn-primary" id="myBtn5"> Komut ile Ekle</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                    </div>
                </div>
            </div>
        </div>
        
    </div>


    <div id="sekmeReplikasyon" class="tab-pane active">
        <div id="tableReplica">
    </div>
</div>
        
            <div id="İlkSekme7" class="tab-pane">
               
                <div id="table7">
                </div>
            </div>
    </div>
    
    @include('modal',[
        "id"=>"modaltest",
        "title" => " ",
        "url" => API('showTableJS'),
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
        "title" => "Veritabanı İsimleri ",
        
        "url" => API('yetkiAl'),
        "next" => "reload",
        "input"=>[
            "-:-" => "name:hidden",
        ],
        "submit_text" => "yetkiAl"
    ])
    @include('modal',[
        "id"=>"modaltest6",
        "title" => "EXPLAIN ",
        
        "url" => API('explain'),
        "next" => "reload",
        "input"=>[
            "-:-" => "name:hidden",
        ],
        "submit_text" => ""
    ])
   
    @component('modal-component',[
        "id"=>"modaltest45",
        "title" => "Veritabanı İsimleri 2",
        "footer" => [
    
            "text" => "Ekle",
    
            "class" => "btn-primary",
    
            "onclick" => "addTableForm()"
    
        ]
       
    ])
    @endcomponent

    @component('modal-component',[
        "id"=>"modaltest5",
        "title" => "Tablo Girdileri",
        "footer" => [
    
            "text" => "Ekle",
           
            "class" => "btn-primary",
    
            "onclick" => "tableInfoTake()"
    
],

       
    ])
    @endcomponent
    <script>
    
    var user="";
    var databaseName="";
    var tableName="";
    var selectId="";
    var tablCreate="";
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
    function tableAdd(params){
        Swal.fire({
            position: 'center',
            type: 'info',
            title: '{{__("Okunuyor...")}}',
            showConfirmButton: false,
    
        });

        var formData = new FormData();
        formData.append("tableName",($(params).find('#textarea1').text()));
        consele.log($(params).find('#textarea1').text());
        request("{{API('databaseGet2')}}", new FormData(), function(response) {
            Swal.close();
          
            
    
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
    function packageControlJS(params) {
        
        Swal.fire({
            position: 'center',
            type :'info',
            title :'{{__("Okunuyor...")}}',
            showConfirmButton:false,
    
        });
        request("{{API('packageControl')}}" ,new FormData(),function(response){
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
    
    function getFolderJS(params) {
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
    
    
    function showTableJS(params){
        var formData = new FormData();
        formData.append("name",($(params).find('#name').text())); //phpdeki fonksiyona parametre attık
        databaseName=($(params).find('#name').text());
        console.log(databaseName);
        request("{{API('showTable')}}" ,formData,function(response){
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
        tableName= ($(params).find('#name').text());
        request("{{API('tableContent')}}" ,formData,function(response){
            Swal.close();
            $('#modaltest4').modal("show"); 
            $('#modaltest4').find('.modal-body').html(response);
            
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
    
    function databaseTable(params) {
        Swal.fire({
            position: 'center',
            type: 'info',
            title: '{{__("Okunuyor...")}}',
            showConfirmButton: false,
    
        });
        request("{{API('databaseTable')}}", new FormData(), function(response) {
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
    function tableAddJs(){
        $('#Modal9').modal();
        tablCreate= $("#textarea1").val();
    var formData = new FormData();
    

    request("{{API('')}}", formData, function(response) {
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
      
    $("#myBtn4").click(function() {
        addTableForm();
    
});
$("#myBtn5").click(function() {
    $('#modaltest4').modal("hide");
    $('#Modal3').modal("show");

    
});

    $("#myBtn9").click(function() {
    
   

    var formData = new FormData();
    formData.append("par", tablCreate);
    formData.append("databaseName", databaseName);
    console.log(tablCreate);
    console.log(databaseName);
    request("{{API('tableAdd')}}", formData, function(response) {
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
$("#myBtn10").click(function() {
    
    idSelect= $("#textarea2").val();

    var formData = new FormData();
formData.append("databaseName",databaseName);

formData.append("name",tableName); 
formData.append("par",idSelect); 

        
    request("{{API('deleteFromTable')}}", formData, function(response) {
        Swal.close();
        $('#Modal10').modal("hide");
        console.log(response);
        if(response.indexOf('DELETE 1')!=-1){
            Swal.fire({
        position: 'center',
        type :'success',
        title :"Silindi",
    }); }
    else
    {
        Swal.fire({
        position: 'center',
        type :'error',
        title :"Hata oldu",
    });
    }
        
   
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
    
    $("#myBtn3").click(function() {
        //console.log(tableName);
    var str = $("#tableInto").val();
    var formData = new FormData();
    formData.append("par", str);
    //formData.append("tableName",tableName);
    
    request("{{API('addTableInto')}}", formData, function(response) {
        $('#Modal3').modal("hide");
       
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

    
    
    
    
    function addTableForm(){
        var formData = new FormData();
        formData.append("databaseName",databaseName);
    formData.append("name",tableName); 
    request("{{API('addTableForm')}}", formData, function(response) {
        $('#Modal3').modal("hide");
        $('#modaltest5').modal("show"); 
            $('#modaltest5').find('.modal-body').html(response);
    
           
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

    function explainJs(params){
        var formData = new FormData();
        formData.append("databaseName",databaseName);
        tableName= ($(params).find('#name').text());
    formData.append("tableName",tableName); 
    request("{{API('explain')}}", formData, function(response) {
       
        $('#modaltest6').modal("show"); 
            $('#modaltest6').find('.modal-body').html(response);
    
           
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

    function deleteFromTableJs(params){
        $('#Modal10').modal();
        idSelect= $("#textarea2").val();
        
        
        tableName= ($(params).find('#name').text());
       

     
    
    }
    function tableInfoTake(){
        var formData = new FormData();
        formData.append("databaseName",databaseName);
    formData.append("name",tableName); 
    //console.log($('#tableForm').serializeArray());
   var array= JSON.stringify($('#tableForm').serializeArray());
    formData.append('data', array);
    request("{{API('addTableInto2')}}", formData, function(response) {
       
        $('#modaltest5').modal("hide");
        
        $('#modaltest4').modal("hide"); 
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
    function deleteFromContentJS(params){
        var formData = new FormData();
       
        formData.append("id",($(params).find('#id').text()));
        formData.append("databaseName",databaseName);
        formData.append("name",tableName); 
        request("{{API('deleteFromContent')}}", formData, function(response) {
       
       
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
    
    </script>
    </body>
    
    </html>


