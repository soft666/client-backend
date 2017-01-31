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
            success: false,
            isErrorimage: false,
            albumid:'',
    },

    mounted: function() {
        this.fetchViewData();
    },

    methods: {

        fetchViewData: function() {

            this.$http.get('manager/album/viewdata')
                .then(function (response) {
                this.$set(this.$data,'vdata', response.data.model.data);
            });

        },
        AddNameAlbum: function() {
            // User input
            var formData = new FormData();
            formData.append('name', this.name);
            formData.append('image', $('#albumimage')[0].files[0]);
            // Send post request
            this.$http.post('manager/album/post', formData).then((response) => {
                this.fetchViewData();
            }, (response) => {
                this.Notify('Error','กรุณากรอกข้อมูลให้ถูกต้อง','error');
            }); 
        },
        AddImageAlbum: function() {

            // User input
            var formData = new FormData();

            var input = document.getElementById('image_file');
            
            for(var key in input.files) {
                formData.append('image['+key+']', $('#image_file')[0].files[key]);
            }

            console.log(this.albumid)
            /*
            this.$http.post('manager/album/image', formData).then((resoponse) => {

                this.Notify('Success','เพิ่มรูปภาพสำเร็จ','success');
                this.fetchViewData();
                
            }, (response) => {
                this.Notify('Error','กรุณากรอกข้อมูลให้ถูกต้อง','error');
            }); */

            
        },
        RemoveAlbum: function(id) {

            var ConfirmBox = confirm("ต้องการลบหรือไม่")

			if(ConfirmBox) this.$http.post('manager/album/remove', {id : id}) .then((response) => {
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


