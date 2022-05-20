angular.module('app', []).controller('cont', ($scope, $http)=>{
    $scope.data = []
    $http.get('/list/25').then(
        (res)=>{
            console.log(res.data.items[0])
            $scope.data = res.data.items.map(a=>{
                return {
                    name: a.title,
                    edad: a['age_min'] || 'Desconocido',
                    img: a.images[0].original
                }
            })
        }
    )
})