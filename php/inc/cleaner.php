<?php
function clean($input)
{
    $input = strip_tags($input);
    $input = stripslashes($input);
    return $input;
}