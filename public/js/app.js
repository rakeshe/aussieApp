'use strict';
var aussieApp = angular.module('aussieApp', [
  'ngRoute',
  'aussieControllers'
]);

aussieApp.config(['$routeProvider',
  function($routeProvider) {
    $routeProvider.
      when('/artist', {
        templateUrl: 'partials/artist-list.html',
        controller: 'ArtistListCtrl'
      }).
      when('/artist/:mbid', {
        templateUrl: 'partials/track-list.html',
        controller: 'TrackListCtrl'
      }).
      otherwise({
        redirectTo: '/artist'
      });
  }]);
