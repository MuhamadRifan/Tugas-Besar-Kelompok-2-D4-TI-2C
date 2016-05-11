angular.module('starter.services', [])

.factory('mahasiswaService', function($http) {
    var baseUrl = 'http://localhost/webservice/backend/index.php/Biodata_controller/';
    return {
        login: function(sekolahForm){
            return $http.post(baseUrl+'dataSekolah',sekolahForm,{
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8;'
                }
            });
        },

        ambilSemua: function (){
            return $http.get(baseUrl+'get_all_data'); 
        },

        ambilSatu: function (id){
            return $http.get(baseUrl+'get_data/?id='+id); 
        },

        // .... Start
        // section post data mahasiswa
        simpan: function (mahasiswa){
            return $http.post(baseUrl+'input_mahasiswaC',mahasiswa,{
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8;'
                }
            });
        },
        ubah: function (mahasiswa){
            return $http.post(baseUrl+'ubah',mahasiswa,{
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8;'
                }
            });
        },
        hapus: function (id){
            return $http.get(baseUrl+'hapus/?id='+id);
        }
    };
})

.factory('Chats', function() {
  return {
    all: function() {
      return chats;
    },
    remove: function(chat) {
      chats.splice(chats.indexOf(chat), 1);
    },
    get: function(chatId) {
      for (var i = 0; i < chats.length; i++) {
        if (chats[i].id === parseInt(chatId)) {
          return chats[i];
        }
      }
      return null;
    }
  };
});
