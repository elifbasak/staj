<div id="table">

</div>

<script>
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
}






</script><div id="table">

</div>

<script>
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
}






</script><div id="table">

</div>

<script>
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
}






</script>