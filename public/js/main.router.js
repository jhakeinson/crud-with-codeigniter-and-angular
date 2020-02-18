

app.config(function($stateProvider) {
    var home = {
        name: 'home',
        url: '',
        controller: 'ProjectListController',
        templateUrl: './public/templates/projects.html'
    }
    $stateProvider.state(home);

});
