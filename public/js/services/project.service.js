app.factory('ProjectService', ["$http", function($http) {
    var factory = {};

    factory.getAllProjects = function() {
        return $http.get('./api/projects');
    }

	factory.getProject = function(projectId) {
		return $http.get('api/project/' + projectId);
	};

    factory.addProject = function(projectDetails) {
    	return $http.post('api/project', projectDetails);
	};

	factory.updateProject = function(projectId, projectDetails) {
		return $http.post('api/project/update/' + projectId, projectDetails);
	};

	factory.deleteProject = function(projectId) {
		return $http.delete('api/project/delete/' + projectId);
	};

    return factory;
}] );
