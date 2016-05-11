angular.module('starter.controllers', [])

.controller('DashCtrl', function($scope) {})

.controller('TambahCtrl', function($scope,mahasiswaService, $ionicPopup){

  $scope.showAlert = function(msg) {
    $ionicPopup.alert({
        title: msg.title,
        template: msg.message,
        okText: 'Ok',
        okType: 'button-positive'
    });
  };
// .... Start
// section post data mahasiswa
// services.js && tambah.html
// ............
  $scope.post_mahasiswa = function(mahasiswa){

    if(!mahasiswa.nama){
      $scope.showAlert({
        title: "Information",
        message: "Nama Mohon Diisi"
      });
    }else if(!mahasiswa.kelas){
      $scope.showAlert({
        title: "Information",
        message: "Kelas Mohon Diisi"
      });
    }else if(!mahasiswa.jurusan){
      $scope.showAlert({
        title: "Information",
        message: "Jurusan Mohon Diisi"
      });
    }else if(!mahasiswa.email){
      $scope.showAlert({
        title: "Information",
        message: "Email Mohon Diisi"
      });
    }else{
      mahasiswaService.simpan({
        data: mahasiswa
      }).then(function(resp) {
        console.log(resp);
      
        $scope.showAlert({
          title: "Information",
          message: "Data Telah Disimpan"
        });
        // $state.go("tab.buku");
      },function(err) {
        console.error('Error', err);
      }); 
    }

  };

})

// .......END.....
//section post data mahasiswa

.controller('BukuCtrl', function($scope, $ionicPopup, mahasiswaService) {
  // With the new view caching in Ionic, Controllers are only called
  // when they are recreated or on app start, instead of every page change.
  // To listen for when this page is active (for example, to refresh data),
  // listen for the $ionicView.enter event:
  //
  //$scope.$on('$ionicView.enter', function(e) {
  //});

  $scope.showAlert = function(msg) {
    $ionicPopup.alert({
        title: msg.title,
        template: msg.message,
        okText: 'Ok',
        okType: 'button-positive'
    });
  };
  
  $scope.remove = function(chat) {
    mahasiswaService.hapus(chat.id).then(function(resp) {
      console.log(resp);
      $scope.showAlert({
        title: "Information",
        message: "Data Telah Dihapus"
      });
      $scope.showData();
    }, function(err) {
      console.log('Error', err);
    });
  }

  $scope.showData = function() {
    mahasiswaService.ambilSemua().success(function(dataChat) {
      $scope.chats = dataChat;
    });  
  };

  $scope.showData();

  console.log($scope.chats);

})

.controller('BukuDetailCtrl', function($scope,$stateParams,$ionicPopup,$ionicModal,$state, mahasiswaService) {

  $scope.showDataId = function() {
  mahasiswaService.ambilSatu($stateParams.bukuId).success(function(dataChat) {
    $scope.mahasiswa = dataChat;
  });  
  };

  $scope.showDataId();

  $ionicModal.fromTemplateUrl('edit.html', function(modal){
    $scope.taskModal = modal;
  },{
    scope : $scope,
    animation : 'slide-in-up' 
  });
        
  $scope.showAlert = function(msg) {
    $ionicPopup.alert({
        title: msg.title,
        template: msg.message,
        okText: 'Ok',
        okType: 'button-positive'
    });
  };
  
  $scope.editModal = function(){
    $scope.taskModal.show();
  };
  
  $scope.batal = function(){
    $scope.taskModal.hide();
    $scope.showDataId();
  };

  $scope.edit = function(mahasiswa){

    if(!mahasiswa.nama){
      $scope.showAlert({
        title: "Information",
        message: "Nama Mohon Diisi"
      });
    }else if(!mahasiswa.kelas){
      $scope.showAlert({
        title: "Information",
        message: "Kelas Mohon Diisi"
      });
    }else if(!mahasiswa.jurusan){
      $scope.showAlert({
        title: "Information",
        message: "Jurusan Mohon Diisi"
      });
    }else if(!mahasiswa.email){
      $scope.showAlert({
        title: "Information",
        message: "Email Mohon Diisi"
      });
    }else{
      mahasiswaService.ubah({
        data: mahasiswa
      }).then(function(resp) {
        console.log(resp);
      
        $scope.showAlert({
          title: "Information",
          message: "Data Telah Diupdate"
        });
      
        $scope.taskModal.hide();
        // $state.go("tab.buku");
      },function(err) {
        console.error('Error', err);
      }); 
    }
  };
})

.controller('TentangCtrl', function($scope) {
  
});
