$(document).ready(function (){

    'use strict';

    var start = 1,
        entries = 10,
        sortingBy = "name",
        selectedCurrency = "USD",
        sortingType = "asc";

    /**************** pagination ******************/

    $(".pagination li.next-page , .pagination li.pre-page").on("click", function () {

        entries = parseInt($("#entries").val());
        if ($(this).hasClass('next-page'))
        {
            $('tbody').empty();
            start = start + entries;
        } else {
            if ((start-entries) < 1){
                return false;
            }
            start = start - entries;
        }
        ajaxRequest()
    });

    /**************** entiries ********************/
    $("#currency, #sortedBy, #entries, #sortedTyp").on("change", function () {
        if ($(this).attr('id') == "entries")
        {
            entries = parseInt($("#entries").val());
        }
        ajaxRequest();
    });

    function ajaxRequest()
    {
        sortingBy = $("#sortedBy").val(),
        entries = $("#entries").val(),
        selectedCurrency = $("#currency").val(),
        sortingType = $("#sortedTyp").val();



        $('tbody').empty();

        $.ajax({
            type: "POST",
            method: "POST",
            url: "included/getApi.php",
            data: {
                sortingBy: sortingBy,
                start: start,
                selectedCurrency: selectedCurrency,
                entries: entries,
                sortingType: sortingType
            },
            success: function (data) {
                var currentData = "";
                data = JSON.parse(data);
                data = data.data;

                data.forEach(function(row) {
                    currentData = '<tr>';
                    currentData += '<th>' + row.id + '</th>';
                    currentData += '<td>' + row.cmc_rank + '</td>';
                    currentData += '<td>' + row.name + '</td>';
                    currentData += '<td>' + row.quote[selectedCurrency].price + '</td>';
                    currentData += '</tr>';
                    $('tbody').append(currentData);
                })
            }
        })
    }

    /******************* Search ***********************/
    $("#searchInput").on("keyup", function() {

        var value = $(this).val();

        $("table tr").each(function() {
            $("td:contains(" + value + ")").closest('tr').show();
            $("tr:not(:contains(" + value + ")):gt(0)").hide();
        });
    });
});