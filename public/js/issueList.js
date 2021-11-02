$("#critical").hide();
$("#all").show();
$("#casual").hide();
$("#feature").hide();
$("#solved").hide();



function hideAll() {
    $("#critical").hide();
    $("#all").hide();
    $("#casual").hide();
    $("#feature").hide();
    $("#solved").hide();
}

function listFilter(type) {

    if (type == 0) {
        hideAll();
        $("#all").show();
    } else if (type == 1) {
        hideAll();
        $("#critical").show();
    } else if (type == 2) {
        hideAll();
        $("#casual").show();
    } else if (type == 3) {
        hideAll();
        $("#feature").show();
    } else if (type == 4) {
        hideAll();
        $("#solved").show();
    }

}