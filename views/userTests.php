<div class="container text-center ">
    <div class="row">
        <div class="col-xs-offset-4 col-xs-4 ">
            <p>
            <h3>Testy</h3></p>
        </div>
    </div>
</div>

<div class="container">
    <div class="col-md-6 col-md-offset-3 col-xs-12 col-xs-offset-0 operationMode">

        <form action="userTest.php" method="post" id="form_operationMode" class="form-horizontal">
            <div class="form-group">

                <input type="hidden" name="mode[plus]" value="0">
                <label class="checkbox-inline   col-xs-3"><input type="checkbox" name="mode[plus]"
                                                                 value="1"><b>+</b></label>


                <input type="hidden" name="mode[minus]" value="0">
                <label class="checkbox-inline  col-xs-3"><input type="checkbox" name="mode[minus]"
                                                                value="1"><b>-</b></label>


                <input type="hidden" name="mode[multiply]" value="0">
                <label class="checkbox-inline  col-xs-3"><input type="checkbox" name=mode[multiply]" value="1"><b>*</b></label>


                <input type="hidden" name="mode[divide]" value="0">
                <label class="checkbox-inline  col-xs-3"><input type="checkbox" name="mode[divide]"
                                                                value="1"><b>÷</b></label>

            </div>


            <div class="form-group">
                <div class="marginTop col-md-6 col-md-offset-3 " id="testCount">

                    <div class="form-group">
                        <label class="radio-inline"><input type="radio" name="count" value="5">5</label>
                        <label class="radio-inline"><input type="radio" name="count" value="10">10</label>
                        <label class="radio-inline"><input type="radio" name="count" value="20">20</label>
                    </div>
                    <div class="form-group">
                        <label for="submit">Vygenerovat</label>
                        <input class="btn btn-default" type="submit" id="submit">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


<?php
require __DIR__ . '/../bootstrap.end.php';
?>