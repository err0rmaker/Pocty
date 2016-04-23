$(document).ready(function () {


    $("#resultForm").on("submit", function (e) {


        var txt_numberA = $("#numberA").text();
        var txt_numberB = $("#numberB").text();
        var txt_resultForm = $("#calcResult").val();
        var txt_sign = $("#sign").html();

        console.log(txt_sign);


        var jsonData = {numberA: txt_numberA, numberB: txt_numberB, result: txt_resultForm, sign: txt_sign};
        var resultData;
        var bool_succesful;
        var bool_result;
        var int_numberA;
        var int_numberB;
        var str_sign;
        var btn_summitResult = btn_summitResult;

        e.preventDefault();

        $.ajax({
            url: 'php/pocitani.php', type: "POST", data: jsonData,

            success: function (data) {
                resultData = JSON.parse(data);
                console.log(resultData);
                bool_succesful = resultData["succesful"];
                bool_result = resultData["result"];
                int_numberA = resultData["numberA"];
                int_numberB = resultData["numberB"];
                str_sign = resultData["sign"];


                $("#numberA").html(int_numberA);
                $("#numberB").html(int_numberB);
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
                alert("Spatny");
            }
        });


    });
});