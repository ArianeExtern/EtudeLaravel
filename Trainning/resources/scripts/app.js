var app = angular.module('app', []);

//Utiliser pour eviter un confit d'affichage entre Angular JS et 
app.config(function ($interpolateProvider) {

    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');

});
