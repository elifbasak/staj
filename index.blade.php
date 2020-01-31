






  
        


      

           
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
        console.log(response);
        $('#table').html(response);
        

    },function(error){
        let json =JSON.parse(error);
        Swal.fire({
            position: 'center',
            type :'error',
            title :json["message"],
        });

    });
}







</script>
</body>
</html>