
app.controller('ProjectListController', ['$scope', 'ProjectService', function($scope, ProjectService) {
    
    $scope.projects = [];

    $scope.prepAddNewForm = function() {
    	$scope.modalTitle = 'Add New Project';

    	$scope.projectId = 0;
    	$scope.projectDetails = {};
	};

	$scope.prepEditForm = function(projectId) {
		$scope.modalTitle = 'Edit Project';

		$scope.projectId = projectId;
		ProjectService.getProject(projectId).then(function(response) {
			$scope.projectDetails = response.data;
		});
	};

	$scope.saveChanges = function() {
		console.log($scope.projectId);
		if($scope.projectId > 0) {
			ProjectService.updateProject($scope.projectId, $scope.projectDetails).then(function(response) {
				getProjects();
			}, function(response) {
				console.log(response);
			});
		} else {
			ProjectService.addProject($scope.projectDetails).then(function(response) {
				getProjects();
			});
		}
	};

	$scope.removeProject = function(projectId) {
		ProjectService.deleteProject(projectId).then(function(response) {
			getProjects();
		}, function(response) {
			console.log(response);
		});
	}

	var getProjects = function () {
		ProjectService.getAllProjects().then(function(response) {
			$scope.projects = response.data;
			console.log($scope.projects);
		});
	}

	getProjects();

}]);
