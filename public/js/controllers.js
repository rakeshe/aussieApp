'use strict';
var aussieControllers = angular.module('aussieControllers', []);

aussieControllers.controller('ArtistListCtrl', ['$scope', '$http',
    function ($scope, $http) {
        $scope.currentPage = '';
        $scope.buttonClass = 'disabled';

        $http.get('data/config_en_au.json').success(function (data) {
            $scope.config = data;
        });

        $scope.checkPrevious = function () {
            return $scope.currentPage == 1 || $scope.loading == true || $scope.loading == undefined ? true : false
        }
        $scope.checkNext = function () {
            return $scope.currentPage >= 100 || $scope.loading == true || $scope.loading == undefined ? true : false
        }
        $scope.previousPage = function () {
            if ($scope.currentPage - 1 < 1 || $scope.keywords == undefined) {
                return false;
            } else {
                if ($scope.keywords != undefined || $scope.keywords == '') {
                    $scope.currentPage = $scope.currentPage - 1;
                    this.search();
                }
                return true;
            }

        }

        $scope.nextPage = function () {
            if ($scope.currentPage + 1 >= 100 || $scope.keywords == undefined) {
                return false;
            } else {
                if ($scope.keywords != undefined || $scope.keywords == '') {
                    $scope.currentPage = $scope.currentPage + 1;
                    this.search();
                }
                return true;
            }
        }

        $scope.search = function () {
            $scope.loading = true;
            $scope.buttonClass = 'disabled';

            if ($scope.keywords != undefined) {
                $scope.url = '/api/topArtist/' + $scope.keywords;
                if ($scope.currentPage > 0) $scope.url += '/' + $scope.currentPage;

                console.log($scope.url);

                $http.get($scope.url).then(function (response) {
                    $scope.artists = response.data;
                }).finally(function () {
                    if($scope.currentPage == '') $scope.currentPage = 1;
                    $scope.buttonClass = '';
                    $scope.loading = false;
                });
                $scope.orderProp = 'rank';
            }
        }
    }]);

aussieControllers.controller('TrackListCtrl', ['$scope', '$routeParams', '$http',
    function ($scope, $routeParams, $http) {
        $scope.url = '/api/TopTracks/' + $routeParams.mbid;
        $http.get($scope.url).success(function (data) {
            $scope.tracks = data;
        });
        $scope.orderProp = 'rank';
    }]);