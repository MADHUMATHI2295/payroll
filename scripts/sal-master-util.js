
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

function fetchSalDetails(myObj)
{
    $.ajax({
            
        url:"../salary/fetchSalaryDetails.php", //the page containing php script to check
        type: "post", //request type,
        dataType: 'text',
        data: JSON.stringify(myObj),
        success: function(response) { 
                console.log(response);
                if (!response.includes("nothing"))
                {
                    var json = $.parseJSON(response);
                    $(json).each(function(i,myObj){
                        
                                $('#lblEmpID').text("Employee ID  : " + myObj['EmpID']);
                                $('#lblEmpName').text("Employee Name  : " + myObj['EmpName']);
                                $('#txtBasicPay').val(myObj['BasicPay']);
                                $('#txtMedicalAllowance').val(myObj['MedicalAllowance']);
                                $('#txtHRA').val(myObj['HRA']);
                                $('#txtSpecialAllowance').val(myObj['SpecialAllowance']);
                                $('#txtConveyanceAllowance').val(myObj['ConveyanceAllowance']);
                                $('#txtTelephoneAllowance').val(myObj['TelephoneAllowance']);
                                $('#txtPFEmployer').val(myObj['PFDeductionEmployer']);
                                $('#txtPFEmployee').val(myObj['PFDeductionEmployee']);
                                $('#selPayPeriodType').val(myObj['PayPeriodType']);
                                $('#txtCTC').val(myObj['CTC']);
                               
                            
                        
                      
                        
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
        bootbox.alert(FieldName + ': input is not numeric');
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
    // $('input.falert').keyup(function() {    
    //     var d = $(this).attr('numeric');
    // debugger;
    //     var value = $(this).val();
    //     var orignalValue = value;
    //     value = value.replace(/[0-9]*/g, "");
    
    //     var msg = "Only Integer Values allowed.";
    
    //     if (d == 'decimal') {
    //         value = value.replace(/\./, "");
    //         
    //     }
    
    //     if (value != '') {
    //         orignalValue = orignalValue.replace(/([^0-9].*)/g, "")
    //         $(this).val(orignalValue);
    //         //alert(msg);
    //        $(this).after('<span style="margin-left:5px;color:red;position:absolute;">' + msg + '</span>');
    //     } else {
    //         $(this).next('span').remove();
    //     }
    // });

    $('input.falert').keyup(function(event) {

        // skip for arrow keys
        if(event.which >= 37 && event.which <= 40) return;
      
        // format number
        $(this).val(function(index, value) {
          return value
          .replace(/\D/g, "")
          .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
          ;
        });
      });
      
    
    
   
   
    $( "#btnSave" ).click(function() {
       
        var tmp = $('#lblEmpID').text();
        console.log(tmp);
        var myObj = {};
        myObj['EmpID'] = ExtractEmpID(tmp);
        myObj['BasicPay'] = $('#txtBasicPay').val();
        myObj['MedicalAllowance'] = $('#txtMedicalAllowance').val();
        myObj['HRA'] = $('#txtHRA').val();
        myObj['SpecialAllowance'] = $('#txtSpecialAllowance').val();
        myObj['ConveyanceAllowance'] = $('#txtConveyanceAllowance').val();
        myObj['TelephoneAllowance'] = $('#txtTelephoneAllowance').val();
        myObj['PFDeductionEmployer'] = $('#txtPFEmployer').val();
        myObj['PFDeductionEmployee'] = $('#txtPFEmployee').val();
        myObj['PayPeriodType'] = $('#selPayPeriodType').val();
        myObj['CTC'] = $('#txtCTC').val();

       
        console.log(myObj);
        

        if (act == "add") {
            $.ajax({
                url:"../employee/insertEmployeeMaster.php", //the page containing php script
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
                url:"../salary/updateSalaryMaster.php", //the page containing php script
                type: "post", //request type,
                dataType: 'text',
                data: JSON.stringify(myObj),
                    success: function(res) { 
                    console.log(res)
                    }
                
            });

        }
    });

    //fetchSalDetails();
});
   
    

