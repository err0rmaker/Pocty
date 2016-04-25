$(document).ready(function () {
    var txt_numberA;
    var txt_numberB;
    var txt_resultForm;
    var txt_sign;
    var btn_summitResult = $("#submitResult");


    var resultData;
    var bool_succesful;
    var bool_result;
    var int_numberA;
    var int_numberB;
    var str_sign;
    var generateNext = true;

    $("#resultForm").on("submit", function (e) {
        e.preventDefault();
        console.log(generateNext);

        if (generateNext == true) {
            sendAndRecieveResult();
            generateNext = false;
        } else {
            btn_summitResult.removeClass("btn-danger");
            btn_summitResult.removeClass("btn-success");
            btn_summitResult.val("Další příklad");


            generateNext = true;

        }


    });

    function sendAndRecieveResult() {
        txt_numberA = $("#numberA").text();
        txt_numberB = $("#numberB").text();
        txt_numberResult = $("#numberResult").text();
        txt_resultForm = $("#calcResult").val();
        txt_sign = $("#sign").html();
        btn_summitResult = $("#submitResult");

        var jsonData = {numberA: txt_numberA, numberB: txt_numberB, result: txt_resultForm, sign: txt_sign};
        jsonData = $.param(jsonData) + '&' + $("#form_operationMode").serialize();

        console.log(jsonData);
        $.ajax({
            url: 'php/pocitani.php', type: "POST", data: jsonData,
            success: function (data) {
                console.log(data);
                resultData = JSON.parse(data);
                bool_succesful = resultData["succesful"];
                bool_result = resultData["result"];
                int_numberA = resultData["numberA"];
                int_numberB = resultData["numberB"];
                str_sign = resultData["sign"];


                $("#numberA").html(int_numberA);
                $("#numberB").html(int_numberB);
                $("#numberResult").html(int_numberB);

                $("#sign").html(str_sign);


                if (bool_succesful == true) {

                    if (bool_result == true) {
                        btn_summitResult.addClass("btn-success");
                        btn_summitResult.removeClass("btn-danger");
                        btn_summitResult.val("DOBŘE");

                    }
                    else {
                        btn_summitResult.addClass("btn-danger");
                        btn_summitResult.removeClass("btn-success");
                        btn_summitResult.val("ŠPATNĚ");
                    }
                    $("#calcResult").val("");
                }

            }, error: function () {
                alert("Fail");
            }
        });
    }

});