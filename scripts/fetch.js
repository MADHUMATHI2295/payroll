


        

        $(document).ready(function() {
        $("#selMonth").on('change', function(){
           
            var Month = $(this).val();
            console.log(Month);
            $.ajax({
                type: "POST",
                url: "fetchvalue.php",
                data:{month:Month},
                success: function(response) {
    
                            debugger;
                }
            });
            return false;
    
        });
    
    });
           
        
    