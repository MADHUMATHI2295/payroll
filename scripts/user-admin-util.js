
function myTrim(x) {
    return x.replace(/^\s+|\s+$/gm,'');
}
function ExtractEmpID(val){

    
    return val.slice(-4);

}

function GetQueryStringParams(sParam) {
    var sPageURL = window.location.search.substring(1);
    var sURLVariables = sPageURL.split('&');
    for (var i = 0; i < sURLVariables.length; i++)
    {
        var sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] == sParam)
           return sParameterName[1];
      
    }
}

function addSelectOptions(myObj)
{

    $.ajax({
        
        url:"../common/fetchDropDownValues.php", //the page containing php script to check
        type: "post", //request type,
        dataType: 'text',
        data: JSON.stringify(myObj),
        success: function(response) { 
            console.log(response);
            var res = response.split("`")
            console.log(res);
            $(res).each(function(i,val){
                optionarr = val.split('-')
                console.log(myTrim(optionarr[0]));
                if (myTrim(optionarr[0]) != "")
                    $("#" + myTrim(optionarr[0])).append($("<option/>", {
                        value: optionarr[1],
                        text: optionarr[1]
                    }));
            });
                    
        }
    });

}


function checkName(controlName, FieldName, blankFlag) {
        
       
    if (blankFlag != 'Y')  {
        if ( $("#"+controlName).val() == '') {
           bootbox.alert(FieldName + " can not be blank")  
           return false;
        }
        
    }
    if( /[^0-9\.]/g.test( $("#"+controlName).val() ) == false ) {
        bootbox.alert(FieldName + ': input is not alphanumeric');
        return false;
    }
    
    return true;

        

}

function checkSelectOption( controlName, FieldName) {
if ($(controlName + "option:selected").index() == 0) {
    bootbox.alert("Select " + FieldName  );
    return false;
}

return true;
}


$( document ).ready(function() {

    var myObj = {};
    //addSelectOptions(myObj);

    var act = GetQueryStringParams('action');

    
   
    

    $( "#btnSave" ).click(function() {

         
        //var tmp = $('#lblEmpID').text();

        var myObj = {};
        //myObj['EmpID'] = ExtractEmpID(tmp);
        myObj['UserID'] = $('#txtUserID').val();
        myObj['Password'] = $('#txtPassword').val();
        myObj['Role'] = $('#txtRole').val();
        
        console.log(myObj);
          $.ajax({
                url:"../salary/insertUserAdmin.php", //the page containing php script
                type: "post", //request type,
                dataType: 'text',
                data: JSON.stringify(myObj),
                    success: function(res) { 
                    console.log(res);
                    if (res==1)
                    {
                        alert("User ID inserted");
                    }
                    else
                        alert("User ID is invalid");
                    }
                
            });

        
        
    });


});
   
    

