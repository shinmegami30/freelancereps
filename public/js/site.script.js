/**
* Ajax search redirect
**/
$('#search-submit').on('click', function () {
	data_type = $("#search-selector").val();
    q = $("#q").val();
    
    $.ajax({
        url: "/" + data_type + "/search/",
        method: "get",
        data: {data_type:data_type, q:q},
        success:function(response){
            window.location.replace(response);
        }
    })
});


/**
* Select all checkbox on datalist
**/
$('#data-id-select-all').on('click', function () {
	idstatus = $(this).prop( "checked" );
	$('.data-ids').prop('checked', idstatus);
});

/**
* Ajax to delete the selected data on datalist
**/
$('#data_doaction').on('click', function(){
    action = $("#bulk-action-selector-top").val();
    data_type = $("#data_type").val();
    if(action=="trash"){
        var dataid = [];
        if(confirm("Are you sure you want to DELETE this data?")){
            $('.data-ids:checked').each(function(){
                dataid.push($(this).val());
            });
            if(dataid.length > 0){
                $.ajax({
                    url: "/" + data_type + "/mass_remove/",
                    method: "get",
                    data: {dataid:dataid},
                    success:function(data){
                        sessionStorage.setItem("status", "You're data(s) is successfully deleted.");
                        window.location.href = "/" + data_type + "/";
                    }
                })
            }
            else{
                alert("Please select data on checkbox.");
            }
        }
    }
});