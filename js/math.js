$(document).ready(function () {
    var btn_summitResult = $("#submitResult");
    var element_numberA = $("#numberA");
    var element_numberB = $("#numberB");
    var element_numberResult = $("#numberResult");
    var element_sign = $("#sign");


    var txt_resultForm;
    var resultData;
    var bool_succesful;
    var bool_result;
    var int_numberA;
    var int_numberB;
    var int_result;
    var str_sign;
    var generateNext = true;
    var backgroundIndex = 2;


    $("#resultForm").on("submit", function (e) {
        e.preventDefault();
        console.log(generateNext);

        if (generateNext == true) {
            sendAndRecieveResult();
            //$("#calcResult").attr('disabled', true);
            generateNext = false;

        } else {
            //$("#calcResult").attr('disabled', false);
            element_numberA.html(int_numberA);
            element_numberB.html(int_numberB);
            element_numberResult.html("?");
            element_sign.html(str_sign);


            btn_summitResult.removeClass("btn-danger");
            btn_summitResult.removeClass("btn-success");
            btn_summitResult.val("Zkontrolovat");
            generateNext = true;
        }
    });

    function sendAndRecieveResult() {

        txt_resultForm = $("#calcResult").val();

        var jsonData = {result: txt_resultForm};
        jsonData = $.param(jsonData) + '&' + $("#form_operationMode").serialize();

        console.log(jsonData);
        $.ajax({
            url: 'functions/math.php', type: "POST", data: jsonData,
            success: function (data) {
                console.log(data);
                resultData = JSON.parse(data);
                bool_succesful = resultData["succesful"];
                bool_result = resultData["result"];
                int_result = resultData["int_result"];
                int_numberA = resultData["numberA"];
                int_numberB = resultData["numberB"];
                str_sign = resultData["sign"];


                element_numberResult.html(int_result);


                if (bool_succesful == true) {

                    if (bool_result == true) {
                        btn_summitResult.addClass("btn-success");
                        btn_summitResult.removeClass("btn-danger");
                        btn_summitResult.val("Další příklad");
                        if (backgroundIndex <= 3) {
                            backgroundIndex++;
                        }
                        changeBackground(backgroundIndex);

                    } else {
                        btn_summitResult.addClass("btn-danger");
                        btn_summitResult.removeClass("btn-success");
                        btn_summitResult.val("další příklad");
                        if (backgroundIndex >= 1)
                            backgroundIndex--;
                        changeBackground(backgroundIndex);


                    }

                    }
                    $("#calcResult").val("");
                }

            ,
            error: function () {
                alert("Fail");
            }
        });
    }


    var body = $('body');
    var backgrounds = ["../images/background_0.svg", "../images/background_1.svg", "../images/background_2.svg", "../images/background_3.svg", "../images/background_4.svg"];

    function changeBackground(backgroundIndex) {
        console.log(backgroundIndex);
        body.css('background', 'url(' + backgrounds[backgroundIndex] + ')');
        body.css('background-repeat', 'no-repeat');
        body.css('background-size', 'cover');

    }


});
