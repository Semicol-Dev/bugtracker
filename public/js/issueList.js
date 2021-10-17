$("#critical").hide();
$("#all").show();
$("#casual").hide();
$("#feature").hide();

function listFilter(type) {

    switch (type) {
        case 0:
            $("#all").show();
            $("#casual").hide();
            $("#feature").hide();
            $("#critical").hide();
            break;
        case 1:
            $("#all").hide();
            $("#casual").hide();
            $("#feature").hide();
            $("#critical").show();
            break;
        case 2:
            $("#all").hide();
            $("#casual").show();
            $("#feature").hide();
            $("#critical").hide();
            break;
        case 3:
            $("#all").hide();
            $("#casual").hide();
            $("#feature").show();
            $("#critical").hide();
            break;
    }


}