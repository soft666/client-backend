new Vue({
    http: {
        headers: {
            'X-CSRF-TOKEN' : document.querySelector('#token').getAttribute('value')
        }
    },
    
    el: '#ServiceController',
    data: { name: '',
            albumimage: '',
            vdata: [],
            id: '',
            albumid: '',
    },

    mounted: function() {
        this.fetchViewData();
    },
    methods: {

        fetchViewData: function() {
            setTimeout(function() {
                var id = $('#albumid').val();
                this.$http.get('manager/albumimage/viewdata/'+id)
                    .then(function (response) {
                    this.$set(this.$data,'vdata', response.data.model.data);
                });
            }.bind(this), 1000)
        },
        AddImageAlbum: function() {

            // User input
            var formData = new FormData();

            var input = document.getElementById('image_file');
                formData.append('id',$('#albumid').val());
            for(var key in input.files) {
                formData.append('image['+key+']', $('#image_file')[0].files[key]);
            }

            this.$http.post('manager/album/albumimage', formData).then((resoponse) => {

                this.Notify('Success','เพิ่มรูปภาพสำเร็จ','success');
                this.fetchViewData();
                
            }, (response) => {
                this.Notify('Error','กรุณากรอกข้อมูลให้ถูกต้อง','error');
            }); 

            
        },
        RemoveImage: function(id) {

            var ConfirmBox = confirm("ต้องการลบหรือไม่")

			if(ConfirmBox) this.$http.post('manager/albumimage/remove', {id : id}) .then((response) => {
                                this.fetchViewData();
                                this.Notify('Success','ลบรายการที่เลือกแล้ว','success');
                           }, (response) => {
                                // error callback
                           });
			
        },
        Notify: function(title,text,type) {
            new PNotify({
                title: title,
                text: text,
                type: type,
                styling: 'bootstrap3'
            });
        }
        
    },

});


