

<html>
<body>
<ul class="nav nav-pills mb-2" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="pill" onclick="getTable()" href="#İlkSekme">Kullanıcıları Listele</a>
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




    <div id="ikinciSekme" class=" tab-pane ">

    <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#Modal2">
            DataBase Ekle
        </button>
        <div id="table2">
        </div>

        <div class="modal fade" id="Modal2">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                    </div>
                    <div class="modal-body">
                    <p>Lütfen Eklemek İstediğiniz DataBase İsmini Giriniz </p>
                    <form>
                    <input type="text" id="kullanıcıAdı">
                    </form>
                                </div>
                    
                    <div class="modal-footer">
                        
                        <button type="button" class="btn btn-primary" id="myBtn2">
                            Database Ekle</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>

                    </div>
                </div>
            </div>
        </div>




    </div>


</div>




<script>
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
        console.log("deneme");
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
        console.log("deneme");
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