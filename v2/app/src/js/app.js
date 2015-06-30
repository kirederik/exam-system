"use strict";

angular
  .module("examSystem", ["ngRoute"])
  .controller("AppController", ["$scope", function($scope) {
    $scope.title = "Aloha";
  }])
  .config(["$routeProvider", function($routeProvider) {
    $routeProvider
      .when("/", {
        templateUrl: "./src/partials/dashboard.html",
        controller: "AppController"
      });
    }
  ]);