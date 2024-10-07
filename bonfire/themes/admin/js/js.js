var script = document.createElement('script');
script.src = 'http://code.jquery.com/jquery-1.11.0.min.js';
script.type = 'text/javascript';
document.getElementsByTagName('head')[0].appendChild(script);

$( document ).ready(function() {

    var count = 0;

    //create a new fine row when button clicked
    $("#add_fine").click(function () {
        count = count + 1;
        createFine(count);
    });
    
    //function to add a new fine row
    function createFine(count) {
        var fineRow = $("#fine_row_code").html();

        var fineSelectId = "#selectfine_" + count;
        var fineValueId = "#valuefine_" + count;
        var fineRemarkId = "#remarkfine_" + count;

        $("#div_fine").append(fineRow);

        $("#div_fine select:not([id])").attr("id", fineSelectId);
        $("#div_fine input:not([id])").eq(0).attr("id", fineValueId);
        $("#div_fine input:not([id])").eq(0).attr("id", fineRemarkId);
    }
    
    // update input 'name' on dropdown change
    $('#div_fine').delegate('select', 'change', function() {
        
        //get current row serial number from id
        var id = $(this).attr('id');
        var name=document.getElementById(id).value;
        
        var id = id.split('_');
        var id = id[1];
        console.log("",id)
        //add serial number to name for value field
        var nameValue = name + "_value" + "_" + id;
        
        //assign name to input value field
        $(this).closest('div').find('input').eq(0).attr('name', nameValue);
        
        var nameRemark = name + "_remark" + "_" + id;
        $(this).closest('div').find('input').eq(1).attr('name', nameRemark);
        
        //stop window from scrolling to the top
        return false;
    });  
    
    var discountcount = 0;
    $("#add_discount").click(function () {
        discountcount = discountcount + 1;
        createDiscount(discountcount);
    });
    
    //function to add a new fine row
    function createDiscount(count) {
        var discountRow = $("#discount_row_code").html();

        var discountSelectId = "#selectdiscount_" + count;
        var discountValueId = "#valuediscount_" + count;
        var discountRemarkId = "#remarkdiscount_" + count;

        $("#div_discount").append(discountRow);

        $("#div_discount select:not([id])").attr("id", discountSelectId);
        $("#div_discount input:not([id])").eq(0).attr("id", discountValueId);
        $("#div_discount input:not([id])").eq(0).attr("id", discountRemarkId);
    }
    
    // update input 'name' on dropdown change
    $('#div_discount').delegate('select', 'change', function() {
        var id = $(this).attr('id');
        var name=document.getElementById(id).value;
        
        
        
        
        //get current row serial number from id
        var id = $(this).closest('div').find('input').eq(0).attr('id');
        var id = id.split('_');
        var id = id[1];
        
        //add serial number to name for value field
        var nameValue = name + "_value" + "_" + id;
        
        //assign name to input value field
        $(this).closest('div').find('input').eq(0).attr('name', nameValue);
        
        var nameRemark = name + "_remark" + "_" + id;
        $(this).closest('div').find('input').eq(1).attr('name', nameRemark);
        
        //stop window from scrolling to the top
        return false;
    });
});