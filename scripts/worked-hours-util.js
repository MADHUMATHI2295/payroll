
function myTrim(x) {
    return x.replace(/^\s+|\s+$/gm,'');
}
function ExtractEmpID(val){

    
    return val.slice(-4);

}
// function GetFormattedDate(val) {
//     console.log(val);
//     if (val == null) {
//         return "";
//     }
//     var tdate = new Date(val);
//     var month = tdate.getMonth() + 1;
//     var day = tdate.getDate();
//     var year = tdate.getFullYear();
//     return month + "-" + day + "-" + year;
// }

// function FormatDateforMySQL(val) {

//     if (val.trim() == "")
//         return val;
//     var tdate = new Date(val);
//     var month = tdate.getMonth() + 1;
//     var day = tdate.getDate();
//     var year = tdate.getFullYear();
//     return year + "-" + month + "-" + day;

// }

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

function fetchSalDetails(myObj)
{
    $.ajax({
            
        url:"../workedunits/fetchWorkedhours.php", //the page containing php script to check
        type: "post", //request type,
        dataType: 'text',
        data: JSON.stringify(myObj),
        success: function(response) { 
                console.log(response);
                if (!response.includes("nothing"))
                {
                    var json = $.parseJSON(response);
                    //$(json).each(function(i,myObj){
                        $(json.WorkedUnits).each(function(i,myObj){ 
                            if(myObj.Freeze == 'yes'){

                                $('#txtPeriod').attr('readonly',true)
                                $('#selMonth').attr('readonly',true)
                                //$('#txtYear').val(json.year);  
                                $('#txtWorkedUnits').attr('readonly',true)
                                $('#txtLeaveUnits').attr('readonly',true)
                                $('#txtTotalUnits').attr('readonly',true)
                                
                            }
                                 $('#lblEmpID').text("Employee ID : " + myObj['EmpID']);
                                //$('#txtEmpID').val(myObj['EmpID']);
                                $('#txtPeriod').val(myObj['Period']);
                                $('#selMonth').val(json.month);
                                //$('#txtYear').val(json.year);  
                                $('#txtWorkedUnits').val(myObj['WorkedUnits']);
                                $('#txtLeaveUnits').val(myObj['LeaveUnits']);
                                $('#txtTotalUnits').val(myObj['TotalUnits']);
                                
                        
                      
                        
                    });
                }
                else
                    alert("Employee ID is invalid");
                
            
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
    // $('#dpMonth').datepicker().datepicker('setDate','');
    // $('#dpYear').datepicker().datepicker('setDate','');

    
   
    $( "#txtSearch" ).change(function() {
      
        //input date changed just check if there is a valid bus number selected

        var bn = $("#txtSearch").val();
        console.log(bn);
        if (bn != null && bn > 1000)
        {
            //need to check if there is record for the date and busnumber comibination
            var myObj = {};
            myObj['EmpID'] = $("#txtSearch").val();
            

            fetchSalDetails(myObj);

            console.log(bn);
            
        }

    });

    $("#selMonth").on('change', function(){
           //alert("display");
        var Month = $(this).val();
        console.log(Month);
        $.ajax({
            type: "POST",
            url: "../common/fetchDropDownWorkValues.php",
            data:{month:Month},
            success: function(response) {
                var json = $.parseJSON(response);
                $('#txtPeriod').val(json[0]['Period']);
                $('#txtWorkedUnits').val(json[0]['WorkedUnits']);
                $('#txtLeaveUnits').val(json[0]['LeaveUnits']);
                $('#txtTotalUnits').val(json[0]['TotalUnits']);
                   
            }
        });
        return false;
    });



        

    $("#txtLeaveUnits").on('focusout',function(){
        
        var a = $("#txtWorkedUnits").val();
        var b = $("#txtLeaveUnits").val();   
        var sum =parseInt(a) + parseInt(b);
        //alert(sum);         
        $('#txtTotalUnits').val(sum);
    });

    
    $( "#btnSave" ).click(function() { 
        var tmp = $('#lblEmpID').text();

        var myObj = {};
        myObj['EmpID'] = ExtractEmpID(tmp);
        //myObj['EmpID'] = $('#txtEmpID').val();
        myObj['Period'] = $('#txtPeriod').val();
        myObj['Month'] = $('#selMonth').val();
        //myObj['Year'] = $('#txtYear').val();
        myObj['WorkedUnits'] = $('#txtWorkedUnits').val();
        myObj['LeaveUnits'] = $('#txtLeaveUnits').val();
        myObj['TotalUnits'] = $('#txtTotalUnits').val();

        var Month = [];
        $.each($(".selMonth option:selected"), function(){            
            Month.push($(this).val());
        });
        alert("You have selected the Month - " + Month.join(", "));
        
        console.log(myObj);

       
        if (act == "add") {
            $.ajax({
                url:"../salary/insertWorkDays.php", //the page containing php script
                type: "post", //request type,
                dataType: 'text',
                data: JSON.stringify(myObj),
                    success: function(res) { 
                    console.log(res)
                    }
                
            });

        }
        else
        {
            $.ajax({
                url:"../workedunits/updateWorkedhours.php", //the page containing php script
                type: "post", //request type,
                dataType: 'text',
                data: JSON.stringify(myObj),
                    success: function(res) { 
                    console.log(res)





                    }
                
            });

        }
    });


});
   
    

