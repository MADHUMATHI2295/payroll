
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
            
        url:"../salarytransaction/fetchSalaryTransaction.php", //the page containing php script to check
        type: "post", //request type,
        dataType: 'text',
        data: JSON.stringify(myObj),
        success: function(response) { 
                console.log(response);
                if (!response.includes("nothing"))
                {
                    var json = $.parseJSON(response);
                    $('#lblMonth').text("Salary of Month : " + json.month[0]['Month']);
                    $(json.salaryTransaction).each(function(i,myObj){ 
                        if(myObj.Freeze == 'yes'){
                            $('#txtBasicPay').attr('readonly',true)
                            $('#txtMedicalAllowance').attr('readonly',true)
                            $('#txtHRA').attr('readonly',true)
                            $('#txtSpecialAllowance').attr('readonly',true)
                            $('#txtConveyanceAllowance').attr('readonly',true)
                            $('#txtTelephoneAllowance').attr('readonly',true)
                            $('#txtPFEmployer').attr('readonly',true)
                            $('#txtPFEmployee').attr('readonly',true)
                            $('#txtPeriod').attr('readonly',true)
                            $('#txtCTC').attr('readonly',true)
                            $('#txtArrears').attr('readonly',true)
                            $('#txtGrossSalary').attr('readonly',true)
                            $('#txtESIDeductions').attr('readonly',true)
                            $('#txtTDS').attr('readonly',true)
                            $('#txtAdvance').attr('readonly',true)
                            $('#txtLOP').attr('readonly',true)
                            $('#txtOtherDeductions').attr('readonly',true)
                            $('#txtTotalDeductions').attr('readonly',true)
                            $('#txtNetPay').attr('readonly',true)
                            $('#txtTotalEarnings').attr('readonly',true)
                            $('#txtPTDeductions').attr('readonly',true)
                            $('#txtOthers').attr('readonly',true)
                        }
                        
                                $('#lblEmpID').text( myObj['EmpID']); 
                                $('#txtBasicPay').val(myObj['BasicPay']);
                                $('#txtMedicalAllowance').val(myObj['MedicalAllowance']);
                                $('#txtHRA').val(myObj['HRA']);
                                $('#txtSpecialAllowance').val(myObj['SpecialAllowance']);
                                $('#txtConveyanceAllowance').val(myObj['ConveyanceAllowance']);
                                $('#txtTelephoneAllowance').val(myObj['TelephoneAllowance']);
                                $('#txtPFEmployer').val(myObj['PFDeductions']);
                                $('#txtPFEmployee').val(myObj['PFDeductions1']);
                                $('#txtPeriod').val(myObj['Period']);
                                $('#txtCTC').val(myObj['CTC']);
                                $('#txtArrears').val(myObj['Arrears']);
                                $('#txtGrossSalary').val(myObj['GrossSalary']);
                                $('#txtESIDeductions').val(myObj['ESIDeductions']);
                                $('#txtTDS').val(myObj['TDS']);
                                $('#txtAdvance').val(myObj['Advance']);
                                $('#txtLOP').val(myObj['LOP']);
                                $('#txtOtherDeductions').val(myObj['OtherDeductions']);
                                $('#txtTotalDeductions').val(myObj['TotalDeductions']);
                                $('#txtNetPay').val(myObj['NetPay']);
                                $('#txtTotalEarnings').val(myObj['TotalEarnings']);
                                $('#txtPTDeductions').val(myObj['PTDeductions']);  
                                $('#txtOthers').val(myObj['Others']); 
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
      
        //enter employee id to fetch their details

        var bn = $("#txtSearch").val();
        console.log(bn);
        if (bn != null && bn > 1000)
        {
           
            var myObj = {};
            myObj['EmpID'] = $("#txtSearch").val();
            fetchSalDetails(myObj);

            console.log(bn);
            
        }

    });

    
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
        myObj['PFDeductions'] = $('#txtPFEmployer').val();
        myObj['PFDeduction1'] = $('#txtPFEmployee').val();
        myObj['Period'] = $('#txtPeriod').val();
        myObj['CTC'] = $('#txtCTC').val();
        myObj['Arrears'] = $('#txtArrears').val();
        myObj['GrossSalary'] = $('#txtGrossSalary').val();
        myObj['ESIDeductions'] = $('#txtESIDeductions').val();
        myObj['TDS'] = $('#txtTDS').val();
        myObj['Advance'] = $('#txtAdvance').val();
        myObj['LOP'] = $('#txtLOP').val();
        myObj['TotalDeductions'] = $('#txtTotalDeductions').val();
        myObj['OtherDeductions'] = $('#txtOtherDedutions').val();
        myObj['NetPay'] = $('#txtNetPay').val();
        myObj['TotalEarnings'] = $('#txtTotalEarnings').val();
        myObj['PTDeduction'] = $('#txtPTDedution').val();
        //myObj['Freez'] = $('#txtFreez').val();
       
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
                url:"../salarytransaction /updateSalaryMaster.php", //the page containing php script
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
   
    

